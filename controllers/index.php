<?php

	function index_index()
	{
		
		require(MODELS.'photo.php');
		require(MODELS.'users.php');

		$photo = photos_getAll();	
		
		$user = users_getCurrentUser();
		require(VIEWS."header.php");
		require(VIEWS."view.php");
	}
	
?>