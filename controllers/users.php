<?php 

	function users_register()
	{
		require(MODELS."users.php");
		$errorString = NULL;
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			
			$login = $_POST['login'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			if ($login == "") {
				$errorString = "Введите непустой логин";
				require(VIEWS."header.php");
				require(VIEWS.'users.php');
			}
			else {

				if (!users_insert($login, $password, $name)) {
					$errorString = "Такой логин уже существует!";
					require(VIEWS."header.php");
					require(VIEWS.'users.php');
				}
				else header("location: ".WEB."login");
			}
		}
		else
		{
			require(VIEWS."header.php");
			require(VIEWS.'users.php');
		}
		$errorString = NULL;
	}

	function users_login()
	{
		require(MODELS."users.php");
		if (!isset($_SESSION['user']) || $_SESSION['user'] == NULL) {
			$errorString = NULL;
			if ($_SERVER['REQUEST_METHOD'] == "POST")
			{
			
				$login = $_POST['login'];
				$password = $_POST['password'];
			
				$user = users_select($login, $password);
				if ($user !== false)
				{
					$_SESSION['user'] = $user['id'];
					header("location: ".WEB);
				}
				else {
					$errorString = "Неверное сочетание логина и пароля";
					require(VIEWS."header.php");
					require(VIEWS.'users_login.php');
				}
			}
			else
			{
				require(VIEWS."header.php");
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