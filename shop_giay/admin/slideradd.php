<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php' ?>
<?php
    $product = new product();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $insertSlider = $product->insert_slider($_POST,$_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm Slider Mới</h2>
    <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">   
            <?= isset($insertSlider)?$insertSlider:'' ?>  
                <tr>
                    <td>
                        <label>Tiêu Đề</label>
                    </td>
                    <td>
                        <input type="text" name="sliderName" placeholder="Tiêu đề ....." class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Chọn Hình Ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                </tr>
               
                <tr>
                    <td>
                        <label>Loại</label>
                    </td>
                    <td>
                        <select name="type" id="">
                            <option value="0">Tắt</option>
                            <option value="1">Bật</option>
                        </select>
                    </td>
                </tr>
               
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Lưu" />
                    </td>
                </tr>
            </table>
            </form>
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