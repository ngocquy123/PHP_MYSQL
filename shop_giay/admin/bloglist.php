<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/post.php'; ?>
<?php include '../classes/blog.php'; ?>
<?php
	$blog = new blog();
	if(isset($_GET['blogid'])){
		$id = $_GET['blogid'];
		$delBlog = $blog->del_blog($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="block">
			<?= isset($delBlog)?'<span>Đã Xóa Sản Phẩm</span>':''; ?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tiêu đề</th>
					<th>Mô tả</th>
					<th>Image</th>
					<th>Danh Mục</th>
					<th>Trạng Thái</th>
					<th>Hành Động</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$blog = new blog();
					$bloglist = $blog->show_blog();
					if($bloglist){
						$i=0;
						while($result = $bloglist->fetch_assoc()){ $i++;?>
							
					<tr class="odd gradeX">
						<td><?= $i;?></td>
						<td><?= $result['title_blog']; ?></td>
						<td><?= $result['description']; ?></td>
						<td style="width:10%;"><img src="uploads/<?= $result['image'];?>" alt="" style="width:80%" ></td>
						<td><?=$result['title'] ?></td>
						<td><?= $result['status']==0?'Ẩn':'Hiển Thị' ?></td>
						<td><a href="blogedit.php?blogid=<?=$result['id'] ?>">Sửa</a> || <a href="bloglist.php?blogid=<?=$result['id'] ?>">Xóa</a></td>
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
