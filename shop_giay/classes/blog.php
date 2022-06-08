<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
//    include 'brand.php';
?>
<?php
    class blog{
    // Bat Dau Backend Admin
        private $db;
        private $fm;
        public function __construct()
        {
                $this->db = new Database();
                $this->fm = new Format();
        }
        public function insert_blog($data,$files){
            $title = mysqli_real_escape_string($this->db->link,$data['title']);
            $category = mysqli_real_escape_string($this->db->link,$data['category_post']);
            $desc = mysqli_real_escape_string($this->db->link,$data['desc']);
            $content = mysqli_real_escape_string($this->db->link,$data['content']);
            $type = mysqli_real_escape_string($this->db->link,$data['type']);
            // kiểm tra hình ảnh và lấy hình ành vào folder uploads
            $premited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($title =='' || $category =='' || $desc =='' || $content =='' || $type ==''){

                $alert = " <span> Bạn chưa điền vào cột tin tức </span>";
                return $alert;
            }else{
                $query = "select * from tbl_blog where title_blog = '$title'";
                $result = $this->db->select($query);
                if($result){
                    $alert = " Tiêu đề đã tồn tại vui lòng chọn tên khác";
                    return $alert;
                }else{
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "insert into tbl_blog(title_blog,description,content,category_post,image,status)";
                    $query .= "values('$title','$desc','$content','$category','$unique_image','$type')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert  = "<span>Tin đã được thêm</span>";
                        return $alert;
                    }else{
                        $alert = "<span>Không thể thêm tin tức</span>";
                    }
                }
            }
        }
        public function show_blog(){
            $query = "select a.*,b.title 
            FROM tbl_blog a join tbl_cate_post b on a.category_post = b.id_cate_post 
            ORDER BY a.id DESC;";
            $result = $this->db->select($query);
            return $result;
        }
        public function getblogbyid($id){
            $query = "select * from tbl_blog where id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_blog($data,$files,$id){
            $blogName = mysqli_real_escape_string($this->db->link,$data['blogName']);
            $category_blog = mysqli_real_escape_string($this->db->link,$data['category_blog']);
            $blog_desc = mysqli_real_escape_string($this->db->link,$data['blog_desc']);
            $blog_content = mysqli_real_escape_string($this->db->link,$data['blog_content']);
            $type = mysqli_real_escape_string($this->db->link,$data['type']);
            // kiểm tra hình ảnh và lấy hình ành vào folder uploads
            $premited = array('jpg','jpeg','png','gif');

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
             //  $file_current = strtolower(current($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($blogName =='' || $category_blog =='' || $blog_desc =='' ||  $blog_content =='' || $type =='' ){

                $alert = " <span> Bạn chưa điền vào tin tức </span>";
                return $alert;
            }else{
                    if(!empty($file_name)){
                            // nếu người dùng chọn ảnh 
                            if( $file_size > 2048){
                                $alert = " <span> Size ảnh không được lớn hơn 2MB! </span>";
                                return $alert;
                            }elseif(in_array($file_ext,$premited) === false){

                                $alert = "<span> Bạn không thể upload:".implode(',',$premited)."</span>";
                                return $alert;
                            }
                                move_uploaded_file($file_temp,$uploaded_image);
                                $query = "update tbl_blog set
                                title_blog= '$blogName',
                                category_post = '$category_blog',
                                description = '$blog_desc',
                                content = '$blog_content',
                                image = '$unique_image',
                                status = ' $type'
                                where id = '$id'";

                    }else{
                                // nếu người dùng không chọn ảnh                              
                                $query = "update tbl_blog set
                                title_blog= '$blogName',
                                category_post = '$category_blog',
                                description = '$blog_desc',
                                content = '$blog_content',
                                status = ' $type'
                                where id = '$id'";
                                
                    }
                    $result = $this->db->update($query);
                    if($result){
                        $alert  = "<span>Đã sửa tin tức</span>";
                        return $alert;
                    }else{
                        $alert = "<span>Không thể sửa tin tức</span>";
                    }
                }
                 
        }
        public function del_blog($id){
            $query = "delete from tbl_blog where id = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span> Bạn đã tin tức </span>";
                return $alert;
            }else{
                $alert = "<span>Không thể xóa tin tức</span>";
                return $alert;
            }
        }
    
    // End BackEnd Admin 
    // Show Sản phẩm ra trang chủ
        public function getproduct_feathered(){
            $query = "select * from tbl_product where type = '0'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproduct_new(){
            $sp_tungtrang = 4;
            if(!isset($_GET['trang'])){
                $trang = 1;
            }else{
                $trang = $_GET['trang'];
            }
            $tung_trang = ($trang - 1)*$sp_tungtrang;
            $query = "select * from tbl_product order by productId desc limit $tung_trang,$sp_tungtrang";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_all_product(){
            $query = "select * from tbl_product order by productId desc ";
            $result = $this->db->select($query);
            return $result;
        }
    // End Show sản phẩm ra trang chủ
}

?>