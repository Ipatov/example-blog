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
		$arrayFields = $this->_getArrayFields($tableName);
		$strVars = "";
		$strArrayFieldsTable = "\r\n";
		foreach($arrayFields as $oneField){
			$strVars .= "public $" . $oneField . ";\r\n\t";
			$fieldNameArr = explode('_', $oneField);
			array_walk($fieldNameArr, function(&$val){
				$val = ucfirst(strtolower($val));
			});
			$fieldName = implode(' ', $fieldNameArr);
			$strArrayFieldsTable .= "\t\t\t'$oneField'" . " => " . "'$fieldName',\r\n";
		}
		
		if(!file_exists($path)){
			mkdir($path, 0750);
		}
		// шаблон модели
		$templateModel = file_get_contents(FRAMEWORK_PATH . DIRSEP . 'admin_gen' . DIRSEP . 'models' . DIRSEP . 'model_template.php');
		// имя класса
		$template = str_replace('#TABLE_NAME#', ucfirst(strtolower($tableName)), $templateModel);
		// переменные
		$template = str_replace('#VARS_FIELD_NAME#', $strVars, $template);
		// массив имен полей
		$template = str_replace('#FIELDS_NAME#', $strArrayFieldsTable, $template);
		// открываем файл, если файл не существует,
		//делается попытка создать его
		$fp = fopen($path . DIRSEP . $modelName, "w");			 
		// записываем в файл текст
		fwrite($fp, $template);			 
		// закрываем
		fclose($fp);
		$this->template->view('gen');
	}
	
	private function _getArrayFields($tableName){
		//var_dump($tableName);exit;
		$db = $this->registry->get('db');
		$stmt = $db->query("SHOW COLUMNS FROM $tableName;");
		$rows = $stmt->fetchAll();
		$allFields = array();
		foreach($rows as $oneTable){
			$allFields[] = $oneTable['Field'];
		}
		return $allFields;
	}
	
}