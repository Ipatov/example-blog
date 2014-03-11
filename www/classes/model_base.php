<?php

Abstract Class Model_Base {

	protected $db;
	
	function __construct() {
		global $dbObject;
		$this->db = $dbObject;
	}
	
}

