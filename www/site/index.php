<?php
	error_reporting (E_ALL);
	
	// Константы:
	define ('DIRSEP', DIRECTORY_SEPARATOR);
	// Узнаём путь до файлов сайта
	$sitePath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP;
	define ('SITE_PATH', $sitePath);

	// конфиги
	include (SITE_PATH.'config/config.php'); 
	
	// Соединяемся с БД
	$dbObject = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
	// ядро сайта
	include (SITE_PATH.'core/core.php'); 
	
	// записываем в реестр объект бд
	$registry->set ('db', $dbObject);
	
	// Загружаем router
	$router = new Router($registry);
	$registry->set ('router', $router);
	$router->setPath (SITE_PATH . 'controllers');
	$router->delegate();
	
	