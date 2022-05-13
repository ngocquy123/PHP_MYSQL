<?php
    if(isset($_POST['dk'])){
        $username = $_POST['username'];
        $query = "select * from member where username = '$username'";
        $result = $connect->query($query);
        if(mysqli_num_rows($result) != 0){
            $alert = "Tên Đăng Nhập Đã Được Sử Dụng, Bạn Vui Lòng Chọn Tên Khác";
        }else{
            $password = md5($_POST['password']);
            $fullname = $_POST['fullname'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $query = "insert member(username,password,fullname,mobile,address,email) values('$username','$password','$fullname','$mobile','$address','$email')";
            $connect->query($query);
            echo "<script> alert('Tài Khoản Của Bạn Đã Được Đăng Ký Thành Công');location='?option=home'</script>";
        }
    }
?>
<h1>Đăng ký Tải Khoảng</h1>
<section>
    <div><?= isset($alert)?$alert:" ";?></div>
    <form action="" method="post" onsubmit="if(repassword.value!=password.value){ alert('Mật Khẩu Không Trùng Khớp.');return false;}">
        <div><label for="">User Name :</label> <input type="text" name="username" id="" required> </div>
        <div><label for="">Password :</label> <input type="password" name="password" id="" required> </div>
        <div><label for="">Re-Password :</label> <input type="password" name="repassword" id="" required> </div>
        <div><label for="">Fullname :</label> <input type="text" name="fullname" id="" required> </div>
        <div><label for="">Mobile :</label> <input type="tel" name="mobile" id="" required > </div>
        <div><label for="">Address :</label> <textarea name="address" id="" required></textarea> </div>
        <div><label for="">Email :</label> <input type="email" name="email" id=""> </div>
        <div> <input type="submit" name="dk" value="Đăng Ký"> </div>

    </form>
</section>