<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'; ?>
<?php
	$product = new product();
	if(isset($_GET['type_slider']) && isset($_GET['type'])){
		$id = $_GET['type_slider'];
		$type = $_GET['type'];
		$update_type_slider = $product->update_type_slider($id,$type);
	}
	if(isset($_GET['del_slider'])){
		$id = $_GET['del_slider'];
		$del_slider = $product->del_slider($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Slider</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tiêu Đề</th>
					<th>Hình Ảnh</th>
					<th>Trạng Thái</th>
					<th>Hành Động</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$product = new product();
					$get_slider = $product->show_slider_admin();
					if($get_slider){
						$i=0;
						while($result = $get_slider->fetch_assoc()){ $i++; ?>
					<tr class="odd gradeX">
						<td><?=  $i?></td>
						<td><?= $result['sliderName'] ?></td>
						<td><img src="uploads/<?= $result['sliderImage'] ?>" width="140px"/></td>
						<td>
							<?php 
								if($result['type'] == 1){ ?>
								<a href="?type_slider=<?= $result['sliderId']?>&type=0">Tắt</a>
						<?php	}else{ ?>
							<a href="?type_slider=<?= $result['sliderId']?>&type=1">Bật</a>
							<?php }?>
						</td>				
						<td>
							
							<a href="?del_slider=<?= $result['sliderId'] ?>" onclick="return confirm('Bạn muốn xóa chứ !');" >Delete</a> 
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
