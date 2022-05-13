<?php
                if(isset($_GET['option'])){
                    switch($_GET['option']){
                        case'home':
                            include "view/home.php";
                        break;
                        case 'signin':
                            include "view/signin.php";
                        break;
                        case 'logout':
                            unset($_SESSION['member']);
                            header("location:?option=home");
                        break;
                        case 'register':
                            include "view/register.php";
                        break;
                        case 'productdetail':
                            include "view/productdetail.php";    
                        break;
                        case'showproducts':
                            include 'view/showproducts.php';
                        break;
                        case 'cart':
                            include 'view/cart.php';
                        break;
                        case 'order':
                            include 'view/order.php';
                        break;
                        case 'ordersucces':
                            include 'view/ordersucces.php';
                        break;
                    }
                }else{
                    include "view/home.php";
                }
            ?>