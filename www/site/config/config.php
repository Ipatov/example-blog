<?php
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'demo');
	//define('DB_NAME', 'iq_db');
	
	//define('ADMIN_GEN', true);
	define('ADMIN_GEN', false);
	// резделитель папок
	define ('DIRSEP', DIRECTORY_SEPARATOR); 
	// папка фреймворка
	define('FRAMEWORK_FOLDER', '..' . DIRSEP . 'is_framework' . DIRSEP );
	// папка сайта
	define('SITE_FOLDER', '' );
	// папка для дминки
	//define('ADMIN_FOLDER', '.' . DIRSEP . 'admin_module' . DIRSEP );
	// пусть до админки. урл
	//define('ADMIN_PATH', 'admin');
	
	
	
	// путь к фреймворку
	//$frameworkPath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP . '..' . DIRSEP) . DIRSEP . FRAMEWORK_FOLDER . DIRSEP ;
	$frameworkPath = FRAMEWORK_FOLDER;
	define ('FRAMEWORK_PATH', $frameworkPath);
	
	// Узнаём путь до файлов сайта
	// сайт / генератор
	if(ADMIN_GEN){
		//$sitePath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP . '..' . DIRSEP) . DIRSEP . FRAMEWORK_FOLDER . DIRSEP .'admin_gen' . DIRSEP;
		$sitePath = FRAMEWORK_FOLDER . 'admin_gen' . DIRSEP;
	}else{
		//$sitePath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP . '..' . DIRSEP) . DIRSEP . 'site' . DIRSEP;
		$sitePath = SITE_FOLDER;
	}
	define ('SITE_PATH', $sitePath);
	
	