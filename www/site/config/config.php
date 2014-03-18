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
	
	// путь к фреймворку
	$frameworkPath = FRAMEWORK_FOLDER;
	define ('FRAMEWORK_PATH', $frameworkPath);
	
	// Узнаём путь до файлов сайта
	// сайт / генератор
	if(ADMIN_GEN){
		$sitePath = FRAMEWORK_FOLDER . 'admin_gen' . DIRSEP;
	}else{
		$sitePath = SITE_FOLDER;
	}
	define ('SITE_PATH', $sitePath);
	
	