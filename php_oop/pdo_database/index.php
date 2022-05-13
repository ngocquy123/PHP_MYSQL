<?php
    include_once('includes/autoloader.inc.php');
?>
<?php
if(isset($_POST['submit_them'])){
    $ten = $_POST['ten'];
    $phone = $_POST['phone'];
    $note = $_POST['note'];
    $address = $_POST['address'];
    $doituong_c = new UserController();
    $doituong_c->setUser($ten,$phone,$address,$note);
}
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
        $doituong = new UserView();
        $doituong->showUser('quy');

        $doituong_c = new UserController();

        
    ?>

    <form action="" method="post">
        <div> <input type="text" name="ten" id=""></div>
        <div> <input type="text" name="phone" id=""></div>
        <div> <input type="text" name="note" id=""></div>
        <div> <input type="text" name="address" id=""></div>
        <div> <input type="submit" name="submit_them" value="Thêm"></div>
    </form>
</body>
</html>