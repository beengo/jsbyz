<?php
namespace jsbyz;

class Router {
	static private $controller;
	static private $action;
	public function __construct() {

	}

	public function Route() {
		Router::parse();
		
		$cont = "\\app\\Controller\\".Router::$controller.'Controller';
		$act = Router::$action;
		$con = new $cont();
		
		if(method_exists($cont, $act)){
			$con->$act();
		} else {
			die($act.' method not exists');
		}
	}

	static private function parse() {
		if(isset($_SERVER['PATH_TRANSLATED'])) {
			$uri = str_replace($_SERVER['DOCUMENT_ROOT'].'/', '', $_SERVER['PATH_TRANSLATED']);
		} else {
			$uri = 'Index';
		}
		$uris = explode('/', rtrim($uri,'/'));
		Router::$controller = ucfirst($uris[0]);
		Router::$action = isset($uris[1]) ? ucfirst($uris[1]) : "Index";
	}


}