<?php
	
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
				albums_insert($name, $description, $cur_user);
			}
			else
			{
				require(VIEWS.'add_album.php');
			}

		}
		else
			header('location:'.WEB.'login');

	}

	function albums_showByUser($id)
	{
		require(MODELS.'users.php');
		require(MODELS.'albums.php');

		$cur_user = users_getById($id);

		if($cur_user === false)
		{
			header('location:'.WEB);
		}
		else
		{
			$albums = albums_getByUser($cur_user);
			require(VIEWS.'show_albums.php');
		}

	}

	function albums_showById($id)
	{
		require(MODELS.'albums.php');
		require(MODELS.'users.php');

		$cur_user = users_getCurrentUser();

		$album = albums_getById($id);
		if ($album === false)
		{
			echo "Нельзя просто так взять и показать";
		}
		else
		{
			require(MODELS.'photo.php');
			$photo = photos_getByAlbum($id);

			require(VIEWS.'show_photos_by_album.php');

		}
	}

?>