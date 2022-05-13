<?php
// interface Phuongthucthanhtoan{
//     public function tratien();
// }
// interface DangnhapThanhtoan{
//     public function thanhtoanonline();
//     public function dangnhap();
// }
//     class Paypal implements Phuongthucthanhtoan,DangnhapThanhtoan{
//         public function dangnhap(){
//             echo "Đã Đăng Nhập Paypal <br>";
//         }
//         public function tratien(){
//             echo "Đã trả tiền bằng: Paypal";
//         }
//         public function thanhtoanonline()
//         {
//             echo "Đã thanh toán online <br>";
//         }
//         public function hinhthuc_chung(){
//             $this->thanhtoanonline();
//             $this->dangnhap();
//             $this->tratien();
//         }
//     }
//     class Visa implements Phuongthucthanhtoan{
//         public function dangnhap(){
//             echo "Đã Đăng Nhập Visa <br>";

//         }
//         public function tratien(){
//             echo " Đã trả tiền bằng: Visa";
//         }
//         public function hinhthuc_chung(){
//             $this->dangnhap();
//             $this->tratien();
//         }
//     }
//     class Tienmat implements Phuongthucthanhtoan{
//         public function tratien(){
//             echo " Đã trả tiền bằng: Tiền Mặt";
//         }
//         public function hinhthuc_chung(){
//             $this->tratien();
//         }
//     }
//     class Muahang{
//         public function thanhtoan(Phuongthucthanhtoan $phuongthucthanhtoan){
//             $phuongthucthanhtoan->hinhthuc_chung();
//         }
//     }
// Abstract
abstract class Phuongthucthanhtoan{
   abstract function tratien();
}

    class Paypal extends Phuongthucthanhtoan{
        public function dangnhap(){
            echo "Đã Đăng Nhập Paypal <br>";
        }
        public function tratien(){
            echo "Đã trả tiền bằng: Paypal";
        }
        public function thanhtoanonline()
        {
            echo "Đã thanh toán online <br>";
        }
        public function hinhthuc_chung(){
            $this->thanhtoanonline();
            $this->dangnhap();
            $this->tratien();
        }
    }
    class Visa extends Phuongthucthanhtoan{
        public function dangnhap(){
            echo "Đã Đăng Nhập Visa <br>";

        }
        public function tratien(){
            echo " Đã trả tiền bằng: Visa";
        }
        public function hinhthuc_chung(){
            $this->dangnhap();
            $this->tratien();
        }
    }
    class Tienmat extends Phuongthucthanhtoan{
        public function tratien(){
            echo " Đã trả tiền bằng: Tiền Mặt";
        }
        public function hinhthuc_chung(){
            $this->tratien();
        }
    }
    class Muahang{
        public function thanhtoan(Phuongthucthanhtoan $phuongthucthanhtoan){
            $phuongthucthanhtoan->hinhthuc_chung();
        }
    }
    
?>
