<?php
	error_reporting (E_ALL);
	
	// конфиг
	include ('/config/config.php'); 	
	
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
	
	