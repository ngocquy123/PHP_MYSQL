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
            <h3>Thông Tin Khách Hàng</h3>
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
                <tr>
                    <td colspan="2"><a href="editprofile.php">Cập Nhập Thông Tin</a></td>
                </tr>
               
        <?php 
                }
            } 
        ?>
            </table>
        </div>
 	</div>
</div>
	<?php include "inc/footer.php"; ?>