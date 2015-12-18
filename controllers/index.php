<?php

	function index_index()
	{
		
		require(MODELS.'users.php');
		$user = users_getCurrentUser();
		if ($user['id'] !== -1) {
			header('location: '.WEB.'albums');
		}
		else {
			header('location: '.WEB.'public');
		}
		
		
	}
?>