<?php include "inc/header.php"; ?>
<?php
	if(isset($_GET['cartid'])){
		$id = $_GET['cartid'];
		$delcat = $ct->del_product_cart($id);
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		$cartId = $_POST['cartId'];
		$quantity = $_POST['quantity'];
        $update_quantity_cart = $ct->update_quantity_cart($quantity,$cartId);
		if($quantity <=0){
			$delcat = $ct->del_product_cart($cartId);
		}
    }
	if(!isset($_GET['id'])){
		header("location:?id=live");
	}
	
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ Hàng</h2>
					<?php isset($update_quantity_cart)?$update_quantity_cart:'' ?>
					<?php isset($delcat)?$delcat:'' ?>
						<table class="tblone">
							<tr>
								<th width="20%">Tên Sản Phẩm</th>
								<th width="10%">Hình</th>
								<th width="15%">Giá</th>
								<th width="25%">Số Lượng</th>
								<th width="20%">Tổng Giá</th>
								<th width="10%">Hình Động</th>
							</tr>
							<?php
								$get_product_cart = $ct->get_product_cart();
								if($get_product_cart){
									$subtotal=0;
									$qty=0;
									while($result = $get_product_cart->fetch_assoc()){  ?>

										
							<tr>
								<td><?= $result['productName']?></td>
								<td><img src="admin/uploads/<?= $result['image']?>" alt=""/></td>
								<td><?= number_format($result['price'],0,',','.') ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?= $result['cartId']?>" />
										<input type="number" name="quantity" min="0" value="<?= $result['quantity']?>"/>
										<input type="submit" name="submit" value="Cập Nhập"/>
									</form>
								</td>
								<td>
								<?php $total = $result['price'] * $result['quantity']; 
								echo number_format($total,0,',','.') ?></td>
								<td><a href="?cartid=<?= $result['cartId'] ?>">Xóa</a></td>
							</tr>
							
					<?php		
								$subtotal += $total;
								$qty = $qty + $result['quantity'];
							}
								}
							?>
						
						</table>
						<?php
					   		$check_cart = $ct->check_cart();
						   if($check_cart){ ?>
							<table style="float:right;text-align:left;" width="40%">
									<tr>
										<th>Tổng Giá : </th>
										<td><?php 
										
										echo number_format($subtotal);
										Session::set('sum',$subtotal);
										Session::set('qty',$qty)
										?> VNĐ</td>
									</tr>
									<tr>
										<th>Thuế VAT : </th>
										<td>2%</td>
									</tr>
									<tr>
										<th>Giá Đã Tính Thuế :</th>
										<td><?php $vat = $subtotal*0.02; $gtotal = $subtotal += $vat; echo number_format($gtotal)  ?> VNĐ</td>
									</tr>
						</table>
					<?php	   }else{
						echo "Bạn Chưa Thêm Sản Phẩm Vào Giỏ Hàng";
					}
					   ?>
						
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include "inc/footer.php"; ?>