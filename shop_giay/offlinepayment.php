<?php include "inc/header.php"; ?>
<?php
	if(isset($_GET['orderid']) && $_GET['orderid'] == 'order'){
		$customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delCart = $ct->del_all_data_cart();
        header('Location:success.php');
	}
	// if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submit'])){
	// 	$quantity = $_POST['quantity'];
    //     $AddtoCart = $ct->add_to_cart($quantity,$id);
    // } 
?>
<div class="main">
    <div class="content">
    	<div class="section group">
            <h3>Thanh Toán Trực Tiếp</h3>
            <form action="" method="post">
            <div class="box_main" style="display:flex;">
                <div class="box_left">
                <div class="cartpage">
					<?php isset($update_quantity_cart)?$update_quantity_cart:'' ?>
					<?php isset($delcat)?$delcat:'' ?>
						<table class="tblone">
							<tr>
                                <th width="5%">STT</th>
								<th width="20%">Tên Sản Phẩm</th>
								<th width="15%">Giá</th>
								<th width="20%">Số Lượng</th>
								<th width="20%">Tổng Giá</th>
							</tr>
							<?php
								$get_product_cart = $ct->get_product_cart();
								if($get_product_cart){
									$subtotal=0;
									$qty=0;
                                    $i=0;
									while($result = $get_product_cart->fetch_assoc()){   $i++;?>

										
							<tr>
                                <td><?=  $i?></td>
								<td><?= $result['productName']?></td>
								<td><?= number_format($result['price'],0,',','.') ?></td>
								<td><?= $result['quantity']?></td>
								<td>
								<?php $total = $result['price'] * $result['quantity']; 
								echo number_format($total,0,',','.') ?></td>
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
                </div>
                <div class="box-right">
                <table class="tblone">
                <?php 
                    $id = Session::get('customer_id');
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){ ?>

                 
                <tr>
                    <td>Tên</td>
                    <td><?= $result['name'] ?></td>
                </tr>
                <tr>
                    <td>Thành Phố</td>
                    <td><?= $result['city'] ?></td>
                </tr>
                <tr>
                    <td>Địa Chỉ</td>
                    <td><?= $result['address'] ?></td>
                </tr>
                <tr>
                    <td>Điện Thoại</td>
                   <td><?= $result['phone'] ?></td>
                </tr>
                <tr>
                    <td>Zipcode</td>
                    <td><?= $result['zipcode'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $result['email'] ?></td>
                </tr>
               
        <?php 
                }
            } 
        ?>
            </table>
                </div>
            </div>
            <div>
               <a href="?orderid=order">Đặt Hàng</a>
            </div>
            </form>
 		</div>
 	</div>
</div>
	<?php include "inc/footer.php"; ?>