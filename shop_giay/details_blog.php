<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>
<?php
	 if(!isset($_GET['blogid']) || $_GET['blogid'] == null){
		echo "<script>window.location='404.php';</script>";
	 }else{
		 $id = $_GET['blogid'];
	 }

	//  if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// 	 $catName = $_POST['catName'];
	// 	 $updateCat = $cat->update_category($catName,$id);
	//  }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
			<?php 
				$name_cat = $posttt->getpostbyid($id);
				if($name_cat){
					$result_1 = $name_cat->fetch_assoc(); ?>
    			<h3 class="details__blogs-title"><?= $result_1['title_blog'] ?></h3>
		
    		</div>
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
		<?php 
			$postbycat = $posttt->get_name_by_cat($id);
			if($postbycat){
				while($result = $postbycat->fetch_assoc()){ ?>
                    <p class="details__blogs-description"><?=$result['description']; ?></p>
                    <p class="details__blogs-content"><?= $result['content']?></p>
		<?php	}
			} ?>
        <?php }?>
		</div>

	
	
    </div>
 </div>
</div>
<?php include "inc/footer.php"; ?>