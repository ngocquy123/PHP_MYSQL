<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai tập 1 - điều kiện</title>
</head>
<body>
    <section>
        <form method="post">
            <section>
                <label for="">Nhập 1 số bất kỳ : </label><input type="number" name="number" step="0.0000001" required>
            </section>
            <section>
                <input type="submit" value="Check">
            </section>
        </form>
    </section>
<?php 
    $n = $_POST["number"];
    if($n == (int)$n){
        if($n%2==0){
            echo "<br> $n là số chẵn";
        }else{
            echo "<br> $n không phải là số lẻ";
        }
    }else{
        echo "<br> $n không có tính chẵn lẻ";
    }
    
?>
</body>
</html>