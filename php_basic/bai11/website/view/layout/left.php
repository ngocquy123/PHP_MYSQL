<?php
    $query = "select * from brands where status";
    $result = $connect->query($query);
?>
<?php 
    foreach($result as $item){ ?>
    <div><a href="?option=showproducts&brandid=<?= $item['id']; ?>"><?= $item['name']; ?></a></div>
<?php  }?>