<?php

Class Router {

	private $registry;
	private $path;
	private $args = array();


	function __construct($registry) {
		$this->registry = $registry;
	}

	/*function setPath($path) {
		//var_dump($path);exit;
        $path = trim($path, '/\\');
        $path .= DIRSEP;
        if (is_dir($path) == false) {
			throw new Exception ('Invalid controller path: `' . $path . '`');
        }
        $this->path = $path;
	}*/
	
	function setPath() {
		$route = (empty($_GET['route'])) ? '' : $_GET['route'];
		$route = trim($route, '/\\');
		$rArr = explode('/', $route);
		$modules = $this->registry->get('arrayModules');
		if(isset($modules) AND !empty($modules)){
			$arrayModulesUrl = array_keys($modules);
			if(in_array(strtolower($rArr[0]), $arrayModulesUrl)){
				$folderModule = $modules[strtolower($rArr[0])];
				$path = ($folderModule . 'controllers');
			}else{
				$path = (SITE_PATH . 'controllers');
			}
		}else{
			$path = (SITE_PATH . 'controllers');
		}
		
        $path = trim($path, '/\\');
        $path .= DIRSEP;
        if (is_dir($path) == false) {
			throw new Exception ('Invalid controller path: `' . $path . '`');
        }
        $this->path = $path;
	}	
	
	private function getController(&$file, &$controller, &$action, &$args) {
        $route = (empty($_GET['route'])) ? '' : $_GET['route'];
		unset($_GET['route']);
        if (empty($route)) {
			$route = 'index'; 
		}

        // Получаем раздельные части
        $route = trim($route, '/\\');
        $parts = explode('/', $route);
		
		$modules = $this->registry->get('arrayModules');
		if(isset($modules) AND !empty($modules)){
			$arrayModulesUrl = array_keys($modules);
			if(in_array(strtolower($parts[0]), $arrayModulesUrl)){
				unset($parts[0]);
				sort($parts);
				if (empty($parts)) {
					$parts[0] = 'index'; 
				}
			}
		}else{
			if (empty($parts)) {
				$parts[0] = 'index'; 
			}
		}
		
        // Находим правильный контроллер
        $cmd_path = $this->path;
        foreach ($parts as $part) {
			$fullpath = $cmd_path . $part;
			// Есть ли папка с таким путём?
			if (is_dir($fullpath)) {
				$cmd_path .= $part . DIRSEP;
				array_shift($parts);
				continue;
			}

			// Находим файл
			if (is_file($fullpath . '.php')) {
				$controller = $part;
				array_shift($parts);
				break;
			}
        }

        if (empty($controller)) {
			$controller = 'index'; 
		}

        // Получаем действие
        $action = array_shift($parts);
        if (empty($action)) { 
			$action = 'index'; 
		}

        $file = $cmd_path . $controller . '.php';
        $args = $parts;
	}
	
	function start() {
        // Анализируем путь
        $this->getController($file, $controller, $action, $args);

		
        // Файл доступен?
        if (is_readable($file) == false) {
			die ('404 Not Found');
        }
		
        // Подключаем файл
        include ($file);

        // Создаём экземпляр контроллера
        $class = 'Controller_' . $controller;
        $controller = new $class($this->registry);

        // Действие доступно?
        if (is_callable(array($controller, $action)) == false) {
			die ('404 Not Found');
        }

        // Выполняем действие
        $controller->$action();

	}
}
