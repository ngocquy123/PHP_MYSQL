<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>
<!-- Main Product -->
<div id="product">
	
        <div class="product row">
            <div class="product__content">
                <img src="images/Title topbanchaythang06  _1200_web.png" alt="">
            </div>
            <div class="product__card">
				<?php 
				// $product ở trang header đã được gọi class
					$product_feathered = $product->getproduct_feathered();
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
					}
				?>
            </div>
        </div>
		<div class="product row">
            <div class="product__content">
                <img src="images/Title topbanchaythang06  _1200_web.png" alt="">
            </div>
            <div class="product__card">
				<?php 
				// $product ở trang header đã được gọi class
					$product_new = $product->getproduct_new();
					if($product_new){
						while($result = $product_new->fetch_assoc()){ ?>
						<div class="product__card-item">
						<a href="details.php?proid=<?= $result['productId'] ?>"><img src="admin/uploads/<?= $result['image'] ?>" alt="" /></a>
							<div class="product__card-item-title">
								<h3><?= $result['productName'] ?></h3>
							</div>
							<div class="product__card-item-price"><p><span class="price"><?= number_format($result['price'],0,',','.'); ?> đ</span></p></div>
						</div>

				<?php	}
					}
				?>
            </div>
			<div class="phantrang">
				<?php
					$product_all = $product->get_all_product();
				 	$product_count = mysqli_num_rows($product_all);
					$product_button = ceil($product_count/4);
					echo "Trang :";
					for($i=1;$i<=$product_button;$i++){
						echo '<a href="index.php?trang='.$i.'">'.$i.'</a>';
					}
					
				?>
			</div>
        </div>
    </div>
    <!-- End Main Product -->
 
</div>
<?php include "inc/footer.php"; ?>