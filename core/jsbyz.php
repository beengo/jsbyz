<?php
//load default config file

//autoload core classes
spl_autoload_register("loadCore");

define('NAME_SPACE','jsbyz');
function loadCore($className) {

    $classes = explode('\\', $className);

    $className = isset($classes[1])  ? $classes[1] : $className;
    
    switch($classes[0]) {
        case "jsbyz":
                require CORE_PATH.'/lib/'.$className.'.class.php';
                break;
        case APP_NAME:
                $className = $classes[2];
                require APP_PATH.'/'.$classes[1].'/'.$className.'.class.php';
                break;
        default:break;
    }

}
//加载公共函数
require CORE_PATH.'/function.php';

$_config = array();
//加载核心配置
loadConfig(CORE_PATH.'/config.php');
//加载应用配置
loadConfig(APP_PATH.'/config.php');
//运行应用
jsbyz\App::run();

//
