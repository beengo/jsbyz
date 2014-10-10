<?php
namespace jsbyz;
/**
* 数据库类，使用PDO连接
*/

class Db {
    private static $obj = null;
    public static $dbh;
    private function __construct() {
        try {
            self::$dbh  = new \PDO(C('DB_DSN'),C('DB_USER'),C('DB_PASSWORD'));
        }
        catch(PDOEXeception $e) {
            die($e->getMessage());
        }
    }

    /**
    * 获取单示例对象
    */
    static function getInstance() {
        if(is_null(self::$obj)) {
            self::$obj = new self();
        }
        return self::$obj;
    }

    /**
    * 执行查询语句，以二维数组形式返回数据
    */
    static function query($sql) {
       $result =  self::$dbh->query($sql);
       return $result->fetchAll(\PDO::FETCH_ASSOC);

    }

    /**
    * 执行增删改语句，返回受影响的行数
    */
    static function execute($sql) {
        return self::$dbh->exec($sql);
    }
}