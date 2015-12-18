<?php

	function albums_getAll($public_only = false)
	{
		$db = get_db_connection();

		$sql = "SELECT * FROM albums";

		if ($public_only)
		{
			$sql .= " WHERE private != 1";
		}

		$tmp = $db->query($sql) or die($db->error);
		if ($tmp->num_rows != 0)
		{
			while($row = $tmp->fetch_assoc())
			{
				$albums[] = $row;
			}
		}
		else
		{
			$albums = [];
		}

		return $albums;
	}

	function albums_insert($name, $description, $user_id, $private)
	{
		$db = get_db_connection();
		
		$db->query("INSERT INTO albums VALUES (NULL, '$name', {$user_id}, '$private', '{$description}')") or die($db->error);

		return $db->insert_id;
	}

	function albums_deleteById($album_id) 
	{
		$db = get_db_connection();
		$db->query("DELETE FROM albums WHERE id = {$album_id}") or die($db->error);
	}

	function albums_deleteByIdWithPhotos($album_id) 
	{
		$db = get_db_connection();

		$sql = "SELECT filename FROM photo WHERE album_id = {$album_id}";

		$res = $db->query($sql) or die($db->error);
		while ($tmp = $res->fetch_row())
		{
			$filename = $tmp[0];
			unlink(ROOT.'files/'.$filename);
		}

		$sql = "DELETE FROM photo WHERE album_id = {$album_id}";

		$db->query($sql);

		albums_deleteById($album_id);
	}
	
	function albums_DBedit($album_id, $name, $description, $private){
		$db = get_db_connection();
		$db->query("UPDATE albums SET name='".$name."', description='".$description."', private=".$private." WHERE id = ".$album_id) or die($db->error);
	}
	
	function albums_getByUserId($user_id, $public_only = false)
	{
		$db = get_db_connection();

		if ($public_only)
		{
			$sql = "SELECT * FROM albums WHERE user_id = {$user_id} AND private != 1";
		}
		else
		{
			$sql = "SELECT * FROM albums WHERE user_id = {$user_id}";
		}

		$tmp = $db->query($sql) or die($db->error);
		
		if ($tmp->num_rows != 0)
		{
			while($row = $tmp->fetch_assoc())
			{
				$albums[] = $row;
			}
		}
		else
		{
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
		else
		{
			$a = false;
		}

		return $a;
	}

	function albums_movePhotos($source_album_id, $destination_album_id)
	{
		$db = get_db_connection();

		$sql = "UPDATE photo SET album_id = {$destination_album_id} WHERE album_id = {$source_album_id}";

		return $db->query($sql);
	}

?>