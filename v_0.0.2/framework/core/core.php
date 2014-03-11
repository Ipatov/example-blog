<?php
	// Загрузка классов "на лету"
	function __autoload($className) {
		$filename = strtolower($className) . '.php';
		
		$expArr = explode('_', $className);
		if(empty($expArr[1]) OR $expArr[1] == 'Base'){
			$folder = 'classes';
			$file = FRAMEWORK_PATH . $folder . DIRSEP . $filename;	
		}else{			
			switch(strtolower($expArr[0])){
				case 'controller':
					$folder = 'controllers';
					$file = SITE_PATH . $folder . DIRSEP . $filename;	
					break;
					
				case 'model':					
					$folder = 'models';	
					$file = SITE_PATH . $folder . DIRSEP . $filename;	
					break;
					
				case 'service':					
					$folder = 'services';	
					$file = SITE_PATH . $folder . DIRSEP . $filename;	
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
	
	$registry = new Registry;