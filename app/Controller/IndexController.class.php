<?php
namespace app\Controller;
use jsbyz\Controller;

class IndexController extends Controller {
    public function index() {
       $model = M('Auth');
       var_dump($model->addUser('老骨头'));
        $this->assign('tables',$model->getAll());
        $this->display();
    }
}