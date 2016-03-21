<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_CateBlog extends Database{
        
        public function __construct(){
            $this->connect();
        }
        //Get list category and count blog in category
        /*
            SELECT cat.*, COUNT(bl.cat_id) AS sumblog
            FROM cateblog AS cat LEFT JOIN  blog AS bl 
            USING (cat_id)
            WHERE cat.status = '1'
            GROUP BY cat.cat_id
        */
        public function listCategory(){
            $sql[] = "SELECT cat.*, COUNT(bl.cat_id) AS sumblog";
            $sql[] = "FROM cateblog AS cat LEFT JOIN  blog AS bl";
            $sql[] = "USING (cat_id)";
            $sql[] = "WHERE cat.status = '1'";
            $sql[] = "GROUP BY cat.cat_id";
            $sql[] = "ORDER BY cat.cat_name ASC";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetchAll(); 
        }
        /* Get category by id */
        public function getCategoryById($cid){
            $sql[] = "SELECT * FROM cateblog";
            $sql[] = "WHERE status = '1' AND `cat_id` = '{$cid}'";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetch(); 
        }
}