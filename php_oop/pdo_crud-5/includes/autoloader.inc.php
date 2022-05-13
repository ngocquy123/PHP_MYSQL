<?php
    spl_autoload_register('loader');
    function loader($className){
        $path = "classes/";
        $extension = ".class.php";
        $fullpath = $path.$className.$extension;
        //Giohang.class.php
        include_once $fullpath;
    }
?>