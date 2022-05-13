<?php
    class Nguoidung{
    //static trong php
    protected static $ten;
    public static function set_ten($ten){
        Nguoidung::$ten = $ten;
    }
    public static function get_ten(){
        return Nguoidung::$ten;
    }
    public static function all($ten){
        self::set_ten($ten);
        return self::get_ten();
    }

    }
    
?>
