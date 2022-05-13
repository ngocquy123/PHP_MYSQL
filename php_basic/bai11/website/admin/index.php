<?php
session_start();
    $connect = new mysqli('localhost','root','','apt_c2010g');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<?php 
    if(isset($_POST['sub'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query = "select * from admin where username = '$username' and password='$password'";
        $result = $connect->query($query);
        if(mysqli_num_rows($result) == 0){
            $alert = "Sai Tên Đăng Nhập Hoặc Mật Khâu !";
        }else{
            $result = mysqli_fetch_array($result);
            if($result['status'] == 0){
                $alert = "Tài khoảng đang bị khóa !";
            }else{
                $_SESSION['admin'] = $username;
                header("ReFresh:0");
            }
        }
    }
?>
<section>
<?php
    if(isset($_SESSION['admin'])){
        include "admincontrolpanel.php";
    }else{
        include "loginadmin.php";
    }
?>
</section>
<script src="bootstrap/bootstrap.js"></script>
<script src="../public/ckeditor/ckeditor.js"></script>
</body>
</html>