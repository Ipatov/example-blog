<?php

Class Model_Users Extends Model_Base {
	
	function getAllUsers() {
		$db = $this->db;
		$stmt = $db->query('SELECT * from users');
		$rows = $stmt->fetchAll();
		return $rows;
	}
	
	function getUserById($id) {
		$db = $this->db;
		$stmt = $db->query("SELECT * from users WHERE id =$id");
		$row = $stmt->fetch();
		return $row;
	}
	
}