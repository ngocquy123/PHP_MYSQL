<?php 
class DB{
    private $host = "localhost";
    private $username = "phpoop";
    private $password = "123";
    private $dbname = "pdo_crud";
    protected function connect(){
        $conn = 'mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8';
        $pdo = new PDO($conn,$this->username,$this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
    }
}
?>