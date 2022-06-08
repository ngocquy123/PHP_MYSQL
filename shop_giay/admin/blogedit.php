<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/post.php';?>
<?php include '../classes/blog.php';?>
<?php 
    $blog = new blog();
    if(!isset($_GET['blogid']) || $_GET['blogid'] == null){
       echo "<script>window.location='bloglist.php';</script>";
    }else{
        $id = $_GET['blogid'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $updateBlog = $blog->update_blog($_POST,$_FILES,$id);
    }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa Tin Tức</h2>
        <div class="block">
            <?= isset($updateBlog)?$updateBlog:'' ?>  
            <?php
                $get_blog_by_id = $blog->getblogbyid($id) ;
                if($get_blog_by_id){
                    while($result_blog = $get_blog_by_id->fetch_assoc()){ ?>
                        
              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tiêu đề</label>
                    </td>
                    <td>
                        <input type="text" name="blogName" class="medium" value="<?= $result_blog['title_blog'] ?>" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh Mục</label>
                    </td>
                    <td>
                        <select id="select" name="category_blog">
                            <option>Chọn Danh Mục</option>
                            <?php
                                $post = new post();
                                $postlist = $post->show_category_post();
                                if($postlist){
                                    while($result = $postlist->fetch_assoc()){ ?>
                                        <option <?= $result['id_cate_post']==$result['id_cate_post']?'selected':'' ?> value="<?= $result['id_cate_post'] ?>"><?= $result['title'] ?></option>
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
                        <textarea class="tinymce" name="blog_desc"><?= $result_blog['description'] ?></textarea>
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Nội dung</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="blog_content"><?= $result_blog['content'] ?></textarea>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Chọn Ảnh</label>
                    </td>
                    <td>
                        <img src="uploads/<?= $result_blog['image'];?>" alt="" style="width:120px" ><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Trạng Thái</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option >Chọn Kiểu</option>
                            <?php if($result_blog['status'] == 0){?>
                                <option value="0" selected>Ẩn</option>
                                <option value="1">Hiển Thị</option>
                        <?php  }else{ ?> 
                                <option value="0">Ẩn</option>
                                <option selected  value="1">Hiển Thị</option>

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


