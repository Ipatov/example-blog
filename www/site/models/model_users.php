<?php

Class Model_Users Extends Model_Base {
	
	public $id;
	public $name;
	
	function __construct($select = false) {
		if(is_array($select)){
			$allQuery = array_keys($select);
			array_walk($allQuery, function(&$val){
				$val = strtoupper($val);
			});
			var_dump($allQuery);exit;
		}
		
		// strtoupper 
	}
	
	public function fieldsTable(){
		return array(
			'id' => 'Id',
			'name' => 'Name'
		);
	}
	
}