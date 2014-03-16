<<<<<<< HEAD
<?php

Class Model_Test Extends Model_Base {
	
	public function getAll() {
		$db = $this->db;
		$stmt = $db->query("SELECT * from $this->table");
		$rows = $stmt->fetchAll();
		return $rows;
	}
	
	public function getRowById($id) {
		$db = $this->db;
		$stmt = $db->query("SELECT * from $this->table WHERE id = $id");
		$row = $stmt->fetch();
		return $row;
	}
	
	public function getTableName() {
		return $this->table;
	}
	
	public function getNameById() {
		return $this->table;
	}
=======
<?php

Class Model_Test Extends Model_Base {
	
	public function getAll() {
		$db = $this->db;
		$stmt = $db->query("SELECT * from $this->table");
		$rows = $stmt->fetchAll();
		return $rows;
	}
	
	public function getRowById($id) {
		$db = $this->db;
		$stmt = $db->query("SELECT * from $this->table WHERE id = $id");
		$row = $stmt->fetch();
		return $row;
	}
	
	public function getTableName() {
		return $this->table;
	}
	
	public function getNameById() {
		return $this->table;
	}
>>>>>>> 2be8ab41768a2a83fdec1d08f8d65dbcdf66dc67
}