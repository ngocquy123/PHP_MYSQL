<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../classes/customer.php');
    include_once($filepath.'/../helper/format.php');
?>
<?php
    $cs = new customer();
    	if(!isset($_GET['customerid']) || $_GET['customerid'] == null){
           echo "<script>window.location='inbox.php';</script>";
        }else{
            $id = $_GET['customerid'];
        }
       
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục</h2>
               <div class="block copyblock"> 
               <?php 
                     $get_customer = $cs->show_customer($id);
                     if($get_customer){
                        while($result = $get_customer->fetch_assoc()){ ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>Tên</td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" class="medium" value="<?= $result['name']?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Thành Phố</td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" class="medium" value="<?= $result['city']?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Địa Chỉ</td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" class="medium" value="<?= $result['address']?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" class="medium" value="<?= $result['zipcode']?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Điện Thoại</td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" class="medium" value="<?= $result['phone']?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" readonly="readonly" name="catName" class="medium" value="<?= $result['email']?>" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php 
                          }
                    }
                    ?>

                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>