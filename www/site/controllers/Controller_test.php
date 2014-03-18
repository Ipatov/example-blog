<?php

Class Controller_Test Extends Controller_Base {
	
	// шаблон
	public $layouts = "second_layouts";
	
	function index() {
		$this->template->vars('test_var', '123123');
		$this->template->view('index');
	}
	
	function test() {
		$this->template->vars('test_var_2', '222');
		$this->template->view('test');
	}
	
}