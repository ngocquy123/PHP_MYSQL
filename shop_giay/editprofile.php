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
    $id = Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['save'])){
        $UpdateCustomers = $cs->update_customers($_POST,$id);
    } 
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <h3>Thông Tin Khách Hàng</h3>
            <form action="" method="post">
            <table class="tblone">
                <?= isset($UpdateCustomers)?$UpdateCustomers:'' ?>
                <?php 
                    $id = Session::get('customer_id');
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){ ?>

                 
                <tr>
                    <td>Tên</td>
                    <td><input type="text" name="name"  value="<?= $result['name'] ?>" id=""></td>
                </tr>
                <tr>
                    <td>Thành Phố</td>
                    <td><input type="text" name="city"  value="<?= $result['city'] ?> " id=""></td>
                </tr>
                <tr>
                    <td>Địa Chỉ</td>
                    <td><input type="text" name="address"  value="<?= $result['address'] ?> " id=""></td>
                </tr>
                <tr>
                    <td>Điện Thoại</td>
                    <td><input type="text" name="phone"  value="<?= $result['phone'] ?> " id=""></td>
                </tr>
                <tr>
                    <td>Zipcode</td>
                    <td><input type="text" name="zipcode"  value="<?= $result['zipcode'] ?> " id=""></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email"  disabled value="<?= $result['email'] ?> " id=""></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="save" value="Lưu"></td>
                </tr>
               
        <?php 
                }
            } 
        ?>
            </table>
            </form>
        </div>
 	</div>
</div>
	<?php include "inc/footer.php"; ?>