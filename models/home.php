<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_Home extends Model_Product{
        public function __construct(){
            parent::__construct();
        }
        /*
         * Hien thi slider   
        */
        public function getSliderHomepage(){
            $sql[] = "SELECT *";
            $sql[] = "FROM `slider`";
            $sql[] = "WHERE status = '1'";
            $sql[] = "ORDER BY `position` ASC";
            $sql = implode(' ', $sql);
            $this->query($sql);
            return $this->fetchAll();
        }
        
}