<?php
namespace app\Controller;
use jsbyz\Controller;

class UserController extends Controller {
	public function index()
	{
		echo 'user index';
	}

	private function add() {
		echo 'user add';
	}
}