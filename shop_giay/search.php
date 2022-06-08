<?php include "inc/header.php"; ?>
<?php
	 if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 $tukhoa = $_POST['tukhoa'];
		 $seach_product = $product->seach_product($tukhoa);
	 }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
				<h3>Từ khóa tìm kiếm : <?= $tukhoa ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php
				$seach_product = $product->seach_product($tukhoa);
				if($seach_product){
					while($result = $seach_product->fetch_assoc()){ ?>

					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?= $result['productId'] ?>"><img src="admin/uploads/<?= $result['image']?>" alt="" /></a>
						<h2><?= $result['productName']?></h2>
						<p><span class="price"><?= number_format( $result['price'],0,',','.') ?> đ</span></p>
						<div class="button"><span><a href="details.php?proid=<?= $result['productId'] ?>" class="details">Chi Tiết</a></span></div>
					</div>
		<?php	}
				}else{ echo "Không có sản phẩm cần tìm";} 
			  ?>
			
				
				
			</div>

	
	
    </div>
 </div>
</div>
<?php include "inc/footer.php"; ?>