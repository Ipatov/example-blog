<?php

Class Model_Users Extends Model_Base {
	
	public $id;
	public $name;
	public $last_name;
	
	 
	/*public function __construct($select = false) {
		parent::__construct($select);
	}*/
	
	public function fieldsTable(){
		return array(
			
			'id' => 'Id',
			'name' => 'Name',
			'last_name' => 'Last Name',

		);
	}
	
}