<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		echo "<pre>";
		print_r($_FILES);


		if ($_FILES['file']['error'] == 0)
		{
			$name = md5($_FILES['file']['name']).time();
			$tmp = explode(".", $_FILES['file']['name']);
			$name = $name.".".$tmp[count($tmp) - 1];
			if (move_uploaded_file($_FILES['file']['tmp_name'], "upload/{$name}"))
			{
				require("db.php");
				$db->query("INSERT INTO photo VALUES (NULL, '{$_POST['name']}', '', '{$name}')");
				header('location: index.php');
				exit();
			}

		}
	}

	echo "Fail";


?>