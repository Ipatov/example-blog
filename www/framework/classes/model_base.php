<?php

Abstract Class Model_Base {

	protected $db;
	protected $table;
	
	function __construct() {
		// объект бд коннекта
		global $dbObject;
		$this->db = $dbObject;
		
		// имя таблицы
		$modelName = get_class($this);
		$arrExp = explode('_', $modelName);
		$tableName = strtolower($arrExp[1]);
		$this->table = $tableName;
	}	
	
	public function getTableName() {
		return $this->table;
	}
	
	function getAllRows(){
		$db = $this->db;
		$stmt = $db->query("SELECT * from $this->table");
		$rows = $stmt->fetchAll();
		return $rows;
	}
	
	function getRowById($id){
		$db = $this->db;
		$stmt = $db->query("SELECT * from $this->table WHERE id = $id");
		$row = $stmt->fetch();
		return $row;
	}
	
	public function save() {
		$arrayAllFields = array_keys($this->fieldsTable());
		$arraySetFields = array();
		$arrayData = array();
		foreach($arrayAllFields as $field){
			if(!empty($this->$field)){
				$arraySetFields[] = $field;
				$arrayData[] = $this->$field;
			}
		}
		$forQueryFields =  implode(', ', $arraySetFields);
		$rangePlace = array_fill(0, count($arraySetFields), '?');
		$forQueryPlace = implode(', ', $rangePlace);
		
		$db = $this->db;
		try {
			$stmt = $db->prepare("INSERT INTO $this->table ($forQueryFields) values ($forQueryPlace)");  
			$result = $stmt->execute($arrayData);
		}catch(PDOException $e){
			echo 'Error : '.$e->getMessage();
			exit();
		}
		
		return $result;
	}
}

