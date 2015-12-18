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
		/* main page */

		case empty($queryString):
		$controller = 'index';
		$action = 'index';
		$params = array();
		break;

		/* photos */

		case preg_match('/^photos\/([\d]+)\/?$/', $queryString, $matches) :
		$controller = 'photos';
		$action = 'show';
		$params = array($matches[1]);
		break;

		case preg_match('/^photos\/([\d]+)\/edit\/?$/', $queryString, $matches) :
		$controller = 'photos';
		$action = 'edit';
		$params = array($matches[1]);
		break;

		case preg_match('/^photos\/([\d]+)\/delete\/?$/', $queryString, $matches) :
		$controller = 'photos';
		$action = 'delete';
		$params = array($matches[1]);
		break;

		case preg_match('/^photos\/upload\/?$/', $queryString) :
		$controller = 'photos';
		$action = 'upload';
		$params = [];
		break;

		/* albums */
		
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

		case preg_match('/^albums\/([\d]+)\/?$/', $queryString, $matches):
		$controller = 'albums';
		$action = 'showById';
		$params = [$matches[1]];
		break;

		case preg_match('/^albums\/([\d]+)\/delete\/?$/', $queryString, $matches) :
		$controller = 'albums';
		$action = 'delete';
		$params = array($matches[1]);
		break;
		
		case preg_match('/^albums\/([\d]+)\/edit\/?$/', $queryString, $matches) :
		$controller = 'albums';
		$action = 'edit';
		$params = array($matches[1]);
		break;

		/* users */

		case preg_match('/^users\/([\d]+)\/albums\/?$/', $queryString, $matches) :
		$controller = 'albums';
		$action = 'showByUser';
		$params = [$matches[1]];
		break;

		case preg_match('/^users\/([\d]+)\/photos\/?$/', $queryString, $matches) :
		$controller = 'photos';
		$action = 'showByUser';
		$params = [$matches[1]];
		break;

		/* login, logout, register  */

		case preg_match('/^users\/register\/?$/', $queryString) :
		$controller = 'users';
		$action = 'register';
		$params = [];
		break;

		case preg_match('/^users\/login\/?$/', $queryString) :
		$controller = 'users';
		$action = 'login';
		$params = [];
		break;
		
		case preg_match('/^users\/logout\/?$/', $queryString) :
		$controller = 'users';
		$action = 'logout';
		$params = [];
		break;
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