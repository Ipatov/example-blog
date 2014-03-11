<?php

Class Controller_Index Extends Controller_Base {
	
	// шаблон
	public $layouts = "first_layouts";
	
	function index() {
		// пример работы с моделью
		$model = new Model_Users();
		$allUsers = $model->getAllUsers();
		//$oneUser = $model->getUserById(1);		
		$testAbstractMethod = $model->getRowById(2);
		//var_dump($testAbstractMethod);exit;
		$this->template->vars('users', $allUsers);
		$this->template->view('index');
	}
	
	function test() {
		$serviceMath = new Service_Math();
		$result = $serviceMath->sum(10, 20);
		$this->template->vars('test_var_2', $result);
		$this->template->view('test');
	}
	
}