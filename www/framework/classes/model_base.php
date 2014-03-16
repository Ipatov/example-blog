<?php

Abstract Class Model_Base {

	protected $db;
	protected $table;
	private $dataResult;
	
	public function __construct($select = false) {
		// объект бд коннекта
		global $dbObject;
		$this->db = $dbObject;
		
		// имя таблицы
		$modelName = get_class($this);
		$arrExp = explode('_', $modelName);
		$tableName = strtolower($arrExp[1]);
		$this->table = $tableName;
		
		// обработка запроса, если нужно
		$sql = $this->_getSelect($select);	
		if($sql) $this->_getResult($sql);
	}	
	
	public function getTableName() {
		return $this->table;
	}
	
	function getAllRows(){
		if(!isset($this->dataResult) OR empty($this->dataResult)) return false;
		return $this->dataResult;
	}
	
	function getOneRow(){
		if(!isset($this->dataResult) OR empty($this->dataResult)) return false;
		return $this->dataResult[0];
	}	
	
	function fetchOne(){
		if(!isset($this->dataResult) OR empty($this->dataResult)) return false;
		foreach($this->dataResult[0] as $key => $val){
			$this->$key = $val;
		}
		return true;
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
	
	private function _getSelect($select) {
		if(is_array($select)){
			$allQuery = array_keys($select);
			array_walk($allQuery, function(&$val){
				$val = strtoupper($val);
			});
			
			$querySql = "";
			if(in_array("WHERE", $allQuery)){
				foreach($select as $key => $val){
					if(strtoupper($key) == "WHERE"){
						$querySql .= " WHERE " . $val;					
					}
				}
			}
			
			if(in_array("GROUP", $allQuery)){
				foreach($select as $key => $val){
					if(strtoupper($key) == "GROUP"){
						$querySql .= " GROUP BY " . $val;					
					}
				}
			}
			
			if(in_array("ORDER", $allQuery)){
				foreach($select as $key => $val){
					if(strtoupper($key) == "ORDER"){
						$querySql .= " ORDER BY " . $val;					
					}
				}
			}
			
			if(in_array("LIMIT", $allQuery)){
				foreach($select as $key => $val){
					if(strtoupper($key) == "LIMIT"){
						$querySql .= " LIMIT " . $val;					
					}
				}
			}
			
			return "SELECT * FROM $this->table" . $querySql;
		}		
		return false;
	}
	
	private function _getResult($sql){
		$db = $this->db;
		$stmt = $db->query($sql);
		$rows = $stmt->fetchAll();
		$this->dataResult = $rows;
		return $rows;
	}
}

