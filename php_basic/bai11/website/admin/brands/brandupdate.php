<?php 
    $brand=mysqli_fetch_array($connect->query("select * from brands where id=".$_GET['id']));

?>
<?php 
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $query= "select * from brands where name='$name' and id !=".$brand['id'];
        $result = $connect->query($query);
        if(mysqli_num_rows($result) != 0){
            $alert = "Đã Có Hãng Khác Mang Tên Tên Hãng Này";    
        }else{
            $status = $_POST['status'];
            $query = "update brands set name='$name',status ='$status' where id=".$brand['id'];
            $connect->query($query);
            header("location:?option=brand");
        }
    }
?>
<h1>Sửa Hãng Sản Xuất</h1>
<h3><?= isset($alert)?$alert:''; ?></h3>
<div class="container col-md-6">
<form action="" method="post">
        <div class="form-group">
            <label for="">Tên Hãng </label>
            <input type="text" name="name" class="form-control" value="<?= $brand['name'] ?>">
        </div>
        <div class="form-group">
            <label for="">Trạng Thái Hãng </label> <br>
            <input type="radio" name="status" value="1" <?= $brand['status']==1?'checked':''; ?>>Active
            <input type="radio" name="status" value="0" <?= $brand['status']==0?'checked':''; ?>>Unactive
        </div>
        <div>
            <input type="submit" value="Sửa" class="btn btn-warning">
            <a href="?option=brand" class="btn btn-outline-secondary">&lt Trở Về</a>
        </div>
    </form>
</div>