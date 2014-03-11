<?php
	error_reporting (E_ALL);
	
	// Константы:
	define ('DIRSEP', DIRECTORY_SEPARATOR);
	// Узнаём путь до файлов сайта
	$sitePath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP;
	define ('SITE_PATH', $sitePath);
	
	// Загрузка классов "на лету"
	function __autoload($className) {
		$filename = strtolower($className) . '.php';
		$file = SITE_PATH . 'classes' . DIRSEP . $filename;		
		if (file_exists($file) == false) {
			return false;
		}
		include ($file);
	}
	// конфиги
	include (SITE_PATH.'config/config.php'); 
	
	// ядро сайта
	include (SITE_PATH.'core/core.php'); 
	
	// Соединяемся с БД
	$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
	//Registry::set ('db', $db);
	$registry->set ('db', $db);
	
	// Загружаем router
	$router = new Router($registry);
	$registry->set ('router', $router);
	$router->setPath (SITE_PATH . 'controllers');
	$router->delegate();