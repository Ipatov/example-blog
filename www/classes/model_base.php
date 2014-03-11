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
}

