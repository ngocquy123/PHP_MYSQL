<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/post.php'; ?>
<?php 
	$cat = new post(); 
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$delcat = $cat->del_category_post($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Tin Tức</h2>
                <div class="block">      
					<?= isset($delcat)?$delcat:''; ?>  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên Danh Mục</th>
							<th>Mô Tả</th>
                            <th>Trạng Thái</th>
							<th>Hành Động</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_cate = $cat->show_category_post();
							if($show_cate){
								$i=0;
								while($result = $show_cate->fetch_assoc()){ 
									$i++;
								?>
							<tr class="odd gradeX">
								<td><?= $i; ?></td>
								<td><?= $result['title'] ?></td>
								<td><?= $result['description'] ?></td>
								<td><?= $result['status']=1?'Hiển Thị':'Ẩn' ?></td>
								<td><a href="postedit.php?catid=<?= $result['id_cate_post']?>">Sửa</a> || <a href="?delid=<?= $result['id_cate_post']?>" onclick="return confirm('Bạn có muốn xóa danh mục !')">Xóa</a></td>
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

