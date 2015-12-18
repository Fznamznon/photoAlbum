<?php

	function index_index()
	{
		require(MODELS.'photo.php');
		require(MODELS.'users.php');

		$cur_user = users_getCurrentUser();
		
		$public_only = ($cur_user['id'] < 0);

		$photo = photos_getAll($public_only);
		
		require(VIEWS."index.php");
	}
?>