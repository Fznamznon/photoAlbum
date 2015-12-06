<?php

	function get_db_connection()
	{
		static 	$db;
		$db = new mysqli("localhost", "root", "pass@word1", "photos");
		
		return $db;
	}
	

?>