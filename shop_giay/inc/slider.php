     <!-- Section Slider -->
     <section id="slider">
        <div class="slider row">
            <div class="slider__left">
                <ul class="menu__bottom">
                    <?php
                       $menu = $cat->menu_cat();
                       while($result =  $menu->fetch_assoc()){ ?>
                        <li class="list__item"><a href="productbycat.php?catid=<?= $result['catId'] ?>" class="list__link"><?= $result['catName'] ?></a>
                        <?php
                            $menusub = $cat->menu_cat_brand($result['catId']);
                           if($menusub){ ?>
                            <div class="menu__child">
                                <div class="menu__child-item">
                                    <ul class="menu__child-in">
                        <?php    foreach($menusub as $value){ ?>
                                    <li class="list__item-child">
                                        <a href="productbybrand.php?brandid=<?= $value['brandId'] ?>" class="list__link-child"><?= $value['brandName'] ?></a>
                                    </li>          
                        <?php    } ?>
                                    </ul>
                                </div>
                            </div>
                    <?php   }
                        ?>
            <?php   }
                    ?>
                    <!-- <li class="list__item"><a href="" class="list__link">Điện thoại</a>
                        <div class="menu__child">
                            <div class="menu__child-item">
                                <ul class="menu__child-in">
                                    <li class="list__item-child">
                                        <a href="" class="list__link-child">Apple</a>
                                    </li>
                                    <li class="list__item-child">
                                        <a href="" class="list__link-child">Apple</a>
                                    </li>
                                    <li class="list__item-child">
                                        <a href="" class="list__link-child">Apple</a>
                                    </li>
                                    <li class="list__item-child">
                                        <a href="" class="list__link-child">Apple</a>
                                    </li>
                                </ul>
                            </div>
                           
                        </div>
                    </li> -->
                    <li class="list__item"><a class="list__link">Tin Tức</a>
                        <div class="menu__child">
                                <div class="menu__child-item">
                                    <ul class="menu__child-in">
                                        <?php
                                            $post = $posttt->show_category_post();
                                            if($post){
                                                while($result = $post->fetch_assoc()){ ?>
                                                    <li class="list__item-child">
                                                        <a href="categorypost.php?postid=<?= $result['id_cate_post'] ?>" class="list__link-child"><?= $result['title'] ?></a>
                                                    </li>
                                        <?php	}
                                            }
                                        ?>
                                    </ul>
                                </div>
                        </div>
                    </li>  
                    <?php 
                        $customer_id = Session::get('customer_id');
                        $check_order = $ct->check_order($customer_id);
                        if($check_order){
                            echo '  <li class="list__item"><a href="orderdetails.php" class="list__link">Đơn Hàng Đã Đặt</a>
                            </li> ';
                        }else{
                            echo "";
                        }
                    ?>
                     <?php
                            $login_check = Session::get('customer_login');
                            if($login_check){ ?>
                                     <li class="list__item"><a href="compare.php" class="list__link">So Sánh Sản Phẩm</a></li>
                                     <li class="list__item"><a href="wishlist.php" class="list__link">Sản Phẩm Yêu Thích</a></li>
                    <?php	}else{ 
                                echo "";
                            } ?>
                </ul>
            </div>
            <div class="slider__right">
                <div class="images">
                    <img src="images/Homepage-_936x376px_LaptopHP.png" alt="" class="chuyenslider">
                    <img src="images/Homepage_936x376px_Iphone11.png" alt="">
                    <img src="images/Homepage-_936x376px_LaptopHP.png" alt="">
                </div>
                <div class="btm-sliders">
                    <span class="kichhoat"></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </section>
    <!-- end Section Slider -->