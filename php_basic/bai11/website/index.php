<?php 
session_start();
?>
<?php
    $connect = new mysqli('localhost','root','','apt_c2010g');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 11 - Kết Nối Truy Vấn DATABASE</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header id="header">
       <?php include "view/layout/header.php"; ?>
    </header>
    <nav id="nav">
    <?php include "view/layout/menu-top.php"; ?> 
    </nav>
    <main id="main">
        <section id="left"> <?php include "view/layout/left.php"; ?></section>
        <section id="body"><?php include "view/layout/article.php"; ?></section>
        <section id="right"> <?php include "view/layout/right.php"; ?></section>
    </main>
    <footer id="footer">
        <?php include "view/layout/footer.php"; ?>
    </footer>
</body>
</html>