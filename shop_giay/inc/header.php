<?php
    include "lib/session.php";
    Session::init();
?>
<?php 
	include_once "lib/database.php";
	include_once "helper/format.php";

	spl_autoload_register(function($className){
		include_once "classes/".$className.".php";
	});
	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cat = new category();
	$cs = new customer();
	$product = new product();
	$posttt = new	post();
	
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Project Ngoc Quy</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style1.css" rel="stylesheet" >
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
   <!-- Menu Top -->
   <header id="menutop">
        <div class="menutop row">
            <div class="menutop__logo"><a href="index.php"><img src="images/Logo_NK.svg" alt=""></a></div>
            <div class="menutop__center">
                <div class="menutop__center-search">
                    <form action="search.php" method="post">
				    	<input type="text"class="menutop__search-input"   name="tukhoa"  placeholder="B???n c???n t??m g?? h??m nay ?" >
						<input type="submit" class="menutop__search-submit" name="seach_product" value="T??m Ki???m">
				    </form>
                </div>
            </div>
            <div class="menutop__left">
                <div class="menutop__left-all menutop__left-cart">
                    <a href="cart.php">Gi??? h??ng: 
                        <?php 
                            $check_cart = $ct->check_cart();
                            if($check_cart){
                                $sum=Session::get("sum");
                                $qty=Session::get("qty");
                                echo $sum.' '.'??'.' '.$qty;
                            }else{
                                echo "0";
                            }
                        ?>
                    </a>
                </div>
                <div class="menutop__left-all menutop__left-account">
                    <?php 
                        if(isset($_GET['customer_id'])){
                            $customer_id = $_GET['customer_id'];
                            $delCart = $ct->del_all_data_cart();
                            $delCompare = $ct->del_compare($customer_id);
                            Session::destroy();
                        } 
                    ?>
                    <?php
                        $login_check = Session::get('customer_login');
                        if($login_check == false) { ?>
                            <a href="login.php">????ng nh???p</a>
                    <?php }else{ ?>
                        <a href="?customer_id=<?= Session::get('customer_id')?>">????ng Xu???t</a>
                    <?php	}
                    ?>
                </div>
                <div class="menutop__left-all menutop__left-hotline">
                    <p>Hotline: 1800 68000(Mi???n ph??)</p>
                    <p>mua h??ng - g??p ?? - b???o h??nh</p>
                </div>
            </div>
        </div>
        
    </header>
       <!-- End Menu Top -->
       <!-- Menu Main -->
    <section id="menu__main">
        <div class="menu__main row">
            <div class="menu__main-item">
                <p>Danh m???c s???n ph???m</p>
            </div>
            <div class="menu__main-item menu__main-item1">
                <p>Mi???n ph?? giao l???p</p>
            </div>
            <div class="menu__main-item menu__main-item1">
                <p>C???m nang khuy???n m??i</p>
            </div>
            <div class="menu__main-item menu__main-item1">
                <p>H?????ng d???n mua h??ng online</p>
            </div>
            <div class="menu__main-item menu__main-item1">
                <p>Th????ng hi???u n???i b???t</p>
            </div>
        </div>
    </section>
      <!-- End Menu Main -->
