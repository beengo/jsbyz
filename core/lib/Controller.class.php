<?php
namespace jsbyz;
class Controller {

    private $smarty;

    public function __construct() {
        require CORE_PATH.'/smarty/libs/Smarty.class.php';
        $this->smarty = new  \Smarty;
        $this->smarty->setTemplateDir(APP_PATH.'/View/');
        $this->smarty->setCompileDir(APP_PATH.'/Runtime/compile/');
        $this->smarty->setConfigDir(APP_PATH.'/View/configs/');
        $this->smarty->setCacheDir(APP_PATH.'/Runtime/cache/');
        //静态文件路径
        $this->smarty->assign('__STATIC__',C('STATIC_PATH'));
    }

    protected  function assign($key,$value) {
        $this->smarty->assign($key,$value);
    }

    protected function display($file='') {
        $controller = Router::$controller;
        $action = Router::$action;
        $this->smarty->display(APP_PATH.'/View/'.$controller.'/'.$action.'.html');
    }

    public function __call($funName,$args) {
        echo 'function \''.$funName .'\' does not exists!';
    }
}