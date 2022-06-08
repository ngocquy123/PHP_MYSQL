<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php 
    $pd = new product();
    if(!isset($_GET['productid']) || $_GET['productid'] == null){
       echo "<script>window.location='productlist.php';</script>";
    }else{
        $id = $_GET['productid'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $updateProduct = $pd->update_product($_POST,$_FILES,$id);
    }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa Sản Phẩm</h2>
        <div class="block">
            <?= isset($updateProduct)?$updateProduct:'' ?>  
            <?php 
                $get_product_by_id = $pd->getproductbyid($id) ;
                if($get_product_by_id){
                    while($result_product = $get_product_by_id->fetch_assoc()){ ?>
                        
              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="productName" class="medium" value="<?= $result_product['productName'] ?>" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh Mục</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Chọn Danh Mục</option>
                            <?php
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while($result = $catlist->fetch_assoc()){ ?>
                                        <option <?= $result['catId']==$result_product['catId']?'selected':'' ?> value="<?= $result['catId'] ?>"><?= $result['catName'] ?></option>
                           <?php     }
                                }
                            ?>
                            <!-- <option value="1">Category One</option> -->
                            
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương Hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Chọn Thương Hiệu</option>
                            <?php
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if($brandlist){
                                    while($result = $brandlist->fetch_assoc()){ ?>
                                        <option  <?= $result['brandId']==$result_product['brandId']?'selected':'' ?> value="<?= $result['brandId'] ?>"><?= $result['brandName'] ?></option>
                           <?php     }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô Tả</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="product_desc"><?= $result_product['product_desc'] ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Nhập giá..." class="medium" value="<?= $result_product['price'] ?>"/>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Chọn Ảnh</label>
                    </td>
                    <td>
                        <img src="uploads/<?= $result_product['image'];?>" alt="" style="width:120px" ><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Chọn Kiểu Sản Phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option >Chọn Kiểu</option>
                            <?php if($result_product['type'] ==0){?>
                                <option value="0">Đang Bán</option>
                                <option selected value="1">Mới</option>
                        <?php  }else{ ?> 
                                <option selected value="0">Đang Bán</option>
                                <option  value="1">Mới</option>

                            <?php } ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Cập Nhập" />
                    </td>
                </tr>
            </table>
            </form>
       <?php     }
            }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


