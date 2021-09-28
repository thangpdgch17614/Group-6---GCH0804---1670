<?php
include "./model/CourseCrud.php";
$db = new crud();

if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
}
else{
    $controller = "";
}

switch($controller){
    case 'student':
         require_once "controller/courseController.php";
         break;
    default:
        require_once "controller/courseController.php";
        break;
}
?>