<?php 
        $query = "select * from products where status=1";
        $option='home';
    if(isset($_GET['brandid'])){
        $query ="select * from products where status=1 ";
        $query .=  "and brandid =".$_GET['brandid'];
        $option = 'showproducts&branid='.$_GET['brandid'];
    }
    elseif(isset($_GET['keyword'])){
        $query = "select * from products where status=1 and name like'%".$_GET['keyword']."%'";
        $option = 'showproducts&keyword='.$_GET['keyword'];
    }elseif(isset($_GET['range'])){
        $query ="select * from products where status=1 ";
        $query .= "and price <=".$_GET['range'];
        $option = 'showproducts&range='.$_GET['range'];
    }
    $page=1;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    $productsperpage =3;
    $from = ($page-1)*$productsperpage;
    $totalProduct=$connect->query($query);
    $totalPages=ceil(mysqli_num_rows($totalProduct)/$productsperpage);

    $query .= " limit $from,$productsperpage";
    $result = $connect->query($query);
?>
<?php foreach($result as $item){ ?>
        <div class="product" >
            <div class="img" >
               <a href="?option=productdetail&id=<?= $item['id']; ?>"> <img src="images/<?= $item['image'] ?>" alt=""></a>
            </div>
            <div class="name"><?= $item['name']; ?></div>
            <div class="price"><?= number_format($item['price'],0,',','.'); ?>đ</div>
            <div> <button onclick="location='?option=cart&action=add&id=<?= $item['id'] ?>';">Đặt Mua</button> </div>
            <div> <?= $item['description'];?> </div>
        </div>
    <?php    } ?>

    <div class="pages">
    <?php  for($i=1;$i<=$totalPages;$i++){?>
            <a class="<?= empty($_GET['option'])&&$i==1 || (isset($_GET['page'])&& $_GET['page']==$i)?'colorpage':'';?>" href="?option=<?=$option?>&page=<?= $i?>"> <?= $i;?> </a>
    <?php   } ?>
    
    </div>
 