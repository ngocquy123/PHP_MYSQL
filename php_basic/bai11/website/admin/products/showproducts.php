<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $products = $connect->query("select * from orderdetaill where productid=$id");
        if(mysqli_num_rows($products) !=0){
            $connect->query("update products set status=0 where id=$id");
        }else{
            $connect->query("delete from products where id=$id");
            unlink("../images/".$_GET['image']);
        }
    }
?>
<?php
    $query = "select * from products";
    $result = $connect->query($query);

?>
<h1>Danh Sách Sản Phẩm </h1>
<div><a href="?option=productadd" class="btn btn-success">Thêm Sản Phẩm</a></div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Ảnh</th>
            <th>Trạng Thái</th>
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
                <td><?= $item['name']?></td>
                <td><?= number_format( $item['price'],0,',','.')?></td>
                <td width="20%"> <img src="../images/<?= $item['image']?>" alt="" width="30%"></td>
                <td><?= $item['status']==1?'Active':'Unactive'?></td>
                <td> 
                    <a href="?option=productupdate&id=<?= $item['id'] ?>" class="btn btn-sm btn-info">Update</a> 
                    <a href="?option=product&id=<?= $item['id'] ?>&image=<?= $item['image'] ?>" class="btn btn-sm btn-danger" >Delete</a> 
                </td>
            </tr>
    <?php }  ?>
    </tbody>
</table>