<?php
    $product = mysqli_fetch_array($connect->query("select * from products where id=".$_GET['id']));

?>
<?php 
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $query= "select * from products where name='$name' and id!=".$product['id'];
        $result = $connect->query($query);
        if(mysqli_num_rows($result) != 0){
            $alert = "Đã có Sản Phẩm Khác Sử Dụng Tên Này";    
        }else{
            $brandid = $_POST['brandid'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            // Xử lý phần ảnh :
                $store = "../images/";
                $imageName=$_FILES['image']['name'];
                $imageTemp=$_FILES['image']['tmp_name'];
                $exp3=substr($imageName, strlen($imageName)-3);
                $exp4=substr($imageName, strlen($imageName)-4);
                if($exp3 = 'jpg' || $exp3 =='png' || $exp3=='bmp' || $exp3 =='gif' || $exp3 = 'JPG' || $exp3 = 'PNG' || $exp3 = 'GIF' || $exp3 = 'BMP'
                || $exp4 = 'webp' || $exp4 = 'WEBP' || $exp4 = 'jpeg' || $exp4 = 'JPEG'){
                    $imageName = time().'_'.$imageName;
                    move_uploaded_file($imageTemp,$store.$imageName);
                    unlink($store.$product['image']);
                }else{
                    $alert = "File Đã chọn không phải file ảnh !";
                }
                if(empty($imageName)){
                    $imageName = $product['image'];
                } 
            ////////////////////
            $connect->query("update products set brandid = '$brandid', name='$name',price='$price',image='$imageName',description='$description',status='$status'
            where id=".$product['id']);
            header("location:?option=product");  
        }
    }
?>
<?php $brands=$connect->query("select * from brands") ?>
<h1>Update Sản Phẩm</h1>
<h3><?= isset($alert)?$alert:''; ?></h3>
<div class="container col-md-6">
<form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Hãng</label>
            <select name="brandid"  class="form-control" id="">
                <option  hidden>-- Chọn Hãng --</option>
                <?php foreach($brands as $item){ ?>
                <option value="<?= $item['id']?>" <?= $item['id']==$product['brandid']?'selected':''; ?>><?= $item['name'] ?></option>
                <?php  } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Tên: </label>
            <input type="text" name="name" value="<?= $product['name']?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Giá: </label>
            <input type="number" min="10" name="price" value="<?=  $product['price']?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Ảnh: </label> <br>
            <img src="../images/<?= $product['image'] ?>" width="15%" alt="">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Mô Tả: </label>
            <textarea name="description" id="description" class="form-control"><?= $product['description']?></textarea>
            <script> CKEDITOR.replace("description");</script>
        </div>
        <div class="form-group">
            <label for="">Trạng Sản Phẩm </label> <br>
            <input type="radio" name="status" value="1" <?= $product['status']==1?'checked':''; ?>>Active
            <input type="radio" name="status" value="0" <?= $product['status']==0?'checked':''; ?>>Unactive
        </div>
        <div>
            <input type="submit" value="Update" class="btn btn-warning">
            <a href="?option=product" class="btn btn-outline-secondary">&lt Trở Về</a>
        </div>
    </form>
</div>