<?php
session_start();
include_once 'model/DBstudent.php';
include_once 'model/DBconnect.php';
include_once 'model/Student.php';
include_once "controller/StudentController.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Manager</title>
</head>
<body>
<div>
    <div>
        <a href="index.php">Trang chủ</a>
        <a href="index.php?page=logout">Đăng xuất</a>
    </div>
    <?php
    $controller = new StudentController();
    $page = isset($_REQUEST['page'])? $_REQUEST['page'] : NULL;
    switch ($page){
        case 'create':
            $controller->create();
            break;
        case 'del':
            $controller->del();
            break;
        case 'update':
            $controller->update();
            break;
        case 'list':
            $controller->showList();
            break;
        case 'logout':
            $controller->logout();
            break;
        case 'register':
            $controller->register();
            break;
        default:
            $controller->login();
            break;
    }
    ?>
</div>
</body>
</html>