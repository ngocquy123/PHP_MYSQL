<?php 
    $chuaXuLy = mysqli_num_rows($connect->query("select * from orders where status=1"));
    $dangXuLy = mysqli_num_rows($connect->query("select * from orders where status=2"));
    $daXuLy = mysqli_num_rows($connect->query("select * from orders where status=3"));
    $huy = mysqli_num_rows($connect->query("select * from orders where status=4"));
?>
<table class="table table-bordered">
    <tbody>
        <tr>
            <td width="15%" height="80px">Hello : <?= $_SESSION['admin']; ?><br>[ <a href="?option=logout">Logout</a> ]</td>
            <td><h2>Admin CONTROLPANEL</h2></td>
        </tr>
        <tr>
            <td>
                <div><a href="?option=brand">>>> Hãng Sản Xuất</a></div>
                <div><a href="?option=product">>>> Sản Phẩm</a></div>
                <div><a href="?option=order">>>> Đơn Hàng</a></div>
                <div><a href="?option=order&status=1">>>> Đơn Hàng Chưa Xử Lý [<?= $chuaXuLy ?>]</a></div>
                <div><a href="?option=order&status=2">>>> Đơn Hàng Đang Xử Lý [<?= $dangXuLy ?>]</a></div>
                <div><a href="?option=order&status=3">>>> Đơn Hàng Đã Xử Lý [<?= $daXuLy ?>]</a></div>
                <div><a href="?option=order&status=4">>>> Đơn Hàng Hủy [<?= $huy ?>]</a></div>
            </td>
            <td>
            <?php
                if(isset($_GET["option"])){
                    switch($_GET["option"]){
                        case 'logout':
                            unset($_SESSION['admin']);
                            header("location:.");
                        break;
                        case 'brand':
                            include "brands/showbrands.php";
                        break;
                        case 'brandadd':
                            include 'brands/brandadd.php';
                        break;
                        case 'brandupdate':
                            include "brands/brandupdate.php";
                        break;
                        case 'product':
                            include "products/showproducts.php";
                        break;
                        case 'productadd':
                            include 'products/productadd.php';
                        break;
                        case 'productupdate':
                            include 'products/productupdate.php';
                        break;
                        case 'order':
                            include "orders/showorders.php";
                        break;
                        case 'orderdetail':
                            include "orders/orderdetail.php";
                        break; 
                    }
                }
            ?>
            </td>
        </tr>
    </tbody>
</table>