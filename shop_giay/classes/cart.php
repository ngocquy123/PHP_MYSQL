<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
   // include 'brand.php';
?>
<?php
    class cart{
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function add_to_cart($quantity,$id){
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $id = mysqli_real_escape_string($this->db->link,$id);
            $sId = session_id();
            $query = "select * from tbl_product where productId = '$id'";
            $result = $this->db->select($query)->fetch_assoc();
            
            $image = $result['image'];
            $price = $result['price'];
            $productName = $result['productName'];

            $check_cart = "select * from tbl_cart where productId ='$id' and sId = '$sId'";
            $result_check = $this->db->select($check_cart);
            if($result_check){
                $msg = "Sản Phẩm Đã Được Thêm Vào Giỏ Hàng";
                return $msg;
            }else{
                $query_insert = "insert into tbl_cart(productId,quantity,sId,image,price,productName)";
                $query_insert .= "values('$id','$quantity','$sId','$image','$price','$productName')";

                $insert_cart = $this->db->insert($query_insert);
                if($insert_cart){
                    return false;
                }else{
                    header('Location:404.php');
                }
            }
           
        }
        public function update_quantity_cart($quantity,$cartId){
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $cartId = mysqli_real_escape_string($this->db->link,$cartId);
            $query = "update tbl_cart set
            quantity = '$quantity'
            where cartId = '$cartId'";
            $result = $this->db->update($query);
            if($result){
                header("Refresh:0");
            }else{
                $msg = "<span>Cập Nhập Sản Phẩm Thất Bại</span> ";
                return $msg;
            }

        }
        public function del_product_cart($cartid){
            $cartid = mysqli_real_escape_string($this->db->link,$cartid);
            $query = "delete from tbl_cart where cartId = '$cartid'";
            $result = $this->db->delete($query);
            if($result){
                header('location:cart.php');
            }else{
                $msg  = "<span>Không Xóa Được Sản Phẩm Trong Giỏ Hàng</span>";
            }
        }
        public function get_product_cart(){
            $sId = session_id();
            $query = "select * from tbl_cart where sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function check_cart(){
            $sId = session_id();
            $query = "select * from tbl_cart where sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function del_all_data_cart(){
            $sId = session_id();
            $query = "delete from tbl_cart where sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function insertOrder($customer_id){
            $sId = session_id();
            $query = "select * from tbl_cart where sId = '$sId'";
            $get_product = $this->db->select($query);
            if($get_product){
                while($result = $get_product->fetch_assoc()){
                    $productid = $result['productId'];
                    $productName = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = $result['price'] * $quantity;
                    $image = $result['image'];
                    $customer_id = $customer_id;
                    $query_order = "insert into tbl_order(productId,quantity,image,price,productName,customer_id)";
                    $query_order .= "values('$productid','$quantity','$image','$price','$productName','$customer_id')";
                    $insert_order = $this->db->insert($query_order);
                }
            
            }
        }
        // ORDER --------------------------------
        public function getAmoutPrice($customer_id){
            $query = "select * from tbl_order where customer_id = '$customer_id'";
            $get_price = $this->db->select($query);
            return $get_price;
        }
        public function get_cart_ordered($customer_id){
            $query = "select * from tbl_order where customer_id = '$customer_id'";
            $get_price = $this->db->select($query);
            return $get_price;
        }
        public function check_order($customer_id){
            $sId = session_id();
            $query = "select * from tbl_order where customer_id = '$customer_id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_inbox_cart(){
            $query = "select * from tbl_order order by id";
            $get_inbox_cart = $this->db->select($query);
            return $get_inbox_cart;
        }
        public function shifted($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link,$id);
            $time = mysqli_real_escape_string($this->db->link,$time);
            $price = mysqli_real_escape_string($this->db->link,$price);
            $query = "update tbl_order set status = 1 where id = '$id' and date_order='$time' and price ='$price'";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span>Cập nhập đơn hàng thành công</span>";
                return $alert;
            }else{
                $alert = "<span>Cập nhập đơn hàng thất bại !!!</span>";
                return $alert;
            }
        }
        public function del_shifted($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link,$id);
            $time = mysqli_real_escape_string($this->db->link,$time);
            $price = mysqli_real_escape_string($this->db->link,$price);
            $query = "delete from tbl_order where id = '$id' and date_order ='$time' and price ='$price'";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span>Đã Xóa Đơn Hàng</span>";
                return $alert;
            }else{
                $alert = "<span>Xóa Thất Bại !!!</span>";
                return $alert;
            }
        }
        public function shifted_confirmid ($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link,$id);
            $time = mysqli_real_escape_string($this->db->link,$time);
            $price = mysqli_real_escape_string($this->db->link,$price);
            $query = "update tbl_order set status = 2 where customer_id = '$id' and date_order='$time' and price ='$price'";
            $result = $this->db->update($query);
            return $result;
        }
        //  END ORDER
        // So sánh sản phẩm
        public function del_compare($customer_id){
            $query = "delete from tbl_compare where customer_id = '$customer_id'";
            $result = $this->db->delete($query);
            return $result;
        } 
        //  End So sánh sản phẩm 

    }
?>