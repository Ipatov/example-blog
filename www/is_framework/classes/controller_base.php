<?php

Abstract Class Controller_Base {

	protected $registry;
	protected $template;
	protected $layouts; // шаблон
	
	public $vars = array();

	function __construct($registry) {
		//var_dump(get_class($this));//exit;
		$this->registry = $registry;
		// вьюхи
		$this->template = new Template($this->layouts, get_class($this));
	}

	abstract function index();
	
}
