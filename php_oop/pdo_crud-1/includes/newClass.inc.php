<?php
    class Taikhoan{
        public $public = "Truy cập dữ liệu ở bất cứ đâu";
        private $private = "Truy cập dữ liệu ở trong class";
        protected  $protected = "Truy cập dữ liệu ở trong class và class kế thừa";
        function lay_private(){
            return $this->private;
        }
        function lay_protected(){
            return $this->protected;
        }
    }
    class Khachhang extends Taikhoan{
        function lay_protected(){
            return $this->protected;
        }
    }
?>
