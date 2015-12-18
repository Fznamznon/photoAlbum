<?php

	function index_index()
	{
		require(MODELS.'photo.php');
		require(MODELS.'users.php');

		$cur_user = users_getCurrentUser();
		
		$photo = photos_getAll();
		
		require(VIEWS."index.php");
	}
?>