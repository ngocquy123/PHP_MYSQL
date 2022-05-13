<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 9 - Các hàm sắp xếp mảng</title>
</head>
<body>
<?php
    $subjects = array("a"=>1,"c"=>10,"b"=>3,"e"=>15,"d"=>20);
    sort($subjects);
    var_dump($subjects);
    foreach($subjects as $key => $value){
        echo "<br> $key => $value";
    }
?>
</body>
</html>