<?php
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'iq_db');
	
	//define('ADMIN_GEN', true);
	define('ADMIN_GEN', false);
	define('FRAMEWORK_FOLDER', 'framework');
	
	// Константы:
	// резделитель
	define ('DIRSEP', DIRECTORY_SEPARATOR); 
	
	// путь к фреймворку
	$frameworkPath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP . '..' . DIRSEP) . DIRSEP . FRAMEWORK_FOLDER . DIRSEP ;
	define ('FRAMEWORK_PATH', $frameworkPath);
	
	// Узнаём путь до файлов сайта
	// сайт / генератор
	if(ADMIN_GEN){
		$sitePath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP . '..' . DIRSEP) . DIRSEP . FRAMEWORK_FOLDER . DIRSEP .'admin_gen' . DIRSEP;
	}else{
		$sitePath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP . '..' . DIRSEP) . DIRSEP . 'site' . DIRSEP;
	}
	define ('SITE_PATH', $sitePath);
	
	