<?php

Class Model_Test Extends Model_Base {
	
	public $id;
	public $test_1;
	public $test_2;
	public $test_id;
	
	 
	/*public function __construct($select = false) {
		parent::__construct($select);
	}*/
	
	public function fieldsTable(){
		return array(
			
			'id' => 'Id',
			'test_1' => 'Test 1',
			'test_2' => 'Test 2',
			'test_id' => 'Test Id',

		);
	}
	
}