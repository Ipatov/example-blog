<?php
	error_reporting (E_ALL);
	
	// конфиг
	include ('/config/config.php'); 
	/*if(ADMIN_GEN){
		$genPath = "admin_gen" . DIRSEP;
	}else{
		$genPath = "";
	}*/
	
	// Константы:
	define ('DIRSEP', DIRECTORY_SEPARATOR);
	
	// путь к фреймворку
	$frameworkPath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP . 'framework' . DIRSEP ;
	define ('FRAMEWORK_PATH', $frameworkPath);
	
	// Узнаём путь до файлов сайта
	//$sitePath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP . $genPath;
	$sitePath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP . 'site' . DIRSEP;
	define ('SITE_PATH', $sitePath);
	
	// Соединяемся с БД
	$dbObject = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
	// ядро сайта
	include (FRAMEWORK_PATH.'core' . DIRSEP . 'core.php'); 
	
	// записываем в реестр объект бд
	$registry->set ('db', $dbObject);
	
	// Загружаем router
	$router = new Router($registry);
	$registry->set ('router', $router);
	$router->setPath (SITE_PATH . 'controllers');
	$router->delegate();
	
	