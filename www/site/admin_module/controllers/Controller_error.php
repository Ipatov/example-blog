<?php

Class Controller_Error Extends Controller_Base {
	
	// шаблон
	public $layouts = "first_layouts";
	
	function index() {
	
	}
	
	function error_404() {
		$this->template->view('404');
	}
	
}