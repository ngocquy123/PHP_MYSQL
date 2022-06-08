<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helper/format.php');
//    include 'brand.php';
?>
<?php
    class product{
    // Bat Dau Backend Admin
        private $db;
        private $fm;
        public function __construct()
        {
                $this->db = new Database();
                $this->fm = new Format();
        }
        public function insert_product($data,$files){
            $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
            $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
            $category = mysqli_real_escape_string($this->db->link,$data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link,$data['price']);
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

            if($productName =='' || $brand =='' || $category =='' || $product_desc =='' || $price =='' || $type =='' || $file_name == ''){

                $alert = " <span> Bạn chưa điền vào cột sản phẩm </span>";
                return $alert;
            }else{
                $query = "select * from tbl_product where productName = '$productName'";
                $result = $this->db->select($query);
                if($result){
                    $alert = " Tên sản phẩm đã tồn tại lòng chọn tên khác";
                    return $alert;
                }else{
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "insert into tbl_product(productName,brandId,catId,product_desc,price,type,image)";
                    $query .= "values('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert  = "<span>Thêm sản phẩm thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span>Thêm sản phẩm thất bại</span>";
                    }
                }
            }
        }
        public function show_product(){
            $query = "select a.*,b.catName,c.brandName 
            FROM tbl_product a join tbl_category b on a.catId = b.catId join tbl_brand c on c.brandId = a.brandId 
            ORDER BY a.productId DESC;";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproductbyId($id){
            $query = "select * from tbl_product where productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data,$files,$id){
            $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
            $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
            $category = mysqli_real_escape_string($this->db->link,$data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link,$data['price']);
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

            if($productName =='' || $brand =='' || $category =='' || $product_desc =='' || $price =='' || $type ==''){

                $alert = " <span> Bạn chưa điền vào cột sản phẩm </span>";
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
                            //    move_uploaded_file($file_temp,$uploaded_image);
                                $query = "update tbl_product set
                                productName = '$productName',
                                brandId = '$brand',
                                catId = '$category',
                                product_desc = '$product_desc',
                                price = '$price',
                                image = '$unique_image',
                                type = '$type'
                                where productId = '$id'";

                    }else{
                                // nếu người dùng không chọn ảnh                              
                                    $query = "update tbl_product set
                                    productName = '$productName',
                                    brandId = '$brand',
                                    catId = '$category',
                                    product_desc = '$product_desc',
                                    price = '$price',
                                    type = '$type'
                                    where productId = '$id'";
                                
                    }
                    $result = $this->db->update($query);
                    if($result){
                        $alert  = "<span>Sửa sản phẩm thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span>Sửa sản phẩm thất bại</span>";
                    }
                }
                 
        }
        public function del_product($id){
            $query = "delete from tbl_product where productId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span> Bạn đã xóa sản phẩm </span>";
                return $alert;
            }else{
                $alert = "<span>Không thể xóa sản phẩm</span>";
                return $alert;
            }
        }
    
    // End BackEnd Admin 
    // Show Sản phẩm ra trang chủ
        public function getproduct_feathered(){
            $query = "select * from tbl_product where type = '0' limit 4";
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
    // Trang giỏ hàng
        public function get_details($id){
            $query = "select a.*,b.catName,c.brandName 
            FROM tbl_product a join tbl_category b on a.catId = b.catId join tbl_brand c on c.brandId = a.brandId 
            where a.productId = '$id' limit 1";
            $result = $this->db->select($query);
            return $result;
        }
    // End trang giỏ hàng 
    // Show danh mục ra slider
        public function getLastestAll($iddm){
            $query = "select * from tbl_product where brandId = $iddm order by productId desc limit 1";
            $result = $this->db->select($query);
            return $result;
        }
    // End  Show danh mục ra slider
    // So sánh sản phẩm
    public function insertCompare($productid,$customer_id){
        $productid = mysqli_real_escape_string($this->db->link,$productid);
        $customer_id = mysqli_real_escape_string($this->db->link,$customer_id);
        $query = "select * from tbl_product where productId = '$productid'";
        $result = $this->db->select($query)->fetch_assoc();
    
        $image = $result['image'];
        $price = $result['price'];
        $productName = $result['productName'];
        $check_compare = "select * from tbl_compare where productId = '$productid' and customer_id = '$customer_id'";
        $result_check =  $this->db->select($check_compare);
        if($result_check){
            $alert = "<span> Sản Phẩm Đã Được Thêm Vào So Sánh </span>";
            return $alert;
        }else{
            $query_insert = "insert into tbl_compare(customer_id,productId,productName,price,image) 
            values('$customer_id','$productid','$productName','$price','$image')";
            $insert_compare = $this->db->insert($query_insert);
            if($insert_compare){
                $alert = "<span> Đã Thêm Vào So Sánh </span>";
                return $alert;
            }else{
                $alert = "<span>Lỗi Không Thể So Sánh Sản Phẩm </span>";
                return $alert;
            }
        }
        
        
    }
    public function get_compare($customer_id){
            $query = "select * from tbl_compare where customer_id = '$customer_id' order by id desc ";
            $result = $this->db->select($query);
            return $result;
    }
    
    // End So sánh sản phẩm 
    // Sản phẩm yêu thích
    public function insertWishlist($productid,$customer_id){
        $productid = mysqli_real_escape_string($this->db->link,$productid);
        $customer_id = mysqli_real_escape_string($this->db->link,$customer_id);
        $query = "select * from tbl_product where productId = '$productid'";
        $result = $this->db->select($query)->fetch_assoc();
    
        $image = $result['image'];
        $price = $result['price'];
        $productName = $result['productName'];
        $check_wishlist = "select * from tbl_wishlist where productId = '$productid' and customer_id = '$customer_id'";
        $result_check =  $this->db->select($check_wishlist);
        if($result_check){
            $alert = "<span> Sản phẩm đã được thêm vào trang yêu thích </span>";
            return $alert;
        }else{
            $query_insert = "insert into tbl_wishlist(customer_id,productId,productName,price,image) 
            values('$customer_id','$productid','$productName','$price','$image')";
            $insert_wishlist = $this->db->insert($query_insert);
            if($insert_wishlist){
                $alert = "<span> Đã thêm vào yêu thích </span>";
                return $alert;
            }else{
                $alert = "<span>Lỗi không thể thêm vào yêu thích </span>";
                return $alert;
            }
        } 
    }
    public function get_wishlist($customer_id){
        $query = "select * from tbl_wishlist where customer_id = '$customer_id' order by id desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_wlist($proid,$customer_id){
        $query = "delete from tbl_wishlist where productId = '$proid' and customer_id = '$customer_id'";
        $result = $this->db->delete($query);
        return $result;
    }
    // End Sản phẩm yêu thích 
    // Slider
    public function insert_slider($data,$files){
        $sliderName = mysqli_real_escape_string($this->db->link,$data['sliderName']);
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

        if($sliderName =='' || $type =='' ){
            $alert = " <span> Bạn chưa điền vào Slider </span>";
            return $alert;
        }else{
                if(!empty($file_name)){
                        // nếu người dùng chọn ảnh 
                        if($file_size > 2048000){
                            $alert = " <span> Size ảnh không được lớn hơn 2MB! </span>";
                            return $alert;
                        }elseif(in_array($file_ext,$premited) === false){

                            $alert = "<span> Bạn không thể upload:".implode(',',$premited)."</span>";
                            return $alert;
                        }
                            move_uploaded_file($file_temp,$uploaded_image);
                            $query = "insert into tbl_slider(sliderName,type,sliderImage)";
                            $query .= "values('$sliderName','$type','$unique_image')";
                            $result = $this->db->insert($query);
                            if($result){
                                $alert  = "<span>Thêm Slider Thành Công</span>";
                                return $alert;
                            }else{
                                $alert = "<span>Thêm Slider Thất Bại</span>";
                            }
                }
        }

    }
    public function show_slider(){
        $query = "select * from tbl_slider where type = 1 order by sliderId desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_slider_admin(){
        $query = "select * from tbl_slider order by sliderId desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_type_slider($id,$type){
        $query = "update tbl_slider set type = $type where sliderId = '$id'";
        $result = $this->db->update($query);
        return $result;
    }
    public function del_slider($id){
        $query = "delete from tbl_slider where sliderId = '$id'";
        $result = $this->db->delete($query);
        if($result){
            return $result;
        }else{
            $alert = "Không Thể Xóa";
            return $alert;
        }
    }
     // End Slider
    //  Tìm Kiếm
    public function seach_product($tukhoa){
        $tukhoa = $this->fm->validation($tukhoa);
        $query = "select * from tbl_product where productName like '%$tukhoa%'";
        $result = $this->db->select($query);
        return $result;
    }
    // End  Tìm Kiếm
}

?>