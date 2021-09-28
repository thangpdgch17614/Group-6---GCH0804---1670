<?php
require_once "config.php";

class Crud extends dbConfig{
    public function __construct(){
        parent::__construct();
    }

    //lay du dieu ra man hinh
    public function getData($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    //them sua xoa
    public function action($sql){
        $this->conn->exec($sql);
    }
}