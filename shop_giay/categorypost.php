<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>

<?php
	 if(!isset($_GET['postid']) || $_GET['postid'] == null){
		echo "<script>window.location='404.php';</script>";
	 }
	 else{
		 $id = $_GET['postid'];
	 }

	//  if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// 	 $catName = $_POST['catName'];
	// 	 $updateCat = $cat->update_category($catName,$id);
	//  }
?>
 
<div class="product row">
            <div class="product__content">
			<?php 
				$name_cat = $posttt->get_name_by_cat($id);
				if($name_cat){
					$result = $name_cat->fetch_assoc(); ?>
    			<h3  class="product__content-title"><?= $result['title'] ?></h3>
			<?php }?>
            </div>
            <div class="product__card">
				<?php 
				// $product ở trang header đã được gọi class
					$postbycat = $posttt->get_name_by_cat($id);
					if($postbycat){
						while($result = $postbycat->fetch_assoc()){ ?>
						<div class="product__card-item">
						<a href="details_blog.php?blogid=<?=$result['id'] ?>"><img src="admin/uploads/<?= $result['image'] ?>" alt="" /></a>
							<div class="product__card-item-title">
								<h3><?= $result['title_blog'] ?></h3>
							</div>
							
						</div>

				<?php	}
					}else{ echo '<h4 class="product__card-item-off">Danh mục chưa thêm sản phẩm</h4>';}
				?>
            </div>
        </div>
<?php include "inc/footer.php"; ?>
