<?php include "inc/header.php"; ?>
<?php
    
	if(isset($_GET['proid'])){
        $customer_id = Session::get('customer_id');
		$proid = $_GET['proid'];
		$delwlist = $product->del_wlist($proid,$customer_id);
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Sản Phẩm Yêu Thích</h2>
						<table class="tblone">
							<tr>
								<th width="10%">ID </th>
								<th width="20%">Tên Sản Phẩm</th>
								<th width="10%">Hình</th>
								<th width="15%">Giá</th>
								<th width="10%">Hành Động</th>
							</tr>
							<?php
                                $customer_id = Session::get('customer_id');
								$get_wishlist = $product->get_wishlist($customer_id);
								if($get_wishlist){
                                    $i = 0;
									while($result = $get_wishlist->fetch_assoc()){  $i++ ?>

										
							<tr>
                                <td><?= $i ?></td>
								<td><?= $result['productName']?></td>
								<td><img src="admin/uploads/<?= $result['image']?>" alt=""/></td>
								<td><?= number_format($result['price'],0,',','.') ?> VNĐ</td>
								<td><a href="?proid=<?= $result['productId'] ?>">Xoá</a> | | <a href="details.php?proid=<?= $result['productId'] ?>">Mua Ngay</a></td>
							</tr>
							
					<?php		
							}
								}
							?>
						
						</table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include "inc/footer.php"; ?>