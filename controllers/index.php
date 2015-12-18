<?php

	function index_index()
	{
		
		require(MODELS.'photo.php');
		require(MODELS.'users.php');

		$photo = photos_getAll();	
		
		if (isset($_SESSION['user']))
		{
			$user = users_getById($_SESSION['user']);
			require(VIEWS."view.php");
		}
		else
		{
			require(VIEWS."view_guest.php");
		}
	}

?>