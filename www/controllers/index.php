<?php

Class Controller_Index Extends Controller_Base {
	
	// шаблон
	public $layouts = "first_layouts";
	
	function index() {
		$db = $this->registry->get('db'); // объект бд
		//Простые запросы
		//$db->query("SET CHARACTER SET utf8");
		//$db->query("SELECT * FROM users");
		 
		//Можно вычислить количество строк
		$stmt = $db->query('SELECT * FROM users');
		$row_count = $stmt->rowCount();
		echo $row_count.' rows selected';
		 
		//Еще вариант с количеством
		$stmt = $db->query('SELECT * from users');
		$rows = $stmt->fetchAll();
		//$count = count($rows);
		foreach($rows as $row)
		{
			print_r($row);
		}
		
		$this->template->vars('test_var', '123123');
		$this->template->view('index');
	}
	
	function test() {
		//var_dump($_GET);exit;
		$this->template->vars('test_var_2', '222');
		$this->template->view('test');
	}
	
}