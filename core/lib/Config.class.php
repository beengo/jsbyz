<?php
namespace jsbyz;
/**
* 配置类
* 
*/

class Config {

    static private $config = Array();
    /**
    * 构造函数，声明为private，只允许单实例化模式
    */
    private function __construct() {

    }

    /**
    * 从文件中加载配置，配置文件必须返回Array
    * 若原有的配置项存在，将会被覆盖
    */
     static public function loadConfig($file) {
        var_dump($file);
        $config = include $file;
        foreach ($config as $key => $value) {
            self::config[$key] = $value;
        }
    }

    /**
    * 获取配置项
    */
    static public function getConfig($name) {
        if(isset(self::config[$name])) {
            return self::config[$name];
        }
        return null;
    }

    /**
    * 设置配置项，有则覆盖，无则新建
    **/
    static public function setConfig($name,$value) {
        self::config[$name] = $value;
    }
}