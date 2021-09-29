<?php
    class AccountController {
        public function account()
        {
            include_once "mvc/views/login_logout/login.php";
        }

        public function login()
        {
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $userpassword = $_POST['userpassword'];

                if(empty($_POST['username']) || empty($_POST['userpassword'])){
                    return $this->account();
                }

                $accountModel = new AccountModel();
                $accountModel->getLogin($username, $userpassword);

                return $this->index();
                exit();
            }
        }

        public function index()
        {
            $accountModel = new AccountModel();

            $accounts = $accountModel->getAll();

            include_once "mvc/views/account/index.php";
        }
    }