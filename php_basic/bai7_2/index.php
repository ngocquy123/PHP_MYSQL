<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hàm</title>
</head>
<body>
<?php
    if(isset($_POST['number1'])){
        nhaplieu();
        showData();
        tinhTong();
        tinhHieu();
        tinhTich();
        tinhThuong();
        $uscln = USCLN(); 
        if($uscln!=null){
            echo "<br> USCLN của $number1 và $number2 là $uscln";
            BSCNN($uscln);
        }else{
            echo "<br> Không Tìm Được USCLN";
        }
    }
    function nhapLieu(){
        global $number1;
        global $number2;
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
    }
    function showData(){
        global $number1;
        global $number2;
        echo "<br> $number1 ; $number2" ;
    }
    function tinhTong(){
        global $number1;
        global $number2;
        echo "<br> $number1 + $number2 =".($number1 + $number2) ;
    }
    function tinhHieu(){
        global $number1;
        global $number2;
        echo "<br> $number1 - $number2 =".($number1 - $number2) ;
    }
    function tinhTich(){
        global $number1;
        global $number2;
        echo "<br> $number1 * $number2 =".($number1 * $number2) ;
    }
    function tinhThuong(){
        global $number1;
        global $number2;
        if($number2 !=0){
            echo "<br> $number1 / $number2 =".($number1 / $number2);
        }else{
            echo "<br> $number1 / $number2 = 0" ;
        }
    }
    function USCLN(){
        global $number1;
        global $number2;
        if($number1>0 && $number2>0){
            for($i=$number1>$number2?$number2:$number1;$i>=1;$i--){
                if($number1%$i==0 && $number2%$i==0){
                    return $i;
                }
            }
        return null;
        }
    }
    function BSCNN($uscln){
        global $number1;
        global $number2;
        echo "<br> Bội số chung nhỏ nhất của $number1 và $number2 là".($number1*$number2/$uscln);
    }
?>
<form action="" method="POST">
    <div>
        <label for="">Number 1:</label><input type="number" name="number1" required>
    </div>
    <div>
        <label for="">Number 2:</label><input type="number" name="number2" required>
    </div>
    <div>
        <input type="submit"  name="submit">
    </div>
</form>
</body>
</html>