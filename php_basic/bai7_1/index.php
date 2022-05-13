<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 7 - Mảng 2 Chiều</title>
</head>
<body>
<?php
$courses = array(
                "web"=>array("HTML5","CSS3","JavaScript","JQuery","PHP"),
                "app"=>array("IOS","Android","Flutter"));
    echo $courses["web"][1];
    echo "<br>";
    foreach($courses as $key => $value){
        foreach($value as $k=>$v){
            echo "<br> $key => $k => $v";
        }
    }
    echo "<br> <br>";
    $courses1["congty"] = array("SanPham","tencongty","loai");
    $courses1["sp"] = array("sosanpham","id","tensp");
    echo "<br> <br>";
    $courses2["congty"][0] = "SanPham";
    $courses2["congty"][1] = "tencongty";
    $courses2["congty"][2] = "loai";
    echo "<br> <br>";
    $courses3["web"][] = "HTML5";
    $courses3["web"][] = "CSS3";
    $courses3["web"][] = "JS";
    $courses3["web"][] = "PHP";
    echo "<br> <br>";
    foreach($courses3 as $key =>$value){
        foreach($value as $k => $v){
            echo "<br>$key : $k => $v";
        }
    }
?>
</body>
</html>