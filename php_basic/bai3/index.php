<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 7 - điều kiện</title>
</head>
<body>
<?php
if(isset($_POST['a'])){
    $a = (double)$_POST['a'];
    $b = (double)$_POST['b'];
    $c = (double)$_POST['c'];
    $Tamgiac = 0;
    if($a+$b>$c && $b+$c>$a && $c+$a>$b){
        $Tamgiac = 1;
        echo "<br> $a , $b , $c là 3 cạnh của 1 tam giác";
    }else{
        echo "<br>  $a , $b , $c Không là ba cạnh của 1 tam giác";
    }
    // 3
    $can=0;
    if($Tamgiac ==1 && ($a==$b || $b == $c || $c == $a)){
        $can=1;
        echo "<br> $a , $b , $c là 3 cạnh của 1 tam giác cân";
    }else{
        echo "<br> $a , $b , $c Không là 3 cạnh của 1 tam giác cân";
    }
    if($Tamgiac==1 && ($a==$b && $b==$c)){
        echo "<br> $a , $b , $c là 3 cạnh của 1 tam giác điều";
    }else{
        echo "<br> $a , $b , $c không là 3 cạnh của 1 tam giác điều";
    }
    // 5
    $A=$a*$a;
    $B=$b*$b;
    $C=$c*$c;
    $vuong=0;
    if($Tamgiac==1 && ($A=$B+$C || $B=$A+$C || $C=$A+$B)){
        $vuong=1;
        echo "<br> $a , $b , $c là 3 cạnh của 1 tam giác vuông";
    }else{
        echo "<br> $a , $b , $c lkhông à 3 cạnh của 1 tam giác vuông";
    }
    if($can==1 && $vuong==1){
        echo "<br> $a , $b , $c là 3 cạnh của 1 tam giác vuông cân";
    }else{
        echo "<br> $a , $b , $c không là 3 cạnh của 1 tam giác vuông cân";
    }
}

?>
    <form action="#" method="POST">
        <div>
            <label for="">Nhập a: </label><input type="number" name="a" step="0.000001" required>
        </div>
        <div>
            <label for="">Nhập b: </label><input type="number" name="b" step="0.000001" required>
        </div>
        <div>
            <label for="">Nhập c: </label><input type="number" name="c" step="0.000001" required>
        </div>
        <div>
            <input type="submit" value="Check">
        </div>
    </form>
</body>
</html>