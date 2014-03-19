<?php
	// старт реестра
	$registry = new Registry;
	
	// Загрузка классов "на лету"
	function __autoload($className) {
		// полный пэ.. потом переделаю
		if($className == 'ISF'){
			$className = 'service_isf';
		}
		$filename = strtolower($className) . '.php';		
		$expArr = explode('_', $className);
		if(empty($expArr[1]) OR $expArr[1] == 'Base'){
			$folder = 'classes';
			$file = FRAMEWORK_PATH . $folder . DIRSEP . $filename;	
		}else{			
			// определение папки с модулем
			global $arrayModulesCofig;
			$route = (empty($_GET['route'])) ? '' : $_GET['route'];
			$route = trim($route, '/\\');
			$parts = explode('/', $route);			
			$modules = $arrayModulesCofig;			
			if(isset($modules) AND !empty($modules)){
				$arrayModulesUrl = array_keys($modules);
				if(in_array(strtolower($parts[0]), $arrayModulesUrl)){
					$sitePathCore = $arrayModulesCofig[strtolower($parts[0])];
				}else{
					$sitePathCore = SITE_PATH;
				}
			}else{
				$sitePathCore = SITE_PATH;
			}
			
			// определение папки для класса
			switch(strtolower($expArr[0])){
				case 'controller':
					$folder = 'controllers';
					$file = $sitePathCore . $folder . DIRSEP . $filename;					
					break;
					
				case 'model':					
					$folder = 'models';	
					$file = $sitePathCore . $folder . DIRSEP . $filename;	
					break;
					
				case 'service':					
					$folder = 'services';	
					$file = FRAMEWORK_PATH . $folder . DIRSEP . $filename;	
					break;
					
				default:
					$folder = 'classes';
					$file = FRAMEWORK_PATH . $folder . DIRSEP . $filename;	
					break;
			}
		}
		if (file_exists($file) == false) {
			return false;
		}
		include ($file);
	}
