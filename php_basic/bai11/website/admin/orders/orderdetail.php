<?php
    if(isset($_GET['action'])){
        $condition = " where orderid=".$_GET['orderid']." and productid=".$_GET['productid'];
        if($_GET['type']=='asc'){
            $query = "update orderdetaill set number=number+1".$condition;
        }else{
            $query = "update orderdetaill set number=number-1".$condition;
        }
        $connect->query($query);
        header("location:?option=orderdetail&id=".$_GET['id']);
    }

    if(isset($_POST['status'])){
        $connect->query("update orders set status=".$_POST['status']." where id=".$_GET['id']);
        header("refresh:0");
    }
?>
<?php 
    $query = "select a.fullname,a.mobile as 'mobilemember',a.address as 'addressmember',a.email as 'emailmember',b.*,c.name as 'nameordermethod'
    from member a join orders b on a.id=b.memberid join ordermethod c on b.ordermethodid=c.id 
    where b.id =".$_GET['id'];
    $order = mysqli_fetch_array($connect->query($query));
?>
<h1>CHI TIẾT ĐƠN HÀNG <br> (Mã Đơn Hàng: <?= $order['id']?>)</h1>
<h2>Ngày Tạo Đơn Hàng</h2>
<h3><?= $order['orderdate']?></h3>
<h2>THÔNG TIN NGƯỜI ĐẶT HÀNG</h2>
<table class="table">
    <tbody>
        <tr>
            <td>Họ Tên: </td>
                <td><?= $order['fullname'] ?> </td>
            <tr>
                <td>Điện Thoại: </td>
                <td><?= $order['mobilemember']?></td>
            </tr>
            <tr>
                <td>Địa Chỉ: </td>
                <td><?= $order['addressmember']?></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><?= $order['emailmember']?></td>
            </tr>
            <tr>
                <td>Ghi Chú: </td>
                <td><?= $order['note']?></td>
            </tr>
        </tr>
    </tbody>

</table>
<h2>THÔNG TIN NGƯỜI NHẬN HÀNG</h2>
<table class="table">
    <tbody>
        <tr>
            <td>Họ Tên: </td>
            <td><?= $order['fullname'] ?> </td>
            <tr>
                <td>Điện Thoại: </td>
                <td><?= $order['mobile']?></td>
            </tr>
            <tr>
                <td>Địa Chỉ: </td>
                <td><?= $order['address']?></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><?= $order['email']?></td>
            </tr>
        </tr>
    </tbody>

</table>
<h2>PHƯƠNG THỨC THANH TOÁN</h2>
<div><?= $order['nameordermethod'] ?></div>
<?php 
    $query = "select b.*,c.name,c.image 
    from orders a join orderdetaill b on a.id=b.orderid join products c on b.productid = c.id 
    where a.id=".$order['id'];
    $orderdetails=$connect->query($query);
?>
<form  method="post">
    <h2>CÁC SẢN PHẨM ĐẶT MUA</h2>
    <?php $count = 1; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số Lượng</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach($orderdetails as $item){ ?>
        <tr>
            <td><?= $count++ ?></td>
            <td><?= $item['name'] ?></td>
            <td width="15%"><img src="../images/<?= $item['image'] ?>" width="100%" alt=""></td>
            <td><?= number_format($item['price'],0,',','.') ?> (đ)</td>
            <td><?= $item['number'] ?>
            <input type="button" value="-" <?= $item['number'] <= 0 ?'disabled':'' ?> onclick="location='?option=orderdetail&id=<?= $_GET['id']?>&action=update&type=desc&orderid=<?= $item['orderid']?>&productid=<?= $item['productid'] ?>'">
            <input type="button" value="+" onclick="location='?option=orderdetail&id=<?= $_GET['id']?>&action=update&type=asc&orderid=<?= $item['orderid']?>&productid=<?= $item['productid'] ?>'"></td>
        </tr>
    <?php } ?>
        </tbody>
    </table>
    <h2>TRẠNG THÁI ĐƠN HÀNG</h2>
    <div style="display:<?= $order['status']==2 || $order['status']==3?'none':'initial' ?>"><input type="radio" name="status" id="" value="1" <?= $order['status']==1?'checked':'' ?> >Chưa Xử Lý</div>
    <div style="display:<?= $order['status']==3?'none':'initial' ?>"><input type="radio" name="status" id="" value="2" <?= $order['status']==2?'checked':'' ?>>Đang Xử Lý</div>
    <div><input type="radio" name="status" id="" value="3" <?= $order['status']==3?'checked':'' ?>>Đã Xử Lý</div>
    <div style="display:<?= $order['status']==3?'none':'initial' ?>"><input type="radio" name="status" id="" value="4" <?= $order['status']==4?'checked':'' ?>>Hủy</div>
    <div>
        <input type="submit" value="Cập Nhập Đơn Hàng" class="btn btn-primary" <?= $order['status']==3?'disabled':'' ?>>
        <a href="?option=order&status=1"  class="btn btn-secondary">Trở Lại</a>
    </div>
</form>