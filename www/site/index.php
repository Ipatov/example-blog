<?php	
	error_reporting (E_ALL);
	
	// конфиг
	include ('/config/config.php');	
	
	// ядро сайта
	include (FRAMEWORK_PATH.'core' . DIRSEP . 'core.php'); 
	
	// Соединяемся с БД
	try {
		$dbObject = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
		$dbObject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbObject->exec("set names utf8");
		// записываем в реестр объект бд
		$registry->set('db', $dbObject);
	} catch(PDOException $e) {
		echo $e->getMessage();
		exit;
	}
	
	$arrayModulesCofig = array(
		// 'имя(url) модуля' => 'папка модуля'
		'main' => '', // не обязательный
		'admin' => './admin_module/'
	);
	
	// заносим массив модулей в реестр
	$registry->set('arrayModules', $arrayModulesCofig);
	
	// Загружаем router
	$router = new Router($registry);
	$registry->set('router', $router);
	$router->setPath();
	$router->start();
	
	