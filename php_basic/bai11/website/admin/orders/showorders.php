<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $connect->query("delete from orderdetaill where  orderid=$id");
        $connect->query("delete from orders where id=$id");
        header("location:?option=order&status=4");
        }
?>
<?php
    if(isset($_GET['status'])){
        $status = $_GET['status'];
        $query = "select * from orders where status=".$status;
        $result = $connect->query($query);
    }else{
        return false;
    }
?>
<h1>Đơn Hàng <?= $status==1?"Chưa Xử Lý":($status==2?"Đang Xử Lý":($status==3?"Đã Xử Lý":"Hủy")); ?></h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Ngày Đặt</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  $count=1; ?>
        <?php
            foreach($result as $item){ ?>
            <tr>
                <td><?= $count++;?></td>
                <td><?= $item['id']?></td>
                <td><?= $item['orderdate']?></td>
                <td> 
                    <a href="?option=orderdetail&id=<?= $item['id'] ?>" class="btn btn-sm btn-info">Detail</a> 
                    <a href="?option=order&id=<?= $item['id'] ?>" style="display:<?= $status==4?"initial":'none'; ?>" class="btn btn-sm btn-danger" >Delete</a> 
                </td>
            </tr>
    <?php }  ?>
    </tbody>
</table>