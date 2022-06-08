<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	 $filepath = realpath(dirname(__FILE__));
	 include_once($filepath.'/../classes/cart.php');
?>
<?php
	$ct = new cart();
	if(isset($_GET['shiftid'])){
		$id = $_GET['shiftid'];
		$price = $_GET['price'];
		$time = $_GET['time'];
		$shifted = $ct->shifted($id,$time,$price);
	}
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$price = $_GET['price'];
		$time = $_GET['time'];
		$del_shifted = $ct->del_shifted($id,$time,$price);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Đặt Hàng</h2>
                <div class="block">
					<?= isset($shifted)?$shifted:''; ?>  
					<?= isset($del_shifted)?$del_shifted:''; ?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Thời Gian Đặt Hàng</th>
							<th>Sản Phẩm</th>
							<th>Số Lượng</th>
							<th>Giá</th>
							<th>Khách Hàng</th>
							<th>Địa Chỉ</th>
							<th>Hành Động</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$ct = new cart();
							$get_indox_cart = $ct->get_inbox_cart();
							if($get_indox_cart){
								$i=0;
								while($result = $get_indox_cart->fetch_assoc()){ $i++; ?>
									<tr class="odd gradeX">
									<td><?= $i ?></td>
									<td><?= $result['date_order'] ?></td>
									<td><?= $result['productName'] ?></td>
									<td><?= $result['quantity'] ?></td>
									<td><?= number_format($result['price'],0,',','.') ?> <sup>đ</sup></td>
									<td><?= $result['customer_id'] ?></td>
									<td><a href="customer.php?customerid=<?= $result['customer_id'] ?>">Xem</a></td>
									<td>
									<?php
										if($result['status'] == '0'){ ?>
										<a href="?shiftid=<?= $result['id'] ?>&price=<?=$result['price'] ?>&time=<?= $result['date_order'] ?>">Chờ Xử Lý</a>
									<?php }elseif($result['status']== '1'){ ?>
											Đã Xử Lý
							<?php }else{ ?>
										<a href="?delid=<?= $result['id'] ?>&price=<?=$result['price'] ?>&time=<?= $result['date_order'] ?>">Xóa</a>
							<?php	}
									?>
									</td>
						</tr>
						<?php	}
							}
						?>
						
					
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
