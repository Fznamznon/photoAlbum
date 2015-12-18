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

		if ($photo['album']['private'] && $cur_user['id'] != $photo['album']['user_id'])
		{
			header('Location: '.WEB);
			exit;
		}
		else
		{
			require(VIEWS."photo.php");
		}
	}

	function photos_edit($photo_id)
	{
		require(MODELS."photo.php");
		require(MODELS."users.php");
		require(MODELS."albums.php");

		$cur_user = users_getCurrentUser();

		$photo = photos_getById($photo_id);

		if ($cur_user['id'] == $photo['user_id'])
		{
			$albums = albums_getByUserId($cur_user['id']);

			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$photo_id = $_POST['photo_id'];
				$name = $_POST['name'];
				$description = $_POST['description'];
				$move = (isset($_POST['move']) && !empty($_POST['move']));
				$destination_album_id = ($move) ? $_POST['destination_album_id'] : $photo['album_id'];

				photos_update($photo_id, $name, $description, $destination_album_id);

				Header('Location: '.WEB.'photos/'.$photo_id);
				exit;
			}
			else
			{
				require(VIEWS.'edit_photo.php');
			}
		}
		else
		{
			Header('Location: '.WEB.'users/'.$cur_user['id'].'/photos');
			exit;
		}
	}

	function photos_delete($photo_id)
	{
		require(MODELS."photo.php");
		require(MODELS."users.php");
		require(MODELS."albums.php");

		$cur_user = users_getCurrentUser();

		$photo = photos_getById($photo_id);

		if ($cur_user['id'] == $photo['user_id'])
		{
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$photo_id = $_POST['photo_id'];

				photos_deleteById($photo_id);

				Header('Location: '.WEB.'users/'.$cur_user['id'].'/photos');
				exit;
			}
			else
			{
				require(VIEWS.'delete_photo.php');
			}
		}
		else
		{
			Header('Location: '.WEB.'users/'.$cur_user['id'].'/photos');
			exit;
		}
	}

	function photos_upload()
	{
		require(MODELS."photo.php");
		require(MODELS."users.php");
		require(MODELS."albums.php");

		$cur_user = users_getCurrentUser();

		if ($cur_user['id'] > 0)
		{
			$albums = albums_getByUserId($cur_user['id']);
			$errorString = null;

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				if ($_FILES['file']['error'] == 0)
				{
					$name = $_POST['name'];
					$description = $_POST['description'];
					$album_id = $_POST['album_id'];
					$filename = generate_filename($_FILES['file']['name']);

					if (move_uploaded_file($_FILES['file']['tmp_name'], ROOT."files/{$filename}"))
					{
						$photo_id = photos_insert($name, $description, $filename, $cur_user['id'], $album_id);
						header('location: '.WEB);
						exit();
					}
					else
					{
						$errorString = "Не удалось сохранить фотографию";
					
						require(VIEWS."upload.php");
					}
				}
				else 
				{
					$errorString = "Не удалось загрузить фотографию";
					
					require(VIEWS."upload.php");
				}
			}
			else
			{
				require(VIEWS."upload.php");
			}
		}
		else
		{
			header('location:'.WEB.'login');
		}
	}

	function photos_showByUser($user_id)
	{
		require(MODELS."photo.php");
		require(MODELS."users.php");

		$cur_user = users_getCurrentUser();

		$user = users_getById($user_id);

		$public_only = ($cur_user['id'] != $user_id);

		$photos = photos_getByUserId($user_id, $public_only);

		require(VIEWS.'show_photos_by_user.php');
	}

?>