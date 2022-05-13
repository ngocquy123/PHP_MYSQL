<section>
        <h1>ĐĂNG NHẬP TRANG QUẢN TRỊ</h1>
        <h2><?= isset($alert)?$alert:''; ?></h2>
        <form action="" method="post">
            <div><label for="">User Name: </label><input type="text" name="username" id=""></div>
            <div><label for="">Password: </label><input type="password" name="password" id=""></div>
            <div><input type="submit" value="Đăng Nhập" name="sub"></div>
        </form>
</section>