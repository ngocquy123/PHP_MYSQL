<?php include "inc/header.php"; ?>
<?php
	if(isset($_GET['orderid']) && $_GET['orderid'] == 'order'){
		$customer_id = Session::get('customer_id');
		$insertOrder = $ct->insertOrder($customer_id);
		$delCart = $ct->del_all_data_cart();
		header('Location:success.php');
	}
?>
<?php
	// if(!isset($_GET['proid']) || $_GET['proid'] == null){
	// 	echo "<script>location =' 404.php'</script>";
	// }else{
	// 	$id = $_GET['proid'];
	// }
	// if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submit'])){
	// 	$quantity = $_POST['quantity'];
    //     $AddtoCart = $ct->add_to_cart($quantity,$id);
    // } 
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <h3>Đặt Hàng Thành Công</h3>
			<?php 
				$customer_id = Session::get('customer_id');
				$get_amount = $ct->getAmoutPrice($customer_id);
				if($get_amount){
					$amount = 0;
					while($result = $get_amount->fetch_assoc()){
						$price = $result['price'];
						$amount +=  $price;
					}
				}
			?>
			<p>Bạn Đã Mua Hàng Từ Website : <?php $vat = $amount*0.02;$total = $vat + $amount;echo number_format($total,0,',','.'); ?> VNĐ</p>
			<p>Chúng tôi sẽ liên hệ với bạn sớm nhất có thể. Xem đơn hàng của bạn đã đặt ở đây <a href="orderdetails.php">Bấm vào đây</a></p>
        </div>
 	</div>
</div>
	<?php include "inc/footer.php"; ?>