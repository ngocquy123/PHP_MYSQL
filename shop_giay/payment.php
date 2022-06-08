<?php include "inc/header.php"; ?>
<?php
		$login_check = Session::get('customer_login');
		if($login_check == false){
			header('location:login.php');
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
            <h3>Thanh Toán</h3>
            <div>
                <h3>Chọn Phương Thức Thanh Toán</h3>
                <a href="offlinepayment.php">Thanh Toán Trực Tiếp</a> |
                <a href="onlinepayment.php">Thanh Toán Online</a>
            </div>
            <div><a href="cart.php">Về Giỏ Hàng</a></div>
        </div>
 	</div>
</div>
	<?php include "inc/footer.php"; ?>