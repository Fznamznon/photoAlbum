<?php

	function index_index()
	{
		
		require(MODELS.'photo.php');

		$photo = photos_getAll();
		
		require(VIEWS."view.php");

	}

?>