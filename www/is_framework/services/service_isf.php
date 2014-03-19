<?php

Class ISF {
	
	protected static $var_name;
	
	static function var_test() {
		self::$var_name = 'test'; 
		return self::$var_name;
	}
	
	
	static function redirect($url, $code = 301) {
		$url =  'http://' . $_SERVER["HTTP_HOST"] . '/' . $url;
		header("Location: $url", true, $code);
		exit;
	}
	
}