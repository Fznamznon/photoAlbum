<?php
	
	function users_getCurrentUser()
	{
		$db = get_db_connection();

		if (isset($_SESSION['user']) && !empty($_SESSION['user']))
		{
			$user = users_getById($_SESSION['user']);
		}
		else
		{
			$user = [
				'name' => 'Guest',
				'id' => -1,
			];
		}

		return $user;
	}


	function users_insert($login, $password, $name)
	{
		$db = get_db_connection();
		$c = $db->query("SELECT count(id) FROM users WHERE login = '$login'");
		$c = $c->fetch_row();

		if ($c[0] != 0)
		{
			return false;
		}

		$pass = sha1($password);

		$db->query("INSERT INTO users VALUES(NULL, '$login', '$pass', '$name')") or die($db->error);

		return $db->insert_id;
	}

	function users_tryLogin($login, $password)
	{
		$db = get_db_connection();

		$c = $db->query("SELECT count(id) FROM users WHERE login = '$login'");

		$c = $c->fetch_row();

		if ($c[0] == 0)
		{
			return false;
		}

		$pass = sha1($password);

		$tmp = $db->query("SELECT * FROM users WHERE password = '$pass' AND login = '$login'");

		$res = false;

		if ($tmp->num_rows != 0)
		{
			$res = $tmp->fetch_assoc();	
		}
		
		return $res;		
	}

	function users_getById($id)
	{
		$db = get_db_connection();

		$tmp = $db->query("SELECT * from users WHERE id = $id") or die($db->error);

		if ($tmp->num_rows != 0)
		{
			$user = $tmp->fetch_assoc();	
		}
		else
		{	
			$user = false;
		}

		return $user;
	}

?>