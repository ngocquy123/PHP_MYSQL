<?php
    class Test extends DB{
        public function getUsers(){
            $sql = "select * from tbl_users";
            $stmt = $this->connect()->query($sql);

            while($row=$stmt->fetch()){
                echo $row['user_name'].'<br>';
                echo $row['user_address'].'<br>';
                echo $row['user_phone'].'<br>';
                echo $row['user_note'].'<br>';
            }
        }
        public function getUserStmt($name,$phone){
            $sql = "select * from tbl_users where user_name = ? AND user_phone = ?";
            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$name,$phone]);
            $username = $stmt->fetchAll();

            foreach($username as $name){
                echo $name['user_name'].'<br>';
            }
        }
        public function insert($user_name,$user_phone,$user_address,$user_note){
            $sql = "insert into tbl_users(user_name,user_phone,user_address,user_note) 
            values(?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$user_name,$user_phone,$user_address,$user_note]);
        }
        public function delete(){}
    }
?>