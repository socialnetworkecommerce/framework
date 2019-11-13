<?php 

	session_start();

	
	spl_autoload_register(function($class) {

		$class = ucfirst($class);

		$class = str_replace("\\", DIRECTORY_SEPARATOR, $class);


		$file = null;

		if(file_exists(APPROOT.DS.'core'.DS.$class.'.php'))
		{
			$file = APPROOT.DS.'core'.DS.$class.'.php';
		}
		
		else if (file_exists(APPROOT.DS.'controllers'.DS.$class.'.php'))
		{
			$file = APPROOT.DS.'controllers'.DS.$class.'.php';
		}
		else if (file_exists(APPROOT.DS.'models'.DS.$class.'.php'))
		{
			$file = APPROOT.DS.'models'.DS.$class.'.php';
		}
		else if (file_exists(APPROOT.DS.'libraries'.DS.$class.'.php'))
		{
			$file = APPROOT.DS.'libraries'.DS.$class.'.php';
		}

		else if (file_exists(APPROOT.DS.'helpers'.DS.$class.'.php'))
		{
			$file = APPROOT.DS.'helpers'.DS.$class.'.php';
		}
		else if (file_exists(APPROOT.DS.'classes'.DS.$class.'.php'))
		{
			$file = APPROOT.DS.'classes'.DS.$class.'.php';
		}

		// echo $file;

		if(!file_exists($file))
		{
			echo "$file";
		}
		require_once $file;
	});

	//** load your functions here *//


