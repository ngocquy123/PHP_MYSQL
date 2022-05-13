<?php

use Taikhoan as GlobalTaikhoan;

    class Taikhoan{
        public $ten;
        public $ho;
       
        public function __construct($ten,$ho){
            $this->ten=$ten;
            $this->ho=$ho;
        }
        public function __destruct(){
            echo "Lớp tài khoản đã tự động hủy";
        }

    }
    class Khachhang extends Taikhoan{

    }
?>
