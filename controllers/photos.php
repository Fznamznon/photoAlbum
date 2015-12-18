<?php

	function photos_show($id)
	{
		require(MODELS."photo.php");
		require(MODELS."users.php");
		require(MODELS."albums.php");
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
		if (isset($_SESSION['user']))
		{
			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				

				if ($_FILES['file']['error'] == 0)
				{

						$name = $_POST['name'];
						$user = $_SESSION['user'];
						$album = $_POST['album'];
						$filename = generate_filename($_FILES['file']['name']);
						if (move_uploaded_file($_FILES['file']['tmp_name'], ROOT."files/{$filename}"))
						{
							photos_insert($name, '', $filename, $user, $album);
							header('location: '.WEB);
							exit();
						}
				}
			}
			else
			{
				$user = users_getCurrentUser();
				require(MODELS."albums.php");
				$albums = albums_getByUser($user);
				require(VIEWS."upload.php");
			}
		}
		else
			header('location:'.WEB.'login');
		
	}




?>