<?php
	
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
			}
			else
			{
				require(VIEWS.'add_album.php');
			}

		}
		else
			header('location:'.WEB.'login');

	}


?>