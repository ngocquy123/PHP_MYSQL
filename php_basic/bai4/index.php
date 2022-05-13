<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4 - Swith case</title>
</head>
<body>
<?php 
    $n = 7;
    if($n%2==0):
        echo "<br> Chẵn";
    else:
        echo "<br> Lẻ";
    endif;
    // switch-case 
?>
<?php
    if(isset($_POST["kyTu"])):
        $kyTu=$_POST["kyTu"];
        if(($kyTu>='A' && $kyTu <='Z') || ($kyTu>='a' && $kyTu<='z')):
            switch($kyTu){
                case'A':case'a':case'E':case'e':case'I':case'i':case'O':case'o':case'U':case'u':
                    echo "<br> $kyTu là nguyên âm";
                    break;
                    default:
                    echo "<br> $kyTu là phụ âm";
            }
            elseif($kyTu >='0' && $kyTu<='9'):
                echo "<br> $kyTu là chữ số (Ký tự số)";
            else:
                echo "<br> $kyTu Ký tự khác";
        endif;
    endif;
 ?>
<form action="" method="POST">
    <div>
        <label for="">Nhập vào một ký tự bất kỳ: </label>
        <input type="text" name="kyTu" maxlength="1">
    </div>
    <div>
        <input type="submit" value="Check">
    </div>
</form>
</body>
</html>