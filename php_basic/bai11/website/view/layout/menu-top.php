<div class="nav">
            <ul>
                <li class="items"> <a href="?option=home">Home</a></li>
                <li class="items"> <a href="?option=news">News</a></li>
                <li class="items"> <a href="?option=feedback">FeedBack</a></li>
                <li class="items"> <a href="?option=cart">Cart</a></li>
                <?php   if(empty($_SESSION['member'])){?>
                <li class="items"> <a href="?option=signin">Signin</a></li>
                <li class="items"> <a href="?option=register">Register</a></li>
                <?php }else{?>
                    <span> Xin Chào : <?= $_SESSION['member'] ?></span> |  <a href="?option=logout">Đăng Xuất</a>
                <?php } ?>
            </ul>
        </div>