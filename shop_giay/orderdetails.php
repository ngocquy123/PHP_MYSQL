<?php include "inc/header.php"; ?>
<?php
    $customer_id = Session::get('customer_id');
    if($customer_id == false){
        header('location:login.php');
    }
    $ct = new cart();
    if(isset($_GET['confirmid'])){
		$id = $_GET['confirmid'];
		$price = $_GET['price'];
		$time = $_GET['time'];
		$shifted_confirmid = $ct->shifted_confirmid($id,$time,$price);
	}
	
?>
<div class="main">
    <div class="content">
    	<div class="section group">
            <h3>Đơn Hàng Đã Đặt</h3>
            <form action="" method="post">
            <div class="box_main" style="display:flex;">
                <div class="box_left">
                <div class="cartpage">
						<table class="tblone">
							<tr>
                                <th width="5%">STT</th>
								<th width="20%">Tên Sản Phẩm</th>
								<th width="15%">Ảnh</th>
								<th width="15%">Giá</th>
								<th width="10%">Số Lượng</th>
								<th width="10%">Ngày Đặt</th>
								<th width="10%">Trạng Thái</th>
							</tr>
							<?php
                                $customer_id = Session::get('customer_id');
								$get_cart_ordered = $ct->get_cart_ordered($customer_id);
								if($get_cart_ordered){
                                    $i=0;
									while($result = $get_cart_ordered->fetch_assoc()){   $i++;?>

										
                                    <tr>
                                        <td><?=  $i?></td>
                                        <td><?= $result['productName']?></td>
                                        <td><img src="admin/uploads/<?=$result['image'] ?>" alt=""></td>
                                        <td><?= number_format($result['price'],0,',','.') ?></td>
                                        <td><?= $result['quantity']?></td>
                                        <td><?= $result['date_order']?></td>
                                        <td>
                                        <?php if($result['status']== 0){ ?>
                                                    Đang Xử Lý
                                        <?php }elseif($result['status'] == 1){ ?>
                                            <a href="?confirmid=<?= $customer_id ?>&price=<?= $result['price']?>&time=<?= $result['date_order'] ?>">Đã Nhận Hàng</a>
                                        <?php }else{?>
                                                    Giao Hàng Thành Công
                                            <?php } ?>
                                        </td>
                                       
                                        </tr>
							
                                <?php			
                                    }
                                }
                                ?>
						
						</table>
                        <a href="index.php">Về Trang Chủ</a>
					</div>
                </div>
            </div>
            </form>
 		</div>
 	</div>
</div>
	<?php include "inc/footer.php"; ?>