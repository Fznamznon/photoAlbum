<?php

	function photos_show($id)
	{
		require(MODELS."photo.php");
		require(MODELS."users.php");
		require(MODELS."albums.php");

		$cur_user = users_getCurrentUser();

		$photo = photos_getById($id);
		$photo['user'] = users_getById($photo['user_id']);
		$photo['album'] = albums_getById($photo['album_id']);
		if ($photo['album'] == false) $photo['album'] = ['id' => -1, 'name' => 'Без альбома'];
		require(VIEWS."photo.php");

	}

	function photos_upload()
	{

		require(MODELS."photo.php");
		require(MODELS."users.php");

		$cur_user = users_getCurrentUser();

		if ($cur_user['id'] > 0)
		{
			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				if ($_FILES['file']['error'] == 0)
				{
						$name = $_POST['name'];
						$album = $_POST['album'];
						$filename = generate_filename($_FILES['file']['name']);
						if (move_uploaded_file($_FILES['file']['tmp_name'], ROOT."files/{$filename}"))
						{
							photos_insert($name, '', $filename, $cur_user['id'], $album);
							header('location: '.WEB);
							exit();
						}
				}
			}
			else
			{
				require(MODELS."albums.php");
				$albums = albums_getByUser($cur_user);
				require(VIEWS."upload.php");
			}
		}
		else
			header('location:'.WEB.'/login');
		
	}

	function photos_showByUser($id)
	{
		require(MODELS."photo.php");
		require(MODELS."users.php");

		$cur_user = users_getCurrentUser();
		$user = users_getById($id);
		$photo = photos_getByUser($id);

		require(VIEWS.'show_photos_by_user.php');

	}


?>