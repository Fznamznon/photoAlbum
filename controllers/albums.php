<?php

	function albums_index() 
	{
		require(MODELS.'users.php');
		require(MODELS.'albums.php');

		$cur_user = users_getCurrentUser();

		$public_only = ($cur_user['id'] < 0);

		$albums = albums_getAll($public_only);

		require(VIEWS.'albums.php');
	}	
	
	function albums_add()
	{
		require(MODELS.'users.php');
		require(MODELS.'albums.php');

		$cur_user = users_getCurrentUser();

		if ($cur_user['id'] != -1)
		{
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$name = $_POST['name'];
				$description = $_POST['description'];
				$private = 0;
				if (isset($_POST['privacy']) && !empty($_POST['privacy']))
				{ 
					$private = 1;
				}
				$album_id = albums_insert($name, $description, $cur_user['id'], $private);
				header('location: '.WEB.'albums/'.$album_id);
			}
			else
			{
				require(VIEWS.'add_album.php');
			}

		}
		else
		{
			header('location:'.WEB.'users/login');
		}

	}

	function albums_showByUser($user_id)
	{
		require(MODELS.'users.php');
		require(MODELS.'albums.php');

		$cur_user = users_getCurrentUser();

		$user = users_getById($user_id);

		$public_only = ($cur_user['id'] < 0);

		$albums = albums_getByUserId($user_id, $public_only);

		require(VIEWS.'show_albums_by_user.php');
	}

	function albums_showById($album_id)
	{
		require(MODELS.'albums.php');
		require(MODELS.'photo.php');
		require(MODELS.'users.php');

		$cur_user = users_getCurrentUser();

		$album = albums_getById($album_id);

		if ($album['private'] && $cur_user['id'] != $album['user_id'])
		{
			header('Location: '.WEB.'users/'.$album['user_id'].'/albums');
			exit;
		}
		else
		{
			$photos = photos_getbyAlbumId($album_id);
			require(VIEWS.'show_photos_by_album.php');
		}
	}
	
	function albums_delete($album_id) {
		require(MODELS."photo.php");
		require(MODELS."users.php");
		require(MODELS."albums.php");

		$cur_user = users_getCurrentUser();
		$album = albums_getbyId($album_id);

		if ($cur_user['id'] != $album['user_id'])
		{
			header('Location: '.WEB.'users/'.$cur_user['id'].'/albums');
			exit;
		}

		$albums = albums_getByUserId($cur_user['id']);

		if (count($albums) == 1)
		{
			header('Location: '.WEB.'users/'.$cur_user['id'].'/albums');
			exit;
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$album_id = $_POST['album_id'];
			$photos_action = $_POST['photos_action'];
			$destination_album_id = $_POST['destination_album_id'];

			if ($photos_action == 'delete')
			{
				albums_deleteByIdWithPhotos($album_id);

				header('Location: '.WEB."users/{$cur_user['id']}/albums");
				exit;
			}
			else
			{
				albums_movePhotos($album_id, $destination_album_id);
				albums_deleteById($album_id);

				header('Location: '.WEB."users/{$cur_user['id']}/albums");
				exit;
			}
		}
		else
		{
			require(VIEWS.'delete_album.php');
		}
	}
		
	function albums_edit($album_id) 
	{
		require(MODELS."photo.php");
		require(MODELS."users.php");
		require(MODELS."albums.php");

		$cur_user = users_getCurrentUser();

		$album = albums_getbyId($album_id);
		$album['user'] = users_getbyId($album['user_id']);

		if ($cur_user['id'] != $album['user_id'])
		{
			header('Location: '.WEB.'users/'.$cur_user['id']);
			exit;
		}
		
		$albums = albums_getByUserId($cur_user['id']);
		if ($album !== NULL) 
		{
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$name = $_POST['name'];
				$description = $_POST['description'];
				$private = 0;

				if (isset($_POST['privacy'])) 
				{
					$private = 1;
				}

				albums_DBedit($album_id, $name, $description, $private);
				
				header('Location: '.WEB.'albums/'.$album_id.'/edit');
			}
			else 
			{
				require(VIEWS."edit_album.php");
			}
		}
		else 
		{
			header('location: '.WEB.'albums');
		}
	}
?>