<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_Product extends Database{
        
        public function __construct(){
            $this->connect();
        }
        /*
         *@return Trả về danh sách sản phẩm mới, được sắp xếp theo ngày nhập vào   
        */
        public function listproductNew(){
            $sql[] = "SELECT * FROM product";
            $sql[] = "WHERE publish = '1'";
            $sql[] = "ORDER BY `create` DESC";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetchAll(); 
        }
         /*
         *@return Trả về danh sách sản bán chạy, dựa vào số lượng order của sản phẩm  
        */
        public function listproductBestelling(){
            $sql[] = "SELECT * FROM product";
            $sql[] = "WHERE publish = '1'";
            $sql[] = "ORDER BY `create` DESC";
            $sql[] = "LIMIT 3";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetchAll(); 
        }
        /*
        * detail product
        */
        public function listProductDetail($prid){
            $sql[] = "SELECT * FROM product";
            $sql[] = "WHERE publish = '1' AND `product_id` = '{$prid}'";
            $sql[] = "ORDER BY `create` DESC";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetch(); 
        }
        /*
        * get product with category
        */
        public function getProductByCate($catid){
            $sql[] = "SELECT * FROM product";
            $sql[] = "WHERE publish = '1' AND `category_id` = '{$catid}'";
            $sql[] = "ORDER BY `create` DESC";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetchAll(); 
        }
        /*
        * get product with category in product detail
        */
        
        public function getProductCategoryInDetail($catid, $pid){
            $sql[] = "SELECT * FROM product";
            $sql[] = "WHERE publish = '1' AND `category_id` = '{$catid}' AND `product_id` != '{$pid}'";
            $sql[] = "ORDER BY `create` DESC";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetchAll(); 
        }
}