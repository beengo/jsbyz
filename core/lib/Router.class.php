<?php
namespace jsbyz;

class Router {
	static public $controller;
	static public $action;
	private function __construct() {

	}

	public function Route() {
		self::parse();
		
		$cont = '\\'.APP_NAME.'\\Controller\\'.Router::$controller.'Controller';
		$act = self::$action;
		$con = new $cont();
		$con->$act();
		
	}

	/**
	* 解析URI参数
	*/
	static private function parse() {
		//var_dump($_SERVER['PATH_TRANSLATED']);
		if(isset($_SERVER['PATH_TRANSLATED'])) {
			$uri = str_replace($_SERVER['DOCUMENT_ROOT'].'/', '', $_SERVER['PATH_TRANSLATED']);
		} else {
			$uri = 'Index';
		}
		$uris = explode('/', rtrim($uri,'/'));
		self::$controller = ucfirst($uris[0]);
		self::$action = isset($uris[1]) ? strtolower($uris[1]) : "index";
	}


}