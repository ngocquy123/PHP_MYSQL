<?php
    class Giohang{
    //static trong php
    protected static $ten;
    public static function set_ten($ten){
        self::$ten = $ten;
    }
    public static function get_ten(){
        return self::$ten;
    }
    public static function all($ten){
        self::set_ten($ten);
        return self::get_ten();
    }

    }
    
?>
