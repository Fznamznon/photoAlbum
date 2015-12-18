<?php
	function albums_index() {
		require(MODELS.'users.php');
		require(MODELS.'albums.php');
		$user = users_getCurrentUser();
		if ($user['id'] != -1)
		{
			$albums = albums_getbyUser($user);
			require(VIEWS.'albums.php');
		}
		else
			header('location:'.WEB.'login');
	}	
	
	function albums_add()
	{
		require(MODELS.'users.php');
		require(MODELS.'albums.php');
		$user = users_getCurrentUser();
		if ($user['id'] != -1)
		{
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$name = $_POST['name'];
				$description = $_POST['description'];
				albums_insert($name, $description, $user);
				header('location: '.WEB.'albums');
			}
			else
			{
				require(VIEWS.'add_album.php');
			}

		}
		else
			header('location:'.WEB.'login');

	}

	function albums_show($album_id) {
		require(MODELS."photo.php");
		require(MODELS."users.php");
		require(MODELS."albums.php");
		$user = users_getCurrentUser();
		$album = albums_getbyID($album_id);
		if ($album['user_id'] == $user['id']) {
			$photo = photos_getbyAlbum($album_id);
			require(VIEWS."album.php");
		}
		else
			header('location: '.WEB.'albums');
	}
	
	function albums_delete($album_id) {
		require(MODELS."photo.php");
		require(MODELS."users.php");
		require(MODELS."albums.php");
		$user = users_getCurrentUser();
		$album = albums_getbyID($album_id);
		if ($album['user_id'] == $user['id']) {
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				albums_DBdelete($album_id);
				header('location: '.WEB.'albums');
			}
			else
			{
				require(VIEWS."delete_album.php");
			}
		}
		#header('location: '.WEB.'albums');
	}

?>