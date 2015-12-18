<?php

	function photos_getAll()
	{
		$db = get_db_connection();

		$tmp = $db->query("SELECT * from photo");

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

	function photos_insert($name, $description, $filename, $user_id, $album_id)
	{
		$db = get_db_connection();

		$db->query("INSERT INTO photo VALUES (NULL, '$name', '$description', '$filename', $user_id, {$album_id})") or die($db->error);
		return $db->insert_id;
	}
	
	function photos_deletebyID($photo_id) {
		$db = get_db_connection();
		$tmp = $db->query("SELECT album_id FROM photo WHERE id = ".$photo_id) or die ($db->error);
		if ($tmp->num_rows != 0) {
			$album = $tmp->fetch_assoc()['album_id'];
			
			$db->query("DELETE FROM photo WHERE id = ".$photo_id) or die ($db->error);
			
			$tmp = $db->query("SELECT numberofphotos FROM albums WHERE id=".$album);
			if ($tmp->num_rows != 0) {
				$num = $tmp->fetch_assoc()['numberofphotos'];
				$num -= 1;
				$db->query("UPDATE albums SET numberofphotos=".$num." WHERE id=".$album) or die($db->error);
			}
		}
		
	}
	
	function photos_edit($photo_id, $name, $description, $album) {
		$db = get_db_connection();
		$tmp = $db->query("SELECT album_id FROM photo WHERE id = ".$photo_id) or die ($db->error);
		if ($tmp->num_rows != 0) {
			$old_album = $tmp->fetch_assoc()['album_id'];
			if ($old_album != $album) {
				
				$tmp = $db->query("SELECT numberofphotos FROM albums WHERE id=".$old_album);
				if ($tmp->num_rows != 0) {
					$num = $tmp->fetch_assoc()['numberofphotos'];
					$num -= 1;
					$db->query("UPDATE albums SET numberofphotos=".$num." WHERE id=".$old_album) or die($db->error);
				}
				
				$tmp = $db->query("SELECT numberofphotos FROM albums WHERE id=".$album);
				if ($tmp->num_rows != 0) {
					$num = $tmp->fetch_assoc()['numberofphotos'];
					$num += 1;
					$db->query("UPDATE albums SET numberofphotos=".$num." WHERE id=".$album) or die($db->error);
				}
			}
		}
		$db->query("UPDATE photo SET name='".$name."', description='".$description."', album_id=".$album." WHERE id=".$photo_id) or die ($db->error);
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

	function photos_getByUserId($user_id, $private_only)
	{
		$db = get_db_connection();

		if ($private_only)
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