<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5 - Vòng Lặp</title>
</head>
<body>
<?php
$count = 1;
// while
while($count <=10){
    echo "<br> <span style='color:gray'>$count</span>";
    $count++;
}
$count=20;
// do while
do{
    echo "<br> <span style='color:yellow'>$count</span>";
    $count--;
}while($count>=1);
//for
for($count=1; $count <=50; $count++){
    if($count%7==0){
        echo "<br> <span style='color:blue'>$count</span>";
    }
}
?>
</body>
</html>