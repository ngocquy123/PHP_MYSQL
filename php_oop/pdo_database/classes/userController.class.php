<?php
// controller
class UserController extends Usermodel{
    public function setUser($user_name,$user_phone,$user_address,$user_note){
        $this->insertUser($user_name,$user_phone,$user_address,$user_note);
    }
}
?>