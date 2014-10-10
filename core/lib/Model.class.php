<?php
namespace jsbyz;
class Model {
    static public $db;
    public function __construct() {
        $this->db = Db::getInstance();
    }

    public function query($sql) {
        return Db::query($sql);
    }

    public function execute($sql) {
        return $this->db->execute($sql);
    }


    public function __call($funName,$args) {

    }
}