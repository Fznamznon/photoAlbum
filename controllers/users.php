<?php 

	function users_register()
	{
		require(MODELS."users.php");

		$cur_user = users_getCurrentUser();

		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			$name = $_POST['name'];

			

			if (!users_insert($login, $password, $name))
				echo "Такой логин уже существует";
		}
		else
		{
			require(VIEWS.'users_register.php');

		}
	}

	function users_login()
	{
		require(MODELS."users.php");

		$cur_user = users_getCurrentUser();

		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			
			$login = $_POST['login'];
			$password = $_POST['password'];
			

			$user = users_select($login, $password);
			if ($user !== false)
			{
				$_SESSION['user'] = $user['id'];
				header('Location: '.WEB);
			}
			else
			{
				echo "error";
			}
		}
		else
		{
			require(VIEWS.'users_login.php');
		}
	}

	function users_logout()
	{
		require(MODELS."users.php");

		$cur_user = users_getCurrentUser();

		if ($cur_user['id'] != -1)
		{
			$cur_user['id'] = -1;
			$cur_user['name'] = 'Guest';

			unset($_SESSION['user']);

		}

		header('location: '.WEB);

	}

?>