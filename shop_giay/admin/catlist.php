<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'; ?>
<?php 
	$cat = new category(); 
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$delcat = $cat->del_category($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Danh Mục</h2>
                <div class="block">      
					<?= isset($delcat)?$delcat:''; ?>  
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
							$show_cate = $cat->show_category();
							if($show_cate){
								$i=0;
								while($result = $show_cate->fetch_assoc()){ 
									$i++;
								?>
							<tr class="odd gradeX">
								<td><?= $i; ?></td>
								<td><?= $result['catName'] ?></td>
								<td><a href="catedit.php?catid=<?= $result['catId']?>">Sửa</a> || <a href="?delid=<?= $result['catId']?>" onclick="return confirm('Bạn có muốn xóa danh mục !')">Xóa</a></td>
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

