<?php
	
	$root = dirname(dirname(__FILE__));

	//config
	require_once('../app/config/config.php');

	//environment
	require_once('../app/config/environment.php');

	//autoloader
	require_once('../app/autoload.php');
	
	// echo DIRECTORY_SEPARATOR;
	$bootstrap = new Bootstrap();
?>