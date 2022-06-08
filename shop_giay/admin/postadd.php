<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/post.php" ?>
<?php
    	$class = new post();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $catName = $_POST['catName'];
            $catDesc = $_POST['catDesc'];
            $catStatus = $_POST['catStatus'];
            $insertCat = $class->insert_post($catName,$catDesc,$catStatus);
        }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Danh Tin Tức Mới</h2>
               <div class="block copyblock"> 
               <?= isset($insertCat)?$insertCat:'' ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Thêm danh mục tin tức ...." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="catDesc" placeholder="Thêm mô tả danh mục tin tức ...." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="catStatus" id="">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển Thị</option>
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
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>