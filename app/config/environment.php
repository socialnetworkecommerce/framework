<?php 	
	
	//select your environment
	$env = 'local';

	//environment details
	switch($env){
		case 'local' :

			define('URL' , 'http://acme.isocialframework');
			
			define('DBVENDOR' , 'mysql');
			define('DBHOST' , 'localhost');
			define('DBUSER' , 'root');
			define('DBPASS' , '');
			define('DBNAME' , 'frameworktest');

			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
				
		break;

		case 'dev' :

			define('URL' , 'http://acme.socialnetwork');
			
			define('DBVENDOR' , 'mysql');
			define('DBHOST' , 'localhost');
			define('DBUSER' , 'root');
			define('DBPASS' , '');
			define('DBNAME' , 'dev_ecommerce');	
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);	

		break;

		case 'prod':

			define('URL' , '');

			define('DBVENDOR' , '');
			define('DBHOST' , '');
			define('DBUSER' , '');
			define('DBPASS' , '');
			define('DBNAME' , '');	

		break;

		default:

		die("Invalid Environment");

	}