<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
   // include 'brand.php';
?>
<?php
    class customer{
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_customer($data){
            $name = mysqli_real_escape_string($this->db->link,$data['name']);
            $city = mysqli_real_escape_string($this->db->link,$data['city']);
            $zipcode = mysqli_real_escape_string($this->db->link,$data['zipcode']);
            $email = mysqli_real_escape_string($this->db->link,$data['email']);
            $address = mysqli_real_escape_string($this->db->link,$data['address']);
            $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
            $password = mysqli_real_escape_string($this->db->link,$data['password']);
            if($name =="" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $phone == "" || $password==""){
                $alert = "<span> Bạn chưa nhập vào ô đăng ký </span>";
                return $alert;
            }else{
                $check_email ="select * from tbl_customer where email = '$email' limit 1";
                $result_check = $this->db->select($check_email);
                if($result_check){
                    $alert = "<span> Email Đã Được Đăng Ký </span>";
                    return $alert;
                }else{
                    $query = "insert into tbl_customer(name,city,zipcode,email,address,phone,password) values('$name','$city','$zipcode','$email','$address','$phone',md5('$password'))";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<span> Đăng Ký Thành Công </span>";
                        return $alert;
                    }else{
                        $alert = "<span> Lỗi Đăng Ký </span>";
                        return $alert;
                    }
                    
                }
            }
        }
        public function login_customer($data){
            $email = mysqli_real_escape_string($this->db->link,$data['email']);
            $password = mysqli_real_escape_string($this->db->link,md5($data['password']));
            if($email == '' || $password== ''){
                $alert = "<span> Bạn chưa nhập vào ô đăng nhập </span>";
                return $alert;
            }else{
                $check_login =" select * from tbl_customer where email='$email' and password='$password' ";
                $result_check = $this->db->select($check_login);
                if($result_check != false){
                    $value = $result_check->fetch_assoc();
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['id']);
                    Session::set('customer_name',$value['name']);
                    header("location:order.php");
                }else{
                    $alert = "<span> Tài khoảng hoặc mật khẩu không đúng !</span>";
                    return $alert;
                }
            }
        }
        public function show_customer($id){
            $query = "select * from tbl_customer where id='$id' limit 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_customers($data,$id){
            $name = mysqli_real_escape_string($this->db->link,$data['name']);
            $city = mysqli_real_escape_string($this->db->link,$data['city']);
            $zipcode = mysqli_real_escape_string($this->db->link,$data['zipcode']);
            $address = mysqli_real_escape_string($this->db->link,$data['address']);
            $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
            if($name =="" || $address == "" || $phone == ""){
                $alert = "<span> Bạn Chưa Nhập Vào Ô Thông Tin </span>";
                return $alert;
            }else{
                $query = "update tbl_customer
                set name='$name',city='$city',zipcode='$zipcode',address='$address',phone='$phone' where id = '$id'";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span> Cập Nhập Thông Tin Thành Công </span>";
                    return $alert;
                }else{
                    $alert = "<span> Lỗi Không Thể Cập Nhập Thông Tin </span>";
                    return $alert;
                }
                
            }
        }
        // Bình luận
        public function insert_binhluan(){
            $tenbinhluan = $_POST['tennguoibinhluan'];
            $binhluan = $_POST['binhluan'];
            $product_id = $_POST['product_id_binhluan'];
            if($tenbinhluan =='' || $binhluan == ''){
                $alert = "Bạn chưa điền vào điền tên hoặc chưa nhập vào bình luận ";
                return $alert;
            }else{
                $query = "insert into tbl_binhluan(tenbinhluan,binhluan,productId) values('$tenbinhluan','$binhluan','$product_id')";
                $result = $this->db->insert($query);
                if($result){
                    return false;
                }else{
                    $alert = "<span> Không thể bình luận </span>";
                    return $alert;
                }
            }
        }
        public function get_comments($id){
            $query = "select * from tbl_binhluan where status = '1'";
            $result = $this->db->select($query);
            return $result;
        }
        // End  Bình luận 


    }
?>