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
			$photo = [];

		return $photo;

	}

	function photos_getByAlbum($album_id) {
		$db = get_db_connection();
		$tmp = $db->query("SELECT * from photo WHERE album_id = $album_id");
		
		if ($tmp->num_rows != 0) {
			while ($row = $tmp->fetch_assoc()) {
				$photo[] = $row;
			}	
		}
		else $photo =[];
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

	function photos_insert($name, $description, $filename, $user, $album)
	{
		$db = get_db_connection();

		if ($album == -1)
			$album = 'NULL';
		$db->query("INSERT INTO photo VALUES (NULL, '$name', '$description', '$filename', '$user', ".$album.")");
	}
	
	function photos_deletebyID($photo_id) {
		$db = get_db_connection();
		$db->query("DELETE FROM photo WHERE id = ".$photo_id) or die ($db->error);
	}
	
	function photos_edit($photo_id, $name, $description, $album) {
		$db = get_db_connection();
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

?>