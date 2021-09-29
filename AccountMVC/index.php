<?php
// no mvc giống là ngôi nhà có rất nhiều cửa ra vào
// mvc thì có 1 cửa chính để ra vào duy nhất
// index.php là file đầu vào của ứng dụng
// mọi tác vụ thêm sửa xóa đăng nhập đăng ký đều chạy file index.php ngoài cùng

// câu lệnh nạp file
// include , require , include_once , require_once 4 câu lệnh nạp file vào file khác

// khai báo hằng số url của ứng dụng
// tên miền của ứng dụng này
define("SITE_URL", "http://localhost/AccountMVC/");

// nên nạp đầu tiên
include_once "mvc/models/database.php";
// nạp các controller vào trong index.php
include_once "mvc/controllers/AccountController.php";

// nạp tiếp các model
include_once "mvc/models/AccountModel.php";

// nạp tiếp router.php
include_once "mvc/router.php";

$router = new Router();
$router->run();