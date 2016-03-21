<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_Cate extends Database{
        
        public function __construct(){
            $this->connect();
        }
        public function listCategory(){
            $sql[] = "SELECT * FROM category";
            $sql[] = "WHERE status = '1'";
            $sql[] = "ORDER BY `created` DESC";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetchAll(); 
        }
        /* Get category by id */
        public function getCategoryById($cid){
             $sql[] = "SELECT * FROM category";
            $sql[] = "WHERE status = '1' AND `category_id` = '{$cid}'";
            $sql[] = "ORDER BY `created` DESC";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetch(); 
        }
}