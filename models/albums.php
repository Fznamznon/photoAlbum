<?php

	function albums_getAllPublic() {
		$db = get_db_connection();
		$tmp = $db->query("SELECT * FROM albums WHERE private=0") or die($db->error);
			if ($tmp->num_rows != 0)
			{
				while($row = $tmp->fetch_assoc())
				{
					$albums[] = $row;
				}
			}
			else
				$albums = [];
		return $albums;
	}

	function albums_insert($name, $description, $user, $private)
	{
		$db = get_db_connection();
		
		$db->query("INSERT INTO albums VALUES (NULL, '$name', {$user['id']}, '$private', '{$description}')") or die($db->error);

	}

	function albums_DBdelete($album_id) {
		$db = get_db_connection();
		$db->query("DELETE FROM photo WHERE album_id=$album_id") or die($db->error);
		$db->query("DELETE FROM albums WHERE id=$album_id") or die($db->error);
	}
	
	function albums_DBedit($album_id, $name, $description, $private){
		$db = get_db_connection();
		$db->query("UPDATE albums SET name='".$name."', description='".$description."', private=".$private." WHERE id = ".$album_id) or die($db->error);
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

		$a = NULL;
		if ($tmp->num_rows != 0)
		{
			
			$a = $tmp->fetch_assoc();	

		}

		return $a;

	}

?>