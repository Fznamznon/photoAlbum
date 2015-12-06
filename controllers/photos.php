<?php

	function photos_show($id)
	{
		require(APP."db.php");

		$tmp = $db->query("SELECT * from photo WHERE id = $id");

		if ($tmp->num_rows != 0)
		{
			
			$photo = $tmp->fetch_assoc();	

		}
		require(VIEWS."photo.php");

	}

	function photos_upload()
	{

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			


			if ($_FILES['file']['error'] == 0)
			{
				$name = md5($_FILES['file']['name']).time();
				$tmp = explode(".", $_FILES['file']['name']);
				$name = $name.".".$tmp[count($tmp) - 1];
				if (move_uploaded_file($_FILES['file']['tmp_name'], ROOT."upload/{$name}"))
				{
					require(APP."db.php");
					$db->query("INSERT INTO photo VALUES (NULL, '{$_POST['name']}', '', '{$name}')");
					header(WEB);
					exit();
				}

			}
		}

		echo "Fail";
	}


?>