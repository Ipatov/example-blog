<?php

Class Controller_Test Extends Controller_Base {
	
	// шаблон
	public $layouts = "second_layouts";
	
	function index() {
		var_dump('test-index');exit;
		$this->template->vars('test_var', '123123');
		$this->template->view('index');
	}
	
	function test() {
		var_dump('test-test');exit;
		$this->template->vars('test_var_2', '222');
		$this->template->view('test');
	}
	
}