<?php
    class AccountModel extends Database {
        protected $table = "account";

        public function getLogin($username, $userpassword)
        {
            $sqlSelect = "SELECT * FROM $this->table WHERE name = ? and password = ? and level = ? ";

            $stmt = $this->conn->prepare($sqlSelect);

            $stmt->execute([$username, $userpassword, 0]);

            $accounts = $stmt->fetchObject();

            return $accounts;
        }

        public function getAll()
        {
            $sqlSelect = "SELECT * FROM $this->table";

            $stmt = $this->conn->prepare($sqlSelect);

            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

            $accounts = $stmt->fetchAll();

            return $accounts;
        }
    }