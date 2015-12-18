<?php

	function photos_getAll($public_only)
	{
		$db = get_db_connection();

		if ($public_only)
		{
			$sql = "SELECT * FROM photo LEFT JOIN albums ON albums.id = photo.album_id WHERE albums.private != 1";
		}
		else
		{
			$sql = "SELECT * FROM photo";
		}

		$tmp = $db->query($sql) or die($db->error);

		if ($tmp->num_rows != 0)
		{
			while ($row = $tmp->fetch_assoc())
			{
				$photo[] = $row;
			}	
		}
		else
		{
			$photo = [];
		}

		return $photo;
	}

	function photos_getByAlbumId($album_id)
	{
		$db = get_db_connection();

		$tmp = $db->query("SELECT * FROM photo WHERE album_id = {$album_id}");
		
		$photo = [];

		if ($tmp->num_rows != 0)
		{
			while ($row = $tmp->fetch_assoc())
			{
				$photo[] = $row;
			}	
		}

		return $photo;
	}

	function photos_getById($id)
	{
		$db = get_db_connection();

		$tmp = $db->query("SELECT * from photo WHERE id = $id");

		if ($tmp->num_rows != 0)
		{
			$photo = $tmp->fetch_assoc();	
		}

		return $photo;
	}

	function photos_update($photo_id, $name, $description, $album_id)
	{
		$db = get_db_connection();

		$sql = "UPDATE photo SET name = '{$name}', description = '{$description}', album_id = {$album_id} WHERE id = {$photo_id}";

		return $db->query($sql) or die($db->error);
	}

	function photos_insert($name, $description, $filename, $user_id, $album_id)
	{
		$db = get_db_connection();

		$db->query("INSERT INTO photo VALUES (NULL, '$name', '$description', '$filename', $user_id, {$album_id})") or die($db->error);
		return $db->insert_id;
	}
	
	function photos_deleteById($photo_id) 
	{
		$db = get_db_connection();



		$tmp = $db->query("SELECT filename FROM photo WHERE id = {$photo_id}") or die ($db->error);
			
		$filename = array_shift($tmp->fetch_row());

		$db->query("DELETE FROM photo WHERE id = ".$photo_id) or die ($db->error);
		unlink(ROOT.'files/'.$filename);
	}

	function generate_filename($name)
	{
		$db = get_db_connection();
		$ex = explode('.', $name);
		$ex = $ex[count($ex) - 1];
		$i = 0;

		do {

			$i++;
			$filename = md5($name.$i).time().'.'.$ex;

			$c = $db->query("SELECT count(id) FROM photo WHERE filename = '$filename'");
			$c = $c->fetch_row();

		}while ($c[0] != 0);

		return $filename;
	}

	function photos_getByUserId($user_id, $public_only)
	{
		$db = get_db_connection();

		if ($public_only)
		{
			$sql = "SELECT
					p.id,
					p.user_id,
					p.name,
					p.description,
					p.album_id
				FROM
					photo AS p
				LEFT JOIN
					albums AS a
				ON
					a.id = p.album_id
				WHERE
					p.user_id = {$user_id}
				AND
					a.private != 1";
		}
		else
		{
			$sql = "SELECT * FROM photo WHERE user_id = $user_id";
		}

		$tmp = $db->query($sql) or die($db->error);
		
		if ($tmp->num_rows != 0)
		{
			while ($row = $tmp->fetch_assoc())
			{
				$photo[] = $row;
			}	
		}
		else
		{
			$photo = [];
		}

		return $photo;
	}

?>