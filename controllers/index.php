<?php

	function index_index()
	{
		
		require(MODELS.'photo.php');
		require(MODELS.'users.php');

		if (isset($_SESSION['user']))
		{
			$user = users_getById($_SESSION['user']);
		}
		else
		{
			$user = [
				'name'=>'Гость'
			];
		}

		$photo = photos_getAll();
		
		require(VIEWS."view.php");

	}

?>