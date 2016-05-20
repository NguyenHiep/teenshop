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
            $sql[] = "WHERE `type` = 'blog';";
            $sql   = implode(' ', $sql);
            $this->query($sql);
            return $this->fetchAll();
        }
}