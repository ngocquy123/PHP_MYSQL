<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>
<?php
	 if(!isset($_GET['catid']) || $_GET['catid'] == null){
		echo "<script>window.location='404.php';</script>";
	 }else{
		 $id = $_GET['catid'];
	 }

	//  if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// 	 $catName = $_POST['catName'];
	// 	 $updateCat = $cat->update_category($catName,$id);
	//  }
?>

		<div class="product row">
            <div class="product__content">
			<?php 
				$name_cat = $cat-> getcatbyId($id);
				if($name_cat){
					$result = $name_cat->fetch_assoc(); ?>
    			<h3 class="product__content-title"><?= $result['catName'] ?></h3>
			<?php }?>
            </div>
            <div class="product__card">
				<?php 
				// $product ở trang header đã được gọi class
					$product_feathered = $cat->get_product_by_cat($id);
					if($product_feathered){
						while($result = $product_feathered->fetch_assoc()){ ?>
						<div class="product__card-item">
						<a href="details.php?proid=<?= $result['productId'] ?>"><img src="admin/uploads/<?= $result['image'] ?>" alt="" /></a>
							<div class="product__card-item-title">
								<h3><?= $result['productName'] ?></h3>
							</div>
							<div class="product__card-item-price"><p><span class="price"><?= number_format($result['price'],0,',','.'); ?> đ</span></p></div>
						</div>

				<?php	}
					}else{ echo '<h4 class="product__card-item-off">Danh mục chưa thêm sản phẩm</h4>';}
				?>
            </div>
        </div>

	
<?php include "inc/footer.php"; ?>