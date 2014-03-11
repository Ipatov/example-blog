<?php

Class Controller_Index Extends Controller_Base {
	
	// шаблон
	public $layouts = "first_layouts";
	
	function index() {
		// пример работы с моделью
		$model = new Model_Users();
		$allUsers = $model->getAllUsers();
		//$oneUser = $model->getUserById(1);		
		$this->template->vars('users', $allUsers);
		$this->template->view('index');
	}
	
	function test() {
		//var_dump($_GET);exit;
		$this->template->vars('test_var_2', '222');
		$this->template->view('test');
	}
	
}