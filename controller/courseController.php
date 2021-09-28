<?php
//TrainingStaff file trong controller

if(isset($_GET['action'])){
    $action = $_GET['action'];

}
else{
    $action = "";
}

switch($action){
    case "add":
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            if(empty($name) || empty($email) || empty($phone)){
                $error = "Missing !!";
            }
            else{
                $db->action(sql: "INSERT INTO trainee VALUES('$name', '$email', '$phone')");
                // chua co header
            }    
        }
    require_once "views/addCourse.php";
    break;

    case "edit":
        require_once "views/editCourse.php";
    break;

    case "delete":        
    break;

    default:
    $data = $db->getData(sql: "SELECT * FROM course");
    require_once"views/TrainingStaffview.php";
    break;
}