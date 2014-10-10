<?php
namespace app\Controller;
use jsbyz\Controller;

class UserController extends Controller {
    public function index()
    {
        $this->assign('title','default title user');
        $this->assign('content','我是天使的');
        $this->display();
    }

    private function add() {
        echo 'user add';
    }
}