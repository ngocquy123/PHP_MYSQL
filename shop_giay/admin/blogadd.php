<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/post.php';?>
<?php include '../classes/blog.php';?>
<?php 
    $pd = new blog();
    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submit'])){
        $insertBlog = $pd->insert_blog($_POST,$_FILES);
    } 
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm Tin Tức</h2>
        <div class="block">
            <?= isset($insertBlog)?$insertBlog:'' ?>            
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="title" placeholder="nhập tiêu đề ....." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh Mục</label>
                    </td>
                    <td>
                        <select id="select" name="category_post">
                            <option>Chọn Danh Mục</option>
                            <?php
                                $post = new post();
                                $catlist = $post->show_category_post();
                                if($catlist){
                                    while($result = $catlist->fetch_assoc()){ ?>
                                        <option value="<?= $result['id_cate_post'] ?>"><?= $result['title'] ?></option>
                           <?php     }
                                }
                            ?>
                            <!-- <option value="1">Category One</option> -->
                            
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô Tả</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="desc"></textarea>
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Nội Dung</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="content"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Chọn Ảnh</label>
                    </td>
                    <td>
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
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển Thị</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Đăng" />
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


