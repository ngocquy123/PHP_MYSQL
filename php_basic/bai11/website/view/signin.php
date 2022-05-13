<?php
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = md5($_POST['password']);
        $query = "select * from member where username='$username' and password='$password'";
        $result = $connect->query($query);
        if(mysqli_num_rows($result) == 0){
            $alert = "Sai Tên Đăng Nhập Hoặc Mật Khâu";
        }else{
            $result = mysqli_fetch_array($result);
            if($result['status'] == 0){
                $alert = "Tài Khoảng Của Bạn Đã Bị Khóa Hoặc Đang Trong Quá Trình Xử Lý";
            }else{
                $_SESSION['member'] = $username;
                if(isset($_GET['order'])){
                    header("location:?option=order");
                }elseif($_GET['productid']){
                    $memberid=$result['id'];
                    $productid=$_GET['productid'];
                    $content=$_SESSION['content'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date("Y-m-d h:i:s");
                    $connect->query("insert comments(memberid,productid,date,content) values($memberid,$productid,'$date','$content')");
                    echo "<script>alert('Bình Luận Của Bạn Sẽ Sớm Được Xuất Hiện...');location='?option=productdetail&id=$productid';</script>";
                }
                else{
                    header("location:?option=home");
                }  
            }
         }
    }
?>
<section>
<h1>Đăng Nhập Tài Khoảng</h1>
<div><?= isset($alert)?$alert:" "; ?></div>
<div>
    <form action="" method="POST">
        <div>
        <label for="">Username :</label> <input type="text" name="username" id="" required>
        </div>
        <div>
        <label for="">Password :</label> <input type="password" name="password" id="" required>
        </div>
        <div><input type="submit" value="Đăng Nhập" name="submit"></div>
    </form>
</div>
</section>