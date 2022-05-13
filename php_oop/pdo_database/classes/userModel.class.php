<?php
//model

class Usermodel extends DB{
    protected function GetUserStmt($name){
        $sql = "select * from tbl_users where user_name = ?";
        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$name]);
        $result = $stmt->fetchAll();
        return $result;
    }
    public function insertUser($user_name,$user_phone,$user_address,$user_note){
        $sql = "insert into tbl_users(user_name,user_phone,user_address,user_note) 
        values(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_name,$user_phone,$user_address,$user_note]);
    }
}
?>