<?php include "inc/header.php"; ?>
<?php
	// if(isset($_GET['cartid'])){
	// 	$id = $_GET['cartid'];
	// 	$delcat = $ct->del_product_cart($id);
	// }
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	// 	$cartId = $_POST['cartId'];
	// 	$quantity = $_POST['quantity'];
    //     $update_quantity_cart = $ct->update_quantity_cart($quantity,$cartId);
	// 	if($quantity <=0){
	// 		$delcat = $ct->del_product_cart($cartId);
	// 	}
    // }
	// if(!isset($_GET['id'])){
	// 	header("location:?id=live");
	// }
	
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>So Sánh Sản Phẩm</h2>
						<table class="tblone">
							<tr>
								<th width="10%">ID </th>
								<th width="20%">Tên Sản Phẩm</th>
								<th width="10%">Hình</th>
								<th width="15%">Giá</th>
								<th width="10%">Hành Động</th>
							</tr>
							<?php
                                $customer_id = Session::get('customer_id');
								$get_compare = $product->get_compare($customer_id);
								if($get_compare){
                                    $i = 0;
									while($result = $get_compare->fetch_assoc()){  $i++ ?>

										
							<tr>
                                <td><?= $i ?></td>
								<td><?= $result['productName']?></td>
								<td><img src="admin/uploads/<?= $result['image']?>" alt=""/></td>
								<td><?= number_format($result['price'],0,',','.') ?> VNĐ</td>
								<td><a href="details.php?proid=<?= $result['productId'] ?>">Xem</a></td>
							</tr>
							
					<?php		
							}
								}
							?>
						
						</table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include "inc/footer.php"; ?>