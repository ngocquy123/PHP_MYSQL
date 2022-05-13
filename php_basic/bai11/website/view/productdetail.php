<?php
    if(isset($_POST['content'])){
        $content = $_POST['content'];
        $productid=$_GET['id'];
        if(isset($_SESSION['member'])){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date("Y-m-d h:i:s");
            $memberid = mysqli_fetch_array($connect->query("select * from member where username='".$_SESSION['member']."'"));
            $memberid=$memberid['id'];
            $connect->query("insert comments(memberid,productid,date,content) values($memberid,$productid,'$date','$content')");
            echo "<script>alert('Bình Luận Của Bạn Sẽ Sớm Được Xuất Hiện...')</script>";
        }else{
            $_SESSION['content'] = $content;
            echo "<script>alert('Bạn cần đăng nhập để bình luận'); location='?option=signin&productid=$productid';</script>";
        }
    }
?>
<?php 
    $id = $_GET['id'];
    $query = "select * from products where id=$id";
    $result = $connect->query($query);
    $item = mysqli_fetch_array($result);
?>
<h1>Chi Tiết Sản Phẩm</h1>
<?php foreach($result as $item){ ?>
        <div class="product" >
            <div class="img" >
                <img src="images/<?= $item['image'] ?>" alt="">
            </div>
            <div class="name"><?= $item['name']; ?></div>
            <div class="price"><?= number_format($item['price'],0,',','.'); ?>đ</div>
            <div> <button>Đặt Mua</button> </div>
            <div> <?= $item['description'];?> </div>
        </div>
    <?php    } ?>
<hr>
<section>
    <h2>Bình Luân </h2>
    <?php
        $query = "select * from member a join comments b on a.id=b.memberid join products c on b.productid=c.id where b.status and productid=".$_GET['id'];
        $comments=$connect->query($query);
        if(mysqli_num_rows($comments)==0){
            echo "<div> Sản Phẩm Chưa Có Bình Luận Nào !</div>";
        }else{
            foreach($comments as $comment){ ?>
            <section style="color:orange;font-weight:bold;"><?= $comment['username']; ?></section>
            <div><?= $comment['content'] ?></div>
  <?php             
        }
        }
    ?>
    <form method="post">
        <div><textarea name="content"  width="100%" rows="5" placeholder="Viết Bình Luận...."></textarea></div>
        <div><input type="submit" value="Gửi"></div>
    </form>
</section>