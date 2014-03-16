<<<<<<< HEAD
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
	
=======
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
	
>>>>>>> 2be8ab41768a2a83fdec1d08f8d65dbcdf66dc67
}