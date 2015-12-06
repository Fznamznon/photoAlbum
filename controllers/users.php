<?php 

	function users_register()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			
			$login = $_POST['login'];
			$password = $_POST['password'];
			$name = $_POST['name'];

			require(MODELS."users.php");

			if (!users_insert($login, $password, $name))
				echo "Такой логин уже существует";

		}
		else
		{
			require(VIEWS.'users.php');

		}

	}

	function users_login()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			
			$login = $_POST['login'];
			$password = $_POST['password'];
			

			require(MODELS."users.php");
			$user = users_select($login, $password);
			if ($user !== false)
			{
				$_SESSION['user'] = $user['id'];
			}
			

		}
		else
		{
			require(VIEWS.'users_login.php');

		}

	}

?>