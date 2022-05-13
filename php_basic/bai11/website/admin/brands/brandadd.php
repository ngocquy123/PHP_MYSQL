<?php 
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $query= "select * from brands where name='$name'";
        $result = $connect->query($query);
        if(mysqli_num_rows($result) != 0){
            $alert = "Tên Hãng Đã Tồn Tại";    
        }else{
            $status = $_POST['status'];
            $query = "insert brands(name,status)";
            $query .= "values(N'$name','$status')";
            $connect->query($query);
            header("location:?option=brand");
        }
    }
?>
<h1>Thêm Hãng Sản Xuất</h1>
<h3><?= isset($alert)?$alert:''; ?></h3>
<div class="container col-md-6">
<form action="" method="post">
        <div class="form-group">
            <label for="">Tên Hãng </label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Trạng Thái Hãng </label> <br>
            <input type="radio" name="status" value="1" checked>Active
            <input type="radio" name="status" value="0">Unactive
        </div>
        <div>
            <input type="submit" value="Thêm" class="btn btn-warning">
            <a href="?option=brand" class="btn btn-outline-secondary">&lt Trở Về</a>
        </div>
    </form>
</div>