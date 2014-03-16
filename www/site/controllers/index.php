<?php

Class Controller_Index Extends Controller_Base {
	
	// шаблон
	public $layouts = "first_layouts";
	
	function index() {
		// пример работы с моделью
		/*$model = new Model_Users();
		$allUsers = $model->getAllRows();
		$this->template->vars('users', $allUsers);*/
		$this->template->view('index');
	}
	
	function test() {
		// пример работы с бд через модель
		
		/*$model = new Model_Users();
		$model->id = 20;
		$model->name = 'sdf 11 ddd1';
		$r = $model->save();
		var_dump($r);exit;*/
		
		/*$select = array(
			'where' => 'id > 1 AND id <= 6',
			'group' => 'name',
			'order' => 'id DESC',
			'limit' => 10
		);
		$model = new Model_Users($select);*/
		// все записи
		// $r = $model->getAllRows();
		// var_dump($r);exit;

		// одна запись
		// $r = $model->getOneRow();
		// var_dump($r);exit;

		// получить и записать в свойства
		// $model->fetchOne();
		// $name = $model->name;
		// var_dump($name);
		
		//$this->template->view('test');
	}
	
}