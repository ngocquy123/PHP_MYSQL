<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/brand.php" ?>
<?php
    $brand = new brand();
    	if(!isset($_GET['brandid']) || $_GET['brandid'] == null){
           echo "<script>window.location='brandlist.php';</script>";
        }else{
            $id = $_GET['brandid'];
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $brandName = $_POST['brandName'];
            $updateBrand = $brand->update_brand($brandName,$id);
        }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục</h2>
               <div class="block copyblock"> 
                <?= isset($updateBrand)?$updateBrand:""; ?>
               <?php 
                     $get_brand_name = $brand->getbrandbyId($id);
                     if($get_brand_name){
                        $result = $get_brand_name->fetch_assoc()    
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Sửa danh mục sản phẩm ...." class="medium" value="<?= $result['brandName']?>" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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