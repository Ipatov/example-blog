<?php

Class Model_#TABLE_NAME# Extends Model_Base {
	
	public #VAR_FIELD_NAME#;
	 
	/*public function __construct($select = false) {
		parent::__construct($select);
	}*/
	
	public function fieldsTable(){
		return array(
			'#FIELD_NAME#' => '#FIELD_NAME_LABEL#'
		);
	}
	
}