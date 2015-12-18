<?php 

	function users_register()
	{
		$errorString = NULL;
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			
			$login = $_POST['login'];
			$password = $_POST['password'];
			$name = $_POST['name'];

			require(MODELS."users.php");

			if (!users_insert($login, $password, $name)) {
				$errorString = "Такой логин уже существует!";
				require(VIEWS.'users.php');
			}
			else header("location: ".WEB);
		}
		else
		{
			require(VIEWS.'users.php');
		}
		$errorString = NULL;
	}

	function users_login()
	{
		if ($_SESSION['user'] == NULL) {
			$errorString = NULL;
			if ($_SERVER['REQUEST_METHOD'] == "POST")
			{
			
				$login = $_POST['login'];
				$password = $_POST['password'];
			
				require(MODELS."users.php");
				$user = users_select($login, $password);
				if ($user !== false)
				{
					$_SESSION['user'] = $user['id'];
					header("location: ".WEB);
				}
				else {
					$errorString = "Неверное сочетание логина и пароля";
					require(VIEWS.'users_login.php');
				}
			}
			else
			{
				require(VIEWS.'users_login.php');
			}
			$errorString = NULL;
		}
		else header("location: ".WEB);
	}
	
	function users_logout()
	{
		$_SESSION['user'] = NULL;
		header("location: ".WEB);
	}

?>