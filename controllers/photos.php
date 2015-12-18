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
		require(VIEWS.'header.php');
		require(VIEWS."photo.php");

	}

	function photos_upload()
	{
		require(MODELS."photo.php");
		require(MODELS."users.php");
		$errorString = null;
		if (isset($_SESSION['user']))
		{
			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				

				if ($_FILES['file']['error'] == 0)
				{

						$name = $_POST['name'];
						$description = $_POST['description'];
						$user = $_SESSION['user'];
						$album = $_POST['album'];
						$filename = generate_filename($_FILES['file']['name']);
						if (move_uploaded_file($_FILES['file']['tmp_name'], ROOT."files/{$filename}"))
						{
							photos_insert($name, $description, $filename, $user, $album);
							header('location: '.WEB);
							exit();
						}
				}
				else {
					$errorString = "Не выбрана фотография";
					$user = users_getCurrentUser();
					require(MODELS."albums.php");
					$albums = albums_getByUser($user);
					require(VIEWS.'header.php');
					require(VIEWS."upload.php");
				}
			}
			else
			{
				$errorString = null;
				$user = users_getCurrentUser();
				require(MODELS."albums.php");
				$albums = albums_getByUser($user);
				require(VIEWS.'header.php');
				require(VIEWS."upload.php");
			}
		}
		else
			header('location:'.WEB.'login');
		
	}




?>