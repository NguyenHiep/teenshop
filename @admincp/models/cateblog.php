<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_CateBlog extends Database{
    protected $_cat_name;
    protected $_slug;
    protected $_status;
    protected $_position;
    protected $_metakeyword;
    protected $_metadescription;
    protected $_image;
    
    //Be gin khai bao thuoc tinh
    public function __construct(){
        $this->connect();
    }
    public function setCateName($catname){
        $this->_cat_name = $catname;
    }
    public function getCateName(){
        return $this->_cat_name;
    }
    public function setSlug($slug){
        $this->_slug = $slug;
    }
    public function getSlug(){
        return $this->_slug;
    }
    public function setStatus($status){
        $this->_status = $status;
    }
    public function getStatus(){
        return $this->_status;
    }
    public function setPosition($position){
        $this->_position = $position;
    }
    public function getPosition(){
        return $this->_position;
    }
    public function setMetakeyword($keyword){
        $this->_metakeyword = $keyword;
    }
    public function getMetakeyword(){
        return $this->_metakeyword;
    }
    public function setMetaDescription($description){
        $this->_metadescription = $description;
    }
    public function getMetaDescription(){
        return $this->_metadescription;
    }
    
    public function setImage($image){
        $this->_image = $image;
    }
    public function getImage(){
        return $this->_image;
    }
    //End khai bao thuoc tinh
    
    
    public function insertCateBlog(){
        $sql[] = "INSERT INTO `cateblog`(`cat_name`,`slug`,`status`,`position`,`meta_keyword`,`meta_description`,`image`)";
        $sql[] = "VALUES('".$this->getCateName()."','";
        $sql[] = $this->getSlug()."','".$this->getStatus()."','";
        $sql[] = $this->getPosition()."','".$this->getMetakeyword()."','";
        $sql[] = $this->getMetaDescription()."','".$this->getImage()."')";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function checkCateBlog($catid=""){
        $sql[] = "SELECT * FROM `cateblog`";
        if($catid !=""){
            $sql[] = "WHERE `cat_name` = '".$this->getCateName()."' AND `cat_id` != '{$catid}'";
        }else{
            $sql[] = "WHERE `cat_name` = '".$this->getCateName()."'";
        }
        $sql = implode(' ',$sql);
        $this->query($sql);
        if($this->num_rows() == 0){
            return true;
        }else{
            return false;
        }
    }
    public function listCateBlog($start="",$limit=""){
        $sql[] = "SELECT * FROM `cateblog`";
        $sql[] = "ORDER BY `cat_id` DESC";
        if($start !="" && $limit!=""){
             $sql[] = "LIMIT {$start},{$limit}";
        }
       $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetchAll();
    }
    public function deleteCateBlog($catid){
        $sql[] = "DELETE FROM `cateblog`";
        $sql[] = "WHERE `cat_id` = '{$catid}'";
        $sql[] = "LIMIT 1";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function deleteAllCateBlog($catid){
        
    }
    public function getCateBogById($catid){
        $sql[] = "SELECT * FROM `cateblog`";
        $sql[] = "WHERE `cat_id` = '{$catid}'";
        $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetch();
    }
    public function updateCateBlog($catid){
        $sql[] = "UPDATE `cateblog` SET `cat_name` = '".$this->getCateName()."', `slug` = '".$this->getSlug()."',";
        $sql[] = "`status` = '".$this->getStatus()."',";
        $sql[] = "`position` = '".$this->getPosition()."',";
        $sql[] = "`meta_keyword` = '".$this->getMetakeyword()."',";
        
        //Xet truong hop upload hinh anh
        if($this->getImage() !="none" && $this->getImage() != NULL){
            $sql[] = "`image` = '".$this->getImage()."',";
        }
        $sql[] = "`meta_description` = '".$this->getMetaDescription()."'";
        $sql[] = "WHERE `cat_id` = '{$catid}'";
        $sql[] = "LIMIT 1";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function totalCateBlog(){
        $sql = "SELECT COUNT(*) AS `count` FROM `cateblog`";
        $this->query($sql);
        return $this->fetch();
    }
}