<?php
    class Taikhoan{
        public $ten;
        private $ho;
        public function lay_ho($ho){
            $this->ho = $ho;
        }
        public function lay_ho_2(){
            return $this->ho;
        }
    }
?>
