﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/category.php" ?>
<?php
    	$class = new category();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $catName = $_POST['catName'];
            $insertCat = $class->insert_cartergory($catName);
        }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Danh Mục Mới</h2>
               <div class="block copyblock"> 
               <?= isset($insertCat)?$insertCat:'' ?>
                 <form action="catadd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Thêm danh mục sản phẩm ...." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>