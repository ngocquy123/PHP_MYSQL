<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
 //   include 'cartgory.php';
?>
<?php
    class brand{
        private $db;
        private $fm;
        public function __construct()
        {
                $this->db = new Database();
                $this->fm = new Format();
        }
        public function insert_brand($brandName){
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->link,$brandName);
            if(empty($brandName)){
                $alert = " <span>Bạn chưa điền thương hiệu</span>";
                return $alert;
            }else{
                $query = "select * from tbl_brand where brandName = '$brandName'";
                $result = $this->db->select($query);
                if($result){
                    $alert = " Tên thương hiệu đã tồn tại vui lòng chọn tên khác";
                    return $alert;
                }else{
                    
                    $query = "insert into tbl_brand(brandName) values('$brandName')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert  = "<span>Thêm thương hiệu thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span>Thêm thương hiệu thất bại</span>";
                    }
                }
            }
        }
        public function show_brand(){
            $query = "select * from tbl_brand order by brandId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getbrandbyId($id){
            $query = "select * from tbl_brand where brandId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_brand($brandName,$id){
            $brandName = $this->fm->validation($brandName);

            $brandName = mysqli_real_escape_string($this->db->link,$brandName);
            if(empty($brandName)){
                $alert = " <span>Bạn chưa điền thương hiệu </span>";
                return $alert;
            }else{
                $query = "select * from tbl_brand where brandName = '$brandName'";
                $result = $this->db->select($query);
                if($result){
                    $alert = " Tên Thương hiệu đã tồn tại lòng chọn tên khác";
                    return $alert;
                }else{
                    
                    $query = "update tbl_brand set brandName='$brandName' where brandId = $id";
                    $result = $this->db->update($query);
                    if($result){
                        $alert  = "<span>Sửa thương hiệu thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span>Sửa thương hiệu thất bại</span>";
                    }
                }
            }
        }
        public  function del_brand($id){
            $query = "delete from tbl_brand where brandId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span> Xoá thương hiệu thành công</span>";
                return $alert;
            }else{
                $alert = "<span> Xóa thương hiệu thất bại </span>";
            }
        }
        public function getbrandbyId($id){
            $query = "select * from tbl_category where catId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
    }

?>