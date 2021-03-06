<?php
	error_reporting(E_ALL);
	session_start();
	define('WEB', "http://localhost/photoAlbum/");
	define('UPLOAD', WEB.'files/');
	define('INC', WEB.'inc/');

	define('ROOT', realpath(dirname(__FILE__)).'/');
	define('APP', ROOT.'app/');
	define('MODELS', ROOT.'models/');
	define('CONTROLLERS', ROOT.'controllers/');
	define('VIEWS', ROOT.'views/');

	require(APP."db.php");
			
	get_db_connection()->query("set names UTF-8");

	$queryString = $_SERVER['REQUEST_URI'];

	$qmPos = strpos($queryString, '?');

	if ($qmPos != 0)
	{
		$queryString = substr($queryString, 0, $qmPos);
	}

	$tmp = explode('/', $queryString);
	$tmp = array_filter($tmp);
	array_shift($tmp);
	$queryString = implode('/', $tmp);
	
	$controller = "";
	
	switch(true)
	{
		case empty($queryString):
		$controller = 'index';
		$action = 'index';
		$params = array();
		break;

		case preg_match('/^photos\/(\d+)$/', $queryString, $matches) :
		$controller = 'photos';
		$action = 'show';
		$params = array($matches[1]);
		break;

		case preg_match('/^photos\/upload\/?$/', $queryString) :
		$controller = 'photos';
		$action = 'upload';
		$params = [];
		break;

		case preg_match('/^register\/?$/', $queryString) :
		$controller = 'users';
		$action = 'register';
		$params = [];
		break; 

		case preg_match('/^login\/?$/', $queryString) :
		$controller = 'users';
		$action = 'login';
		$params = [];
		break;
		
		case preg_match('/^logout\/?$/', $queryString) :
		$controller = 'users';
		$action = 'logout';
		$params = [];
		break;
		
		case preg_match('/^public\/?$/', $queryString) :
		$controller = 'albums';
		$action = 'public';
		$params = [];
		break;
		
		case preg_match('/^albums\/?$/', $queryString) :
		$controller = 'albums';
		$action = 'index';
		$params = [];
		break;
		
		case preg_match('/^albums\/add\/?$/', $queryString) :
		$controller = 'albums';
		$action = 'add';
		$params = [];
		break;
		
		case preg_match('/^albums\/delete\/(\d+)$/', $queryString, $matches) :
		$controller = 'albums';
		$action = 'delete';
		$params = array($matches[1]);
		break;
		
		case preg_match('/^albums\/edit\/(\d+)$/', $queryString, $matches) :
		$controller = 'albums';
		$action = 'edit';
		$params = array($matches[1]);
		break;
		
		case preg_match('/^albums\/(\d+)$/', $queryString, $matches) :
		$controller = 'albums';
		$action = 'show';
		$params = array($matches[1]);
	}

	$filename = CONTROLLERS.$controller.'.php';

	if (file_exists($filename) && is_readable($filename))
	{
		require($filename);

		$functionName = $controller.'_'.$action;	

		if (function_exists($functionName))
		{
			if (is_callable($functionName))
			{
				call_user_func_array($functionName, $params);
			}
			else
			{
				echo "error";
			}

		}
		else
		{
			echo "404";
		}
	}
	else
	{
		echo "cannot open file";

	}

		

?>