<?php
// view
class UserView extends Usermodel{
    public function showUser($name){
        $results = $this->GetUserStmt($name);
        // echo "<pre>";
        // print_r($results);
        // echo "</pre>";
        // echo "Tên User của bạn là :".$results[0]['user_name']."<br>";
        // echo "Địa Chỉ của bạn là :".$results[0]['user_address']."<br>";
        // echo "Điện Thoại của bạn là :".$results[0]['user_phone']."<br>";
        // echo "Ghi Chú của bạn là :".$results[0]['user_note']."<br>";
    }
}
?>