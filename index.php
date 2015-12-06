<?php
	error_reporting(E_ALL);

	define('WEB', "http://localhost/photoAlbum/");
	define('UPLOAD', WEB.'upload/');

	define('ROOT', realpath(dirname(__FILE__)).'/');
	define('APP', ROOT.'app/');
	define('MODELS', ROOT.'models/');
	define('CONTROLLERS', ROOT.'controllers/');
	define('VIEWS', ROOT.'views/');

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

		}
	}

		

?>