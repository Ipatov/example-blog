<?php

Class Controller_Index Extends Controller_Base {
	
	// шаблон
	public $layouts = "first_layouts";
	
	function index() {
		// пример работы с моделью
		$model = new Model_Users();
		$allUsers = $model->getAll();
		$this->template->vars('users', $allUsers);
		$this->template->view('index');
	}
	
	function test() {
		$arrayFirst = array(
			'os' => 'win',
			'oss' => 'xyz',
			'oss1' => 'xyz1'
		);
		$arraySecond = array(
			'os', 'df', 'sfd', 'oss', 'fd'
		);
		$keys = array_keys($arrayFirst);
		array_walk($arraySecond, function(&$key, &$val, $keys){
			echo "$key <br/>";
			var_dump(in_array($key ,$keys));
			if(in_array($key ,$keys)){
				unset($key);
				unset($val);
				echo "1 -$key <br/> ";
			}
		}, $keys);
		var_dump($arraySecond);exit;
		
		/*$model = new Model_Users();
		$model->id = 20;
		$model->name = 'sdf 11 ddd1';
		$r = $model->save();
		var_dump($r);exit;*/
		
		$select = array(
			'where' => 'id > 10 AND id < 15',
			'order' => 'id DESC',
			'group' => 'name'
		);
		$model = new Model_Users($select);
		var_dump($model);exit;
		
		$this->template->view('test');
	}
	
}