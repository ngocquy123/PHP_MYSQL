<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'; ?>
<?php 
	$brand = new brand(); 
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$delbrand = $brand->del_brand($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Thương Hiệu</h2>
                <div class="block">      
					<?= isset($delbrand)?$delbrand:''; ?>  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên Danh Mục</th>
							<th>Hành Động</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_brand = $brand->show_brand();
							if($show_brand){
								$i=0;
								while($result = $show_brand->fetch_assoc()){ 
									$i++;
								?>
							<tr class="odd gradeX">
								<td><?= $i; ?></td>
								<td><?= $result['brandName'] ?></td>
								<td><a href="brandedit.php?brandid=<?= $result['brandId']?>">Sửa</a> || <a href="?delid=<?= $result['brandId']?>" onclick="return confirm('Bạn có muốn xóa danh mục !')">Xóa</a></td>
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

