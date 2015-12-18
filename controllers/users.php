<?php 

	function users_register()
	{
		require(MODELS."users.php");

		$errorString = null;

		$cur_user = users_getCurrentUser();

		if ($cur_user['id'] < 0)
		{
			if ($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$login = $_POST['login'];
				$password = $_POST['password'];
				$name = $_POST['name'];

				if (!users_insert($login, $password, $name)) 
				{
					$errorString = "Такой логин уже существует!";
					require(VIEWS.'users_register.php');
				}
				else 
				{
					header("location: ".WEB."login");
				}
			}
			else
			{
				require(VIEWS.'users_register.php');
			}
		}
	}

	function users_login()
	{
		require(MODELS."users.php");

		$cur_user = users_getCurrentUser();

		$errorString = null;

		if ($cur_user['id'] < 0)
		{
			if ($_SERVER['REQUEST_METHOD'] == "POST")
			{
				$login = $_POST['login'];
				$password = $_POST['password'];
			
				$user = users_tryLogin($login, $password);

				if ($user !== false)
				{
					$_SESSION['user'] = $user['id'];
					header("Location: ".WEB);
				}
				else 
				{
					$errorString = "Неверное сочетание логина и пароля";
					require(VIEWS.'users_login.php');
				}
			}
			else
			{
				require(VIEWS.'users_login.php');
			}
		}
		else
		{
			header("Location: ".WEB);
		}
	}

	function users_logout()
	{
		require(MODELS."users.php");

		$cur_user = users_getCurrentUser();

		if ($cur_user['id'] > 0)
		{
			unset($_SESSION['user']);
		}

		header('location: '.WEB);
	}

?>