<?php
    if(empty($_SESSION['cart'])){
        $_SESSION['cart']=array();
    }
    if(isset($_GET['action'])){
        $id=isset($_GET['id'])?$_GET['id']:'';
        switch($_GET['action']){
            case 'add':
                if(array_key_exists($id,array_keys($_SESSION['cart']))){
                    $_SESSION['cart'][$id]++;
                }else{
                    $_SESSION['cart'][$id]=1;
                }
                header("location:?option=cart");
            break;
            case 'delete':
                unset($_SESSION['cart'][$id]);
            break;
            case 'deleteall':
                unset($_SESSION['cart']);
            break;
            case 'update':
                if($_GET['type']=='asc'){
                    $_SESSION['cart'][$id]++;
                }else{
                    if($_SESSION['cart'][$id]>1){
                        $_SESSION['cart'][$id]--;
                    }
                }
                header("location:?option=cart");
            break;
            case 'order':
                if(isset($_SESSION['member'])){
                    header("location:?option=order");
                }else{
                    header("location:?option=signin&order=1");
                }
            break;
        }
    }
?>
<div class="cart">
    <?php
    if(!empty($_SESSION['cart'])){
        // $ids ="0";
        // foreach(array_keys($_SESSION['cart']) as $key)
        // $ids .= ",".$key;
        $ids = implode(',',array_keys($_SESSION['cart']));
        $query="select * from products where id in($ids)";
        $result = $connect->query($query);
    ?>
    <table border="1" width="100%" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <td>Images</td>
                <td>Name</td>
                <td>Price (đ)</td>
                <td>Number</td>
                <td>subTotal</td>
            </tr>
        </thead>
        <tbody>
    <?php
    $toTal=0;
        foreach($result as $item){ ?>
            <tr>
                <td width="10%"><img src="images/<?= $item['image'] ?>" width="100%" alt=""></td>
                <td><?= $item['name']; ?><br><input type="button" value="Delete" onclick="location='?option=cart&action=delete&id=<?= $item['id'] ?>';"> </td>
                <td><?= number_format( $item['price'],0,',','.')?> đ</td>
                <td>
                <input type="button" value="-" onclick="location='?option=cart&action=update&type=desc&id=<?= $item['id']?>'">
                <?= $_SESSION['cart'][$item['id']]; ?>
                <input type="button" value="+" onclick="location='?option=cart&action=update&type=asc&id=<?= $item['id']?>'"></td>
                <td><?= number_format($subTotal=$item['price']*$_SESSION['cart'][$item['id']],0,',','.')?></td>
            </tr>
            <?php $toTal = $subTotal; ?>
            
<?php    }?>
            <tr>
                <td colspan="3">Tổng Tiền :<?= number_format($toTal,0,',','.')?> (vnđ)</td>
                <td><input type="button" value="Delete Cart" onclick="if(confirm('Bạn Có Muốn Xóa Tất Cả Giỏ Hàng ?')) location='?option=cart&action=deleteall';"></td>
                <td><input type="button" value="Đặt Hàng" onclick="location='?option=cart&action=order'"></td>
            </tr>
        </tbody>
    </table>
<?php  }else{ ?>
    <div>Bạn Chưa Chọn Sản Phẩm Nào </div>
<?php } ?>
</div>