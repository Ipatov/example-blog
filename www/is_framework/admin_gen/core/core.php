<?php
	// Загрузка классов "на лету"
	function __autoload($className) {
		$filename = strtolower($className) . '.php';
		
		$expArr = explode('_', $className);
		if(empty($expArr[1]) OR $expArr[1] == 'Base'){
			$folder = 'classes';
		}else{			
			switch(strtolower($expArr[0])){
				case 'controller':
					$folder = 'controllers';
					break;
					
				case 'model':					
					$folder = 'models';	
					break;
					
				case 'service':					
					$folder = 'services';	
					break;
					
				default:
					$folder = 'classes';
					break;
			}
		}
		$file = SITE_PATH . $folder . DIRSEP . $filename;		
		if (file_exists($file) == false) {
			return false;
		}
		include ($file);
	}
	
	$registry = new Registry;