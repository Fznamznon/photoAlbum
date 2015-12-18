<?php

	function get_db_connection()
	{
		static 	$db;
		$db = new mysqli("localhost", "root", "", "photos");
		
		return $db;
	}
	

?>
