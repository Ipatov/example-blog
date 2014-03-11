<?php

Class Controller_Models Extends Controller_Base {
	
	// шаблон
	public $layouts = "gen_layouts";
	
	function index() {
		$db = $this->registry->get('db');
		$stmt = $db->query('SHOW TABLES');
		$rows = $stmt->fetchAll();
		$allTables = array();
		foreach($rows as $oneTable){
			$allTables[] = $oneTable[0];
		}		
		$this->template->vars('all_tables', $allTables);
		$this->template->view('index');
	}
	
	function gen() {
		$path =  $_POST["path_models"];
		$tableName = $_POST["table_name"];
		$modelName = 'model_' . $tableName . '.php';
		if(!file_exists($path)){
			mkdir($path, 0750);
		}
		$templateModel = file_get_contents(FRAMEWORK_PATH . DIRSEP . 'admin_gen' . DIRSEP . 'models' . DIRSEP . 'model_template.php');
		$template = str_replace('#TABLE_NAME#', ucfirst(strtolower($tableName)), $templateModel);
		var_dump($template);exit;
		$text = "Какой-то текст"; 
		// открываем файл, если файл не существует,
		//делается попытка создать его
		$fp = fopen($path . DIRSEP . $modelName, "w");			 
		// записываем в файл текст
		fwrite($fp, $text);			 
		// закрываем
		fclose($fp);
		

		var_dump($_POST);exit;
		$this->template->view('gen');
	}
}