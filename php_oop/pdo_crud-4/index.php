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
    //     $nguoidung = new Nguoidung();
    //    // $nguoidung->set_ten("Quý");
    //     echo "---->".$nguoidung->get_ten()."<br>";

    //     $nguoidung = new Nguoidung();
    //     echo $nguoidung->get_ten();
    echo Nguoidung::all("Ngoc Quy");

       
    ?>
</body>
</html>