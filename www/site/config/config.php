<?php
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'demo');
	
	define('ADMIN_GEN', true);
	//define('ADMIN_GEN', false);
	define ('DIRSEP', DIRECTORY_SEPARATOR); 
	//define('FRAMEWORK_FOLDER', 'is_framework');
	define('FRAMEWORK_FOLDER', '..' . DIRSEP . 'is_framework' . DIRSEP );
	define('SITE_FOLDER', '');
	
	// Константы:
	// резделитель
	
	// путь к фреймворку
	//$frameworkPath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP . '..' . DIRSEP) . DIRSEP . FRAMEWORK_FOLDER . DIRSEP ;
	$frameworkPath = FRAMEWORK_FOLDER;
	define ('FRAMEWORK_PATH', $frameworkPath);
	
	// Узнаём путь до файлов сайта
	// сайт / генератор
	if(ADMIN_GEN){
		//$sitePath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP . '..' . DIRSEP) . DIRSEP . FRAMEWORK_FOLDER . DIRSEP .'admin_gen' . DIRSEP;
		$sitePath = FRAMEWORK_FOLDER . DIRSEP .'admin_gen' . DIRSEP;
	}else{
		//$sitePath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP . '..' . DIRSEP) . DIRSEP . 'site' . DIRSEP;
		$sitePath = SITE_FOLDER;
	}
	define ('SITE_PATH', $sitePath);
	
	