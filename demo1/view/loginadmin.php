<?php 
    require_once "../database/conn.php";

    $errors = [];
    if (isset($_POST) && !empty($_POST)) {
        // có dữ liệu post đi
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = md5($password);
        if (strlen($username) > 0 && strlen($username) > 0) {
            $sqlLogin = "SELECT * FROM admin WHERE name = :user_name AND password = :user_password LIMIT 1";
           
            $stmtLogin = $connection->prepare($sqlLogin);
            //  ["user_name" => $username, "user_password" => $password]
            $stmtLogin->execute(["user_name" => $username, "user_password" => $password]);

            $resultLogin = $stmtLogin->setFetchMode(PDO::FETCH_OBJ);
            // tổng số bản ghi
            $login = $stmtLogin->fetchObject();

            // Admin12345 | Admin12345
            if (is_object($login) && $login->id > 0) {
                // đăng nhập thành công
                $_SESSION["user_login"] = $login;

                header("Location: ../admin/index.php");
                exit;
            } else {
                // không tìm thấy user nào phù hợp user_name/user_password
                $errors[] = "Username hay password không hợp lệ";
            }
        } else {
            $errors[] = "Username hay password chưa được nhập";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        :root {
            --bg1: #9b59b6;
            --bg2: #3498db;
            --text: #26ade4;
        }
        * {
            margin: 0;
            padding: 0;
            outline: none;
        }
        a {
            text-decoration: none;
        }
        .container {
            width: 100vw;
            height: 100vh;
            background: linear-gradient(to bottom right, var(--bg1),var(--bg2));
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .form-login {
            width: 300px;
            height: 500px;
            background: #ffffff;
            border-radius: 10px;
            padding: 40px 30px;
        }
        .form-login h1 {
            color: #3498db;
        }
        .form-login h4 {
            margin-bottom: 50px;
            color: #26ade4;
        }
        .form-login button {
            height: 35px;
            width: 100%;
            margin-bottom: 30px;
            background: linear-gradient(120deg, var(--bg1),var(--bg2),var(--bg1));
            border: none;
            color: #ffffff;
            border-radius: 5px;
            background-size: 200%;
            transition: 1s;
        }
        .form-login button:hover {
            background-position: right;
        }
        .form-text {
            margin-bottom: 40px;
            position: relative;
        }
        .form-text input {
            width: 100%;
            height: 35px;
            border: none;
            border-bottom: 2px solid #cccccc;
            cursor: pointer;
            padding-left: 12px;
        }
        .form-text label {
            position: absolute;
            left: 12px;
            bottom: 15px;
            transition: 1s;
        }
        .form-text label.focus {
            transform: translateY(-20px);
        }
        .form-login .error {
            color: red;
            position: absolute;
            top: 20px;
            left: 12px;
            bottom: 12px;
            z-index: 1;
        }
        .form-text:hover .error {
            visibility: hidden;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="" class="form-login" method="POST">
        <h1>Đăng nhập</h1>
        <h4>Xin chào! Hãy bắt đầu nào</h4>
        <div class="form-text">
            <label>Username</label>
            <span id="errorname" class="error"></span>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-text">
            <label>Mật khẩu người dùng</label>
            <span id="errorpassword" class="error"></span>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Đăng nhập</button>
        <!-- <span>Bạn chưa có tài khoản ? <a href="create.php">Đăng ký </a></span> -->
    </form>
</div>
<script>
    const formLogin = document.querySelectorAll('.form-text input')
    const formLabel = document.querySelectorAll('.form-text label')
    for (let i = 0;i<2;i++)
    {
        formLogin[i].addEventListener("mouseover", function () {
            formLabel[i].classList.add("focus")
        })
        formLogin[i].addEventListener("mouseout", function () {
            if (formLogin[i].value =="")
            {
                formLabel[i].classList.remove("focus")
            }
        })
    }
    function getLogin() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if (username == "")
        {
            document.getElementById("errorname").innerHTML = "Please enter your username !!!";
            //alert("Please enter your username !!!")
        }
        else
        {
            document.getElementById("errorname").innerHTML = "";
        }
        if (password == "")
        {
            document.getElementById("errorpassword").innerHTML = "Please enter your login password !!!";
            //alert("Please enter your login password !!!")
        }
        else
        {
            document.getElementById("errorpassword").innerHTML = "";
        }
        if (username && password)
        {
            alert("Logged in successfully !!! Redirecting to the admin page");
            document.username.focus();
            document.password.focus();
        }
    }
</script>
</body>
</html>