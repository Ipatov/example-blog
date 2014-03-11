<?php

Class Model_#TABLE_NAME# Extends Model_Base {
	
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
}