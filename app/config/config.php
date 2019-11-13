<?php
	define('DS', DIRECTORY_SEPARATOR); 	
	//application root
	define('APPROOT' , dirname(dirname(__FILE__)));

	define('PUBLIC_ROOT' , dirname(dirname(dirname(__FILE__))).'/public');
	//core root
	define('CORE' , APPROOT.DS.'core');
	//models
	define('MODELS' , APPROOT.DS.'models');
	//views
	define('VIEWS' , APPROOT.DS.'views');
	//controllers
	define('CNTLRS' , APPROOT.DS.'controllers');
	//helpers root
	define('HELPERS', APPROOT.DS.'helpers');
	//library
	define('LIBS' , APPROOT.DS.'libraries');
	//funtions
	define('FNCTNS' ,  APPROOT.DS.'functions');

	//base controller

	define('BASECONTROLLER' , 'MVC');

	define('BASEMETHOD' , 'index');


	define('SITENAME' , 'ISOCIALNETWORK MVC FRAMEWORK');
	//set timezone

	date_default_timezone_set("Asia/Manila");