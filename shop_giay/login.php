<?php include "inc/header.php"; ?>
<?php
	$login_check = Session::get('customer_login');
	if($login_check == true) {
		header('location:order.php');
	} 
	
?>
<?php
	 if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['login'])){
		 $loginCustomer = $cs->login_customer($_POST);
	 }
	 if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submit'])){
		$insertCustomer = $cs->insert_customer($_POST);
	} 

?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng Nhập</h3>
        	<p><?= isset($loginCustomer)?$loginCustomer:'';?></p>
        	<form action="" method="POST" id="member">
                	<input name="email" type="text" class="field" placeholder="Enter Email...">
                    <input name="password" type="password" class="field" placeholder="Enter Email...">
                 
                 	<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><input type="submit" class="grey" name="login" value="Đăng Nhập" /></div></div>
                    </div>
			</form>
    	<div class="register_account">
    		<h3>Đăng Ký Tài Khoảng</h3>
			<?= isset($insertCustomer)?$insertCustomer:'';?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
							<tr>
								<td>
									<div>
										<input type="text" name="name" placeholder="Enter Name......" autocomplete="off">
									</div>
									<div>
										<input type="text" name="city" placeholder="Enter City....." autocomplete="off">
									</div>
									<div>
										<input type="text" name="zipcode" placeholder="Enter Zipcode...." autocomplete="off">
									</div>
									<div>
										<input type="text" name="email" placeholder="Enter Email...." autocomplete="off">
									</div>
									<div>
										<input type="text" name="address" placeholder="Enter Adress...." autocomplete="off">
									</div>
									
								</td>
								<td>	        
			
									<div>
										<input type="text" name="phone" placeholder="Enter Phone......" autocomplete="off">
									</div>
									
									<div>
										<input type="password" name="password" placeholder="Enter Password...." autocomplete="off">
									</div>
								</td>
		    				</tr> 
		   				 </tbody>
					</table> 
		   <div class="search"><div><input  type="submit" name="submit" value="Đăng Ký"class="grey"/></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include "inc/footer.php"; ?>

