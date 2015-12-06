<?php

	function photos_show($id)
	{
		require(MODELS."photo.php");

		$photo = photos_getById($id);
		
		require(VIEWS."photo.php");

	}

	function photos_upload()
	{

		require(MODELS."photo.php");

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			

			if ($_FILES['file']['error'] == 0)
			{

				$name = $_POST['name'];
				$filename = generate_filename($_FILES['file']['name']);
				if (move_uploaded_file($_FILES['file']['tmp_name'], ROOT."upload/{$filename}"))
				{
					photos_insert($name, '', $filename);
					header('location: '.WEB);
					exit();
				}

			}
		}

		echo "Fail";
	}




?>