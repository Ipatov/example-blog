<?php

Abstract Class Controller_Base {

	protected $registry;
	protected $template;
	protected $layouts; // шаблон
	
	public $vars = array();

	function __construct($registry) {
		$this->registry = $registry;
		
		// вьюхи
		$this->template = new Template($this->layouts, get_class($this));
	}

	abstract function index();
	
	function setMetaTag($tag, $value){
		//$this->$tag = $value;
		$this->title = 'dfdf';
		//var_dump($tag);exit;
		//var_dump($this->title);exit;
	}
	
}
