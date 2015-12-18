<?php
	function albums_index() {
		require(MODELS.'users.php');
		require(MODELS.'albums.php');
		$user = users_getCurrentUser();
		if ($user['id'] != -1)
		{
			$albums = albums_getbyUser($user);
			require(VIEWS."header.php");
			require(VIEWS.'albums.php');
		}
		else
			header('location:'.WEB);
	}	
	
	function albums_public() {
		require(MODELS.'users.php');
		require(MODELS.'albums.php');
		$albums = albums_getAllPublic();
		require(VIEWS."header.php");
		require(VIEWS.'public.php');
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
				$private = 0;
				if (isset($_POST['privacy'])) $private = 1;
				albums_insert($name, $description, $user, $private);
				header('location: '.WEB.'albums');
			}
			else
			{
				require(VIEWS.'header.php');
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
		if ($album != NULL) {
			$album['user'] = users_getbyID($album['user_id']);
			if ($album['user_id'] == $user['id'] or $album['private'] == 0) {
				$photo = photos_getbyAlbum($album_id);
				require(VIEWS."header.php");
				require(VIEWS."album.php");
			}
			else {
				header('location: '.WEB);
			}
		}
		else {
			header('location: '.WEB);
		}
	}
	
	function albums_delete($album_id) {
		require(MODELS."photo.php");
		require(MODELS."users.php");
		require(MODELS."albums.php");
		$user = users_getCurrentUser();
		$album = albums_getbyID($album_id);
		if ($album !== NULL) {
			if ($album['user_id'] == $user['id']) {
				if ($_SERVER['REQUEST_METHOD'] == 'POST')
				{
					$photos = photos_getbyAlbum($album_id);
					foreach ($photos as $ph) {
						unlink(ROOT."files/".$ph['filename']);
					}
					albums_DBdelete($album_id);
					header('location: '.WEB.'albums');
				}
				else
				{
					require(VIEWS.'header.php');
					require(VIEWS."delete_album.php");
				}
			}
			else {
				header('location: '.WEB.'albums');
			}
		}
		else {
			header('location: '.WEB.'albums');
		}
	}
		
	function albums_edit($album_id) {
		require(MODELS."photo.php");
		require(MODELS."users.php");
		require(MODELS."albums.php");
		$user = users_getCurrentUser();
		$album = albums_getbyID($album_id);
		$albums = albums_getByUser($user);
		if ($album !== NULL) {
			$album['user'] = users_getbyID($album['user_id']);
			if ($album['user_id'] == $user['id']) {
				if ($_SERVER['REQUEST_METHOD'] == 'POST')
				{
					$name = $_POST['name'];
					$description = $_POST['description'];
					$private = 0;
					if (isset($_POST['photos_to_delete'])) {
						$photos_to_delete = $_POST['photos_to_delete'];
					}
					else $photos_to_delete = [];
					$edited_photos = $_POST['edited_photos'];
					$edited_photos_desc = $_POST['edited_photos_desc'];
					$to_album = $_POST['to_album'];
					if (isset($_POST['privacy'])) $private = 1;
					albums_DBedit($album_id, $name, $description, $private);
					foreach ($edited_photos as $key => $value) {
						photos_edit($key, $value, $edited_photos_desc[$key], $to_album[$key]);
					}
					if (count($photos_to_delete)) {
						foreach($photos_to_delete as $photo_id) {
							$ph = photos_getById($photo_id);
							unlink(ROOT."files/".$ph['filename']);
							photos_deletebyID($photo_id);
						}
					}
					header('location: '.WEB.'albums/'.$album['id']);
				}
				else {
					$photo = photos_getbyAlbum($album_id);
					require(VIEWS.'header.php');
					require(VIEWS."edit_album.php");
				}
			}
			else {
				header('location: '.WEB.'albums');
			}
		}
		else {
			header('location: '.WEB.'albums');
		}
	}
?>