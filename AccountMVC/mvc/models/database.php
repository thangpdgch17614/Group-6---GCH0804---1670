<?php
    class Database {
        public $conn;

        const DATABASE_SERVER = "localhost";

        const DATABASE_USER = "root";

        const DATABASE_PASSWORD = "";

        const DATABASE_NAME = "demomvc";

        public function __construct()
        {
            if(!$this->conn){
                try{
                    $serverName = self::DATABASE_SERVER;
                    $databaseName = self::DATABASE_NAME;
                    $username = self::DATABASE_USER;
                    $password = self::DATABASE_PASSWORD;

                    $this->conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $password);

                    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }catch(PDOException $e) {
                    echo $e->getMessage();
                    exit();
                }
            }
        }
    }

