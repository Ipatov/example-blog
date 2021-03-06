<?php

Class Template {

	private $template;
	private $controller;
	private $layouts;
	private $metaTags;
	private $vars = array();
	// meta
	private $title;
	private $description;
	private $keywords;
	
	function __construct($layouts, $controllerName) {
		$this->layouts = $layouts;
		$arr = explode('_', $controllerName);
		$this->controller = strtolower($arr[1]);
	}
	
	// установка переменных, для вьюхи
	function vars($varname, $value) {
		if (isset($this->vars[$varname]) == true) {
			trigger_error ('Unable to set var `' . $varname . '`. Already set, and overwrite not allowed.', E_USER_NOTICE);
			return false;
		}
		$this->vars[$varname] = $value;
		return true;
	}
	
	// отображение вьюхи
	function view($name) {
		$pathLayout = SITE_PATH . 'views' . DIRSEP . 'layouts' . DIRSEP . $this->layouts . '.php';
		$contentPage = SITE_PATH . 'views' . DIRSEP . $this->controller . DIRSEP . $name . '.php';
		if (file_exists($pathLayout) == false) {
			trigger_error ('Layout `' . $pathLayout . '` does not exist.', E_USER_NOTICE);
			return false;
		}
		if (file_exists($contentPage) == false) {
			trigger_error ('Template `' . $name . '` does not exist.', E_USER_NOTICE);
			return false;
		}
		
		foreach ($this->vars as $key => $value) {
			$$key = $value;
		}

		// имена контролера и экшена
		$controllerName = $this->controller;
		$actionName = $name;
		// мета-теги
		$meta = array(
			'title' => $this->title,
			'description' => $this->description,
			'keywords' => $this->keywords
		);
		$metaTags = new Service_Meta_tags($meta);
		
		include ($pathLayout);                
	}
	
	function setMetaTag($metaTags){
		foreach($metaTags as $name=>$value){
			$this->$name = $value;		
		}
	}
	
		
	
}