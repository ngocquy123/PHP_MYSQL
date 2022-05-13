<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $products = $connect->query("select * from products where brandid=$id");
        if(mysqli_num_rows($products) !=0){
            $connect->query("update brands set status=0 where id=$id");
        }else{
            $connect->query("delete from brands where id=$id");
        }
    }
?>
<?php
    $query = "select * from brands";
    $result = $connect->query($query);

?>
<h1>Hãng Sản Xuất </h1>
<div><a href="?option=brandadd" class="btn btn-success">Thêm Hãng Sản Xuất</a></div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã Hãng</th>
            <th>Tên Hãng</th>
            <th>Trạng Thái Hãng</th>
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
                <td><?= $item['status']==1?'Active':'Unactive'?></td>
                <td> 
                    <a href="?option=brandupdate&id=<?= $item['id'] ?>" class="btn btn-sm btn-info">Update</a> 
                    <a href="?option=brand&id=<?= $item['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn Có Muốn Xóa Chứ ?')">Delete</a> 
                </td>
            </tr>
    <?php }  ?>
    </tbody>
</table>