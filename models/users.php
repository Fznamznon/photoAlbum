<?php
	
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

		$db->query("INSERT INTO users VALUES(NULL, '$login', '$pass', '$name')");

		return true;

	}

	function users_select($login, $password)
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

		if ($tmp->num_rows != 0)
		{
			
			$user = $tmp->fetch_assoc();	
			return $user;
		}
		else
			return false;

		
	}

	function users_getById($id)
	{
		$db = get_db_connection();

		$tmp = $db->query("SELECT * from users WHERE id = $id");


		if ($tmp->num_rows != 0)
		{
			
			$user = $tmp->fetch_assoc();	

		}

		return $user;

	}

?>