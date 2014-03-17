<?php

Class Registry {

	private $vars = array();
	
	function set($key, $var) {
        if (isset($this->vars[$key]) == true) {
			throw new Exception('Unable to set var `' . $key . '`. Already set.');
        }
        $this->vars[$key] = $var;
        return true;
	}

	function get($key) {
		if (isset($this->vars[$key]) == false) {
			return null;
		}
		return $this->vars[$key];
	}

	function remove($var) {
		unset($this->vars[$key]);
	}

}
