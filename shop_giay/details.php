<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>

<?php
	if(!isset($_GET['proid']) || $_GET['proid'] == null){
		echo "<script>location =' 404.php'</script>";
	}else{
		$id = $_GET['proid'];
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		$quantity = $_POST['quantity'];
        $AddtoCart = $ct->add_to_cart($quantity,$id);
    } 
	$customer_id = Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['compare'])){
		$productid = $_POST['productid'];
        $insertCompare = $product->insertCompare($productid,$customer_id);
    } 
	$customer_id = Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['wishlist'])){
		$productid = $_POST['productid'];
        $insertWishlist = $product->insertWishlist($productid,$customer_id);
    }
	if(isset($_POST['binhluan_submit'])){
		$binhluan = $cs->insert_binhluan();
	}
?>
 <!-- Details Product -->
  <section id="details">
          <div class="details row">
            <?php

                $get_product_details = $product->get_details($id);
                if($get_product_details){
                    while($result = $get_product_details->fetch_assoc()){ ?>
              <div class="details__right">
                  <div class="details__right-top">
                      <img src="admin/uploads/<?= $result['image']?>" alt="">
                  </div>
                  <div class="details__right-bottom">
                    <img src="images/10048468-dien-thoai-samsung-galaxy-s21-ultra-12gb-128gb-bac-1.webp" alt="">
                    <img src="images/10048468-dien-thoai-samsung-galaxy-s21-ultra-12gb-128gb-bac-1.webp" alt="">
                    <img src="images/10048468-dien-thoai-samsung-galaxy-s21-ultra-12gb-128gb-bac-1.webp" alt="">
                    <img src="images/10048468-dien-thoai-samsung-galaxy-s21-ultra-12gb-128gb-bac-1.webp" alt="">
                    <img src="images/10048468-dien-thoai-samsung-galaxy-s21-ultra-12gb-128gb-bac-1.webp" alt="">
                  </div>
              </div>
              <div class="details__left">
                <h4 class="details__left-title"><?=$result['productName'] ?> </h4>
                <div class="details__left-content">
                    <p><?= $fm->textShorten($result['product_desc'],250);?></p>
                </div>
                <p class="details__left-price"><?=number_format($result['price'],0,',','.') ?> đ</p>
                <div class="details__left-buy">
                    <form action="" method="post">
						<input type="number" class="btnbuy" name="quantity" value="1" min="1" />
						<input type="submit" class="btnbuysubmit" name="submit" value="Mua Ngay"/>
                        <?php if(isset($AddtoCart)){ echo '<span>Sản Phẩm Đã Được Thêm Vào Giỏ Hàng</span>';} ?>
					</form>		
                </div>
                <div class="details__left-btn">
                    <div class="details__left-btn-left">
                        <form action="" method="POST">
                            <input type="hidden" class="buysubmit" name="productid" value="<?= $result['productId'] ?>"/>
                            
                            <?php
                                $login_check = Session::get('customer_login');
                                if($login_check){ ?>
                                        <input type="submit" class="btnsubmit " name="compare" value="So Sánh"/>
                        <?php	}else{ 
                                    echo '';	
                                } ?>  
                        </form>
                    </div>
                    <div class="details__left-btn-right">
                        <form action="" method="POST">
                            <input type="hidden" class="buysubmit" name="productid" value="<?= $result['productId'] ?>"/>
                            <?php
                                $login_check = Session::get('customer_login');
                                if($login_check){ ?>
                                        <input type="submit" class="btnsubmit btn__ss" name="wishlist" value="Thêm Vào Yêu Thích"/>
                        <?php	}else{ 
                                    echo '';	
                                } ?>
                        </form>
                    </div>
                </div>
                <p class="details__left-contact">Gọi đặt mua 1800.6800(05h - 21h)</p>
              </div>
              <div class="details__bottom-comment">
                  <h3>
                      Bình Luận
                  </h3>
                  <div class="details__bottom-comment-content">
                    <?php 
                        $id = $_GET['proid'];
                        $get_comments = $cs->get_comments($id);
                        if($get_comments){
                            while($result = $get_comments->fetch_assoc()){ ?>
                    <div class="details__bottom-comtent-content-item">
                        <div class="details__bottom-comment-content-left"><img src="images/team3.jpg" alt=""></div>
                        <div class="details__bottom-comment-content-right">  <h5><?= $result['tenbinhluan']?></h5><p><?= $result['binhluan'] ?></p></div>
                    </div>
                    <?php	}
                        }
                    ?>
                      <!-- <div class="details__bottom-comtent-content-item">
                        <div class="details__bottom-comment-content-left"><img src="img/sp-1.webp" alt=""></div>
                        <div class="details__bottom-comment-content-right"><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem error enim culpa rem magni?</p></div>
                      </div> -->
                  </div>
                  <div class="details__bottom-comment-print">
                    <form action="" method="post">
						<input type="hidden"  name="product_id_binhluan" value="<?= $id ?>">
						<input type="text" class="details__bottom-comment-print-title" name="tennguoibinhluan" id="" placeholder="Nhập tên.....">
						<textarea name="binhluan" class="details__bottom-comment-print-content" id="" placeholder="Nhập bình luận...."></textarea>
						<input type="submit" class="details__bottom-comment-print-submit" name="binhluan_submit" value="Gửi bình luận">
					</form>
                  </div>
              </div>
              <?php  } 
                } ?>
          </div>
      </section>
      <!-- End Details Product -->
      <!-- Main Product -->
      <div class="product row">
            <div class="product__content">
                <h3 class="product__content-title">Sản Phẩm Nổi Bật</h3>
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
    <!-- End Main Product -->
    <?php include "inc/footer.php"; ?>