<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mảng Một Chiều</title>
</head>
<body>
<?php
$course[] = "HTML5";
$course[] = "CSS3";
$course[] = "Javascript";
echo "<br>".$course[0];
$course[10] = "Jquery";
$course["bs"] = "Bootstrap";

echo "<br>" .$course['bs'];
$course[] = "MySQL";

echo "<br>".$course[11];

echo "<br> ===============";
$type = array("Lập trình web","Lập trình app mobile","Lập trình react native");
echo "<br>".$type[0];

$type = array("web"=>"Lập trình Desktop",15=>"Lập trình app mobile","Lập trình react native");
echo "<br>".$type["web"];
echo "<br> <br> <br>";
foreach($course as $key=>$value){
    echo "<br>$key : $value";
}
echo "<br> ===============";
echo "<br> ===============";

foreach(array_keys($course) as $key){
    echo "<br> $key";
}
echo "<br> ===============";
echo "<br> ===============";
echo "<br>".array_key_exists("bs",$course);
?>
</body>
</html>