<?php
    $filepath = realpath(dirname(__FILE__));
    include "../lib/session.php";
    Session::checkLogin();
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
?>
<?php
    class adminLogin{
        private $db;
        private $fm;
        public function __construct()
        {
                $this->db = new Database();
                $this->fm = new Format();
        }
        public function login_admin($adminUser,$adminPass){
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);

            $adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link,$adminPass);
            if(empty($adminUser) || empty($adminPass)){
                $alert = "Tài khoản hoặc mật khẩu bị rỗng";
                return $alert;
            }else{
                $query = "select * from tbl_admin where adminUser = '$adminUser' and adminPass = '$adminPass' limit 1";
                $result = $this->db->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin',true);
                    Session::set('adminId',$value['adminId']);
                    Session::set('adminUser',$value['adminUser']);
                    Session::set('adminName',$value['adminName']);
                    header("location:index.php");
                }else{
                    $alert = "Mật khẩu hoặc tài khoảng không đúng vui lòng nhập lại";
                    return $alert;
                }
            }
        }
    }

?>