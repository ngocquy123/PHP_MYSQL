<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
    // include '../lib/database.php';
    // include '../helper/format.php';
?>
<?php
    class post{
        private $db;
        private $fm;
        public function __construct()
        {
                $this->db = new Database();
                $this->fm = new Format();
        }
        public function insert_post($catName,$catDesc,$catStatus){
            $catName = $this->fm->validation($catName);
            $catDesc = $this->fm->validation($catDesc);
            $catStatus = $this->fm->validation($catStatus);
            
            $catName = mysqli_real_escape_string($this->db->link,$catName);
            $catDesc = mysqli_real_escape_string($this->db->link,$catDesc);
            $catStatus = mysqli_real_escape_string($this->db->link,$catStatus);
            if(empty($catName) || empty($catDesc)){
                $alert = " <span>Bạn chưa điền danh mục</span>";
                return $alert;
            }else{
                $query = "select * from tbl_cate_post where title = '$catName'";
                $result = $this->db->select($query);
                if($result){
                    $alert = " Tên danh mục đã tồn tại lòng chọn tên danh mục khác";
                    return $alert;
                }else{
                    $query = "insert into tbl_cate_post(title,description,status) values('$catName','$catDesc',$catStatus)";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert  = "<span>Thêm danh mục thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span>Thêm danh mục thất bại</span>";
                    }
                }
            }
        }
        public function show_category_post(){
            $query = "select * from tbl_cate_post order by id_cate_post desc";
            $result = $this->db->select($query);
            return $result;
        }
        public  function del_category_post($id){
            $query = "delete from tbl_cate_post where id_cate_post = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span> Đã xóa danh mục </span>";
                return $alert;
            }else{
                $alert = "<span> Xóa danh mục thất bại </span>";
            }
        }
        public function get_cat_byId($id){
            $query = "select * from tbl_cate_post where id_cate_post = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_category_post($catName,$catDesc,$catStatus,$id){
            $catName = $this->fm->validation($catName);
            $catDesc = $this->fm->validation($catDesc);
            $catStatus = $this->fm->validation($catStatus);

            $catName = mysqli_real_escape_string($this->db->link,$catName);
            $catDesc = mysqli_real_escape_string($this->db->link,$catDesc);
            $catStatus = mysqli_real_escape_string($this->db->link,$catStatus);
            if(empty($catName) || empty ($catDesc)){
                $alert = " <span> Bạn chưa điền vào danh mục </span>";
                return $alert;
            }else{
                $query = "update tbl_cate_post set title='$catName', description = '$catDesc', status=$catStatus  where id_cate_post = $id";
                $result = $this->db->update($query);
                if($result){
                    $alert  = "<span>Đã sử danh mục</span>";
                    return $alert;
                }else{
                    $alert = "<span>Sửa danh mục thất bại</span>";
                }
                
            }
        }
        
        // End Admin Backend 
        // show Front End
        public function show_post_fontend(){
            $query = "select * from tbl_post order by catId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_name_by_cat($id){
            $query = "select b.*,a.title,a.id_cate_post 
            from tbl_cate_post a join tbl_blog b on a.id_cate_post = b.category_post  
            where a.id_cate_post = '$id' and b.category_post ='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getpostbyid($id){
            $query = "select * from tbl_blog where id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        //End show Front End

    }

?>