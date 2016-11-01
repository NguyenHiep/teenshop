<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_Slider extends Database{
        
        public function __construct(){
            $this->connect();
        }
        public function getSliderBlog(){
            $sql[] = "SELECT *";
            $sql[] = "FROM `slider`";
            $sql[] = "WHERE `type` = 'blog' AND `status` = '1'";
            $sql   = implode(' ', $sql);
            $this->query($sql);
            return $this->fetchAll();
        }
}