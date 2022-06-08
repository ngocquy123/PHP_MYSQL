<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'; ?>
<?php
	$pd = new product();
	$fm = new format();
	if(isset($_GET['productid'])){
		$id = $_GET['productid'];
		$delProduct = $pd->del_product($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="block">
			<?= isset($delProduct)?'<span>Đã Xóa Sản Phẩm</span>':''; ?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên Sản Phẩm</th>
					<th>Giá</th>
					<th>Danh Mục</th>
					<th>Thương Hiệu</th>
					<th>Image</th>
					<th>Mô Tả</th>
					<th>Kiểu</th>
					<th>Hành Động</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$pd = new product();
					$fm = new Format();
					$pdlist = $pd->show_product();
					if($pdlist){
						$i =0;
						while($result = $pdlist->fetch_assoc()){ $i++;?>
							
					<tr class="odd gradeX">
						<td><?= $i;?></td>
						<td><?= $result['productName']; ?></td>
						<td><?= number_format($result['price'],0,',','.') ?> <span>đ</span></td>
						<td><?= $result['catName']; ?></td>
						<td><?= $result['brandName']; ?></td>
						<td style="width:10%;"><img src="uploads/<?= $result['image'];?>" alt="" style="width:80%" ></td>
						<td><?= $fm->textShorten($result['product_desc'],30); ?></td>
						<td><?= $result['type']==0?'Đang Bán':'Mới' ?></td>
						<td><a href="productedit.php?productid=<?=$result['productId'] ?>">Sửa</a> || <a href="productlist.php?productid=<?=$result['productId'] ?>">Xóa</a></td>
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
