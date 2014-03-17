<?php

Class Controller_Index Extends Controller_Base {
	
	// шаблон
	public $layouts = "first_layouts";
	
	function index() {
		$this->template->view('index');
	}
	
	function rules() {
		$this->template->view('rules');
	}
	
	function top() {
		$this->template->view('top');
	}
	
	function about() {
		$this->template->view('about');
	}
	
	function my_result() {
		$this->template->view('my_result');
	}
	
	function test() {
		// пример работы с бд через модель
		
		/*$model = new Model_Users();
		$model->id = 20;
		$model->name = 'sdf 11 ddd1';
		$r = $model->save();
		var_dump($r);exit;*/
		
		/*$select = array(
			//'where' => 'id > 1 AND id <= 6',
			'where' => 'id = 13',
			'group' => 'name',
			'order' => 'id DESC',
			'limit' => 10
		);*/
		//$model = new Model_Users($select);
		// удаление по запросу
		//$model->deleteBySelect($select);
		//var_dump($r);exit;
		// уделение строки
		/*$model->fetchOne();
		$r = $model->deleteRow();
		var_dump($r);exit;*/
		
		// все записи
		// $r = $model->getAllRows();
		// var_dump($r);exit;

		// одна запись
		// $r = $model->getOneRow();
		// var_dump($r);exit;
		
		// update ===>>>
		/*$model->fetchOne();
		$model->name = 'new name';
		$model->last_name = 'new last name';
		$r = $model->update();
		var_dump($r);exit;*/
		// <<<==========
		
		//$this->template->view('test');
	}
	
}