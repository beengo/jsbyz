<?php
/**
* 实例化模型类
*/
function M($name) {
    $m = '\\'.APP_NAME.'\\Model\\'.$name.'Model';
    return new $m;
}

function C($name,$value=null){
    $config = &$GLOBALS['_config'];
    if(is_null($value)) {
        return isset($config[$name]) ? $config[$name] : null;
    }
    $config[$name] = $value;
}

function LoadConfig($file) {
    $t_config = include $file;
   $config = &$GLOBALS['_config'];
   foreach ($t_config as $key => $value) {
       $config[$key] = $value;
   }
}