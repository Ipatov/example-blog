<?php

Class Service_Meta_tags {
	
	public $description;
	public $keywords;
	public $title;
	
	function __construct($metaTags) {	
		foreach($metaTags as $tag => $value){
			$this->$tag = $value;
		}
	}
	
}