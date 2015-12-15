<?php

	function albums_insert($name, $description, $user)
	{
		$db = get_db_connection();
		
		$db->query("INSERT INTO albums VALUES (NULL, '$name', {$user['id']}, '{$description}')") or die($db->error);

	}

	function albums_getByUser($user)
	{
		$db = get_db_connection();

		
		if ($user['id'] != -1)
		{
			$tmp = $db->query("SELECT * FROM albums WHERE user_id = {$user['id']}") or die($db->error);
			if ($tmp->num_rows != 0)
			{
				while($row = $tmp->fetch_assoc())
				{
					$albums[] = $row;
				}
			}
			else
				$albums = [];
		}
		return $albums;

	}

	function albums_getById($id)
	{
		$db = get_db_connection();
		if (is_null($id)) return false;
		$tmp = $db->query("SELECT * FROM albums WHERE id = $id");

		if ($tmp->num_rows != 0)
		{
			
			$a = $tmp->fetch_assoc();	

		}

		return $a;

	}

?>