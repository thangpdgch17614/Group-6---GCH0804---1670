<?php
 class dbConfig{

    private $username = "root";
    private $password = " ";
    private $serverName = "127.0.0.1";
    private $db ="demo";
    protected $conn = null;
    public function __construct(){
        try {
            $connection = new PDO("mysql:host=$this->serverName;dbname=$this->databaseName", $this->username, $this->password);
            // set the PDO error mode to exception
            // đặt chế độ lỗi cho ngoại lệ khi kết nối PDO
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
    }
 }
}

?>