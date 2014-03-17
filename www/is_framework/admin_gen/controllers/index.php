<?php

Class Controller_Index Extends Controller_Base {
	
	// шаблон
	public $layouts = "gen_layouts";
	
	function index() {
		$this->template->view('index');
	}
	
}