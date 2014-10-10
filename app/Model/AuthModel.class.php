<?php
namespace app\Model;
use jsbyz\Model;

class AuthModel  extends Model{
    
    /**
    *@return  array
    */
    public function getAll() {
        return $this->query("SELECT * FROM sign_table");
    }

    public function addUser($name) {
        return $this->execute("INSERT INTO user(username,ip) VALUES('{$name}','192.168.1.1')");
    }
}