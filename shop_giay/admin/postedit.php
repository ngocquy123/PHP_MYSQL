<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/post.php"; ?>
<?php
    $cat = new post();
    	if(!isset($_GET['catid']) || $_GET['catid'] == null){
           echo "<script>window.location='postlist.php';</script>";
        }else{
            $id = $_GET['catid'];
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $catName = $_POST['catName'];
            $catDesc = $_POST['catDesc'];
            $catStatus = $_POST['catStatus'];
            $updateCat = $cat->update_category_post($catName,$catDesc,$catStatus,$id);
        }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục Tin Tức</h2>
               <div class="block copyblock"> 
                <?= isset($updateCat)?$updateCat:""; ?>
               <?php 
                     $get_cate_name = $cat->get_cat_byId($id);
                     if($get_cate_name){
                        $result = $get_cate_name->fetch_assoc()    
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Sửa danh mục tin tức...." class="medium" value="<?= $result['title']?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="catDesc" placeholder="Thêm mô tả danh mục tin tức ...." class="medium" value="<?= $result['description']?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="catStatus" id="">
                                    <option value="0" <?= $result['status']==0?'selected':1 ?>>Ẩn</option>
                                    <option value="1" <?= $result['status']==1?'selected':0 ?>>Hiển Thị</option>
                                </select>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Lưu" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php 
                          
                        }
                    ?>

                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>