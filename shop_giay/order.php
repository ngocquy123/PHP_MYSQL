<?php include "inc/header.php"; ?>
<?php
	$login_check = Session::get('customer_login');
	if($login_check == false) {
		header('location:login.php');
	} 
	
?>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
                <h2>Trang Đặt Hàng </h2>
				
    	    </div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include "inc/footer.php"; ?>