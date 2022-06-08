<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
    // include '../lib/database.php';
    // include '../helper/format.php';
?>
<?php
    class category{
        private $db;
        private $fm;
        public function __construct()
        {
                $this->db = new Database();
                $this->fm = new Format();
        }
        public function insert_cartergory($catName){
            $catName = $this->fm->validation($catName);

            
            $catName = mysqli_real_escape_string($this->db->link,$catName);
            if(empty($catName)){
                $alert = " <span>Bạn chưa điền danh mục</span>";
                return $alert;
            }else{
                $query = "select * from tbl_category where catName = '$catName'";
                $result = $this->db->select($query);
                if($result){
                    $alert = " Tên danh mục đã tồn tại lòng chọn danh mục khác";
                    return $alert;
                }else{
                    
                    $query = "insert into tbl_category(catName) values('$catName')";
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
        public function show_category(){
            $query = "select * from tbl_category order by catId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyId($id){
            $query = "select * from tbl_category where catId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getbrandbyId($id){
            $query = "select * from tbl_brand where brandId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_category($catName,$id){
            $catName = $this->fm->validation($catName);

            $catName = mysqli_real_escape_string($this->db->link,$catName);
            if(empty($catName)){
                $alert = " <span>Bạn chưa điền danh mục </span>";
                return $alert;
            }else{
                $query = "select * from tbl_category where catName = '$catName'";
                $result = $this->db->select($query);
                if($result){
                    $alert = " Tên danh mục đã tồn tại lòng chọn danh mục khác";
                    return $alert;
                }else{
                    
                    $query = "update tbl_category set catName='$catName' where catId = $id";
                    $result = $this->db->update($query);
                    if($result){
                        $alert  = "<span>Sửa danh mục thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span>Sửa danh mục thất bại</span>";
                    }
                }
            }
        }
        public  function del_category($id){
            $query = "delete from tbl_category where catId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span> Xoá danh mục thành công</span>";
                return $alert;
            }else{
                $alert = "<span> Xóa danh mục thất bại </span>";
            }
        }
        // End Admin Backend 
        // show Front End
        public function show_category_fontend(){
            $query = "select * from tbl_category order by catId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_product_by_cat($id){
            $query = "select b.*,a.catName,a.catId 
            from tbl_category a join tbl_product b on a.catId = b.catId  
            where a.catId = '$id' and b.catId ='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_product_by_brand($id){
            $query = "select b.*,a.brandName,a.brandId as 'brandIda' 
            from tbl_brand a join tbl_product b on a.brandId = b.brandId  
            where a.brandId = '$id' and b.brandId ='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        //End show Front End
        public function menu_cat(){
            $query = "select * from tbl_category";
            $result = $this->db->select($query);
            return $result;
        }
        public function menu_cat_brand($id){
            $query = "select * from tbl_brand where brand_categoryid = $id";
            $result = $this->db->select($query);
            return $result;
        }
    }

?>