<?php
    include_once('includes/newClass.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $doituong = new Taikhoan();
        $doituong->lay_ho('Nguyễn');
        echo "Lay Ho 2 :".$doituong->lay_ho_2();
    ?>
</body>
</html>