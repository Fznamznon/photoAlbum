<?php

	function index_index()
	{
		require(APP."db.php");

		$tmp = $db->query("SELECT * from photo");
		$photo = array();
		if ($tmp->num_rows != 0)
		{
			
			while ($row = $tmp->fetch_assoc())
			{
				$photo[] = $row;

			}	

		}
		require(VIEWS."view.php");

	}

?>