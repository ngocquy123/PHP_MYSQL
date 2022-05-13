<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 10 - Hàm Function</title>
</head>
<body>
<?php
demo();
echo "<br>";
tinhTong(50,10);
echo "<br>";
tinhTongDac(10,20,4);
echo "<br>";
echo "Con So Tinh Dac : ".tinhTongDac(10,20,4);
echo "<br>";
echo "<br>";
var_dump(tinhTongDac(10,20,4));
echo "<br>";
echo "<br>";
tinhHieu(10,2);
echo "<br>";
echo "<br>";
tinhHieu(10);
    function demo(){
        echo "<br> The First function";
    }
    function tinhTong($a,$b){
        echo "<br> $a + $b =".($a+$b);
    }
    function tinhTongDac($a,$b,$c){
        $d = $b*$b - 4*$a+$c;
        return $d;
    }
    function tinhHieu($a,$b=0){
        echo "<br> $a - $b =".$a+$b; 
    }
?>
</body>
</html>