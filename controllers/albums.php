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

	function albums_show($id) {
		require(MODELS."photo.php");
		require(MODELS."users.php");
		require(MODELS."albums.php");
		$user = users_getCurrentUser();
		$albumname = albums_getbyID($id)['name'];
		$photo = photos_getbyAlbum($id);
		require(VIEWS."album.php");
	}

?>