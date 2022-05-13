<?php 
    $query="select * from member where username='".$_SESSION['member']."'";
    $member = mysqli_fetch_array($connect->query($query));
?>
<?php
 if(isset($_POST['name'])){
     $name=$_POST['name'];
     $mobile=$_POST['mobile'];
     $address=$_POST['address'];
     $email=$_POST['email'];
     $note=$_POST['note'];
     $ordermethodid=$_POST['ordermethodid'];
     $memberid=$member['id'];
     $query="insert orders(ordermethodid,memberid,name,address,mobile,email,note)";
     $query .= "values($ordermethodid, $memberid,'$name','$address','$mobile','$email','$note')";
     $connect->query($query);
     $query ="select id from orders order by id limit 1";
    $orderid=mysqli_fetch_array($connect->query($query))['id'];
    foreach($_SESSION['cart'] as $key => $value){
        $productid=$key;
        $number=$value;
        $query = "select price from products where id=$key";
        $price =mysqli_fetch_array($connect->query($query))['price'];
        $query = "insert orderdetaill";
        $query .= " values($productid,$orderid,$number,$price)";
        $connect->query($query); 
    }
    unset($_SESSION['cart']);
    header("location:?option=ordersuccess");
 }
?>

<h1>Đặt Hàng</h1>
<h2>Thông Tin Người Nhận</h2>
<div>
    <form action="" method="post">
        <div><label for="">Họ Tên:</label><input type="text" name="name"  value=" <?= $member['fullname'] ?>" required></div>
        <div><label for="">Điện Thoại:</label><input type="tel" name="mobile" value="<?= $member['mobile']; ?>" required></div>
        <div><label for="">Địa Chỉ:</label><textarea name="address" rows="3" value="<?= $member['address']; ?>" ></textarea></div>
        <div><label for="">Email:</label><input type="email" name="email" value="<?= $member['email']; ?>" required></div>
        <div><label for="">Ghi Chú:</label><textarea name="note" id="" rows="3"></textarea></div>
        <br>
        <h2>Chọn Phương Thức Thanh Toán</h2>
        <div>
        <?php
            $query = "select * from ordermethod where status";
            $result = $connect->query($query);
        ?>
        <select name="ordermethodid" id="">
            <?php
                foreach($result as $item){ ?>
                <option value="<?=  $item['id']?>"><?= $item['name'] ?></option>
           <?php }
            ?>
        </select>
        <div><input type="submit" value="Đặt Hàng" ></div>
        </div>
    </form>
</div>