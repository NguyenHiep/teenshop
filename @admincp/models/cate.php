<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_Cate extends Database{
    protected $_name;
    protected $_slug;
    protected $_desscription;
    protected $_status;
    protected $_position;
    protected $_bgimage;
    protected $_parent_id;
    
    public function __construct(){
        $this->connect();
        
    }
    public function setCateName($catname){
        $this->_name = $catname;
    }
    public function getCateName(){
        return $this->_name;
    }
    public function setSlug($slug){
        $this->_slug = $slug;
    }
    public function getSlug(){
        return $this->_slug;
    }
    public function setDesscription($description){
        $this->_desscription = $description;
    }
    public function getDesscription(){
        return $this->_desscription;
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
    public function setImage($image){
        $this->_bgimage = $image;
    }
    public function getImage(){
        return $this->_bgimage;
    }
    public function setParentId($parentid){
        $this->_parent_id =  $parentid;
    }
    public function getParentId(){
        return $this->_parent_id;
    }
    
    
    
    public function insertCate(){
        $sql[] = "INSERT INTO `category`(`name`,`slug`,`desscription`,`status`,`position`,`bgimage`,`parent_id`,`created`)";
        $sql[] = "VALUES('".$this->getCateName()."','";
        $sql[] = $this->getSlug()."','".$this->getDesscription()."','";
        $sql[] = $this->getStatus()."','".$this->getPosition()."','";
        $sql[] = $this->getImage()."','".$this->getParentId()."','".date('Y-m-d H:m:i')."')";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function checkCate($catid=""){
        $sql[] = "SELECT * FROM `category`";
        if($catid !=""){
            $sql[] = "WHERE `name` = '".$this->getCateName()."' AND `category_id` != '{$catid}'";
        }else{
            $sql[] = "WHERE `name` = '".$this->getCateName()."'";
        }
        $sql = implode(' ',$sql);
        $this->query($sql);
        if($this->num_rows() == 0){
            return true;
        }else{
            return false;
        }
    }
    public function listCate($start="",$limit=""){
        $sql[] = "SELECT * FROM `category`";
        $sql[] = "ORDER BY `category_id` DESC";
        if($start !="" && $limit!=""){
             $sql[] = "LIMIT {$start},{$limit}";
        }
       $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetchAll();
    }
    public function deleteCate($catid){
        $sql[] = "DELETE FROM `category`";
        $sql[] = "WHERE `category_id` = '{$catid}'";
        $sql[] = "LIMIT 1";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function deleteAllCate($catid){
        
    }
    public function getCateById($catid){
        $sql[] = "SELECT * FROM `category`";
        $sql[] = "WHERE `category_id` = '{$catid}'";
        $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetch();
    }
    public function updateCate($catid){
        $sql[] = "UPDATE `category` SET `name` = '".$this->getCateName()."', `slug` = '".$this->getSlug()."',";
        $sql[] = "`desscription` = '".$this->getDesscription()."',";
        $sql[] = "`status` = '".$this->getStatus()."',";
        $sql[] = "`position` = '".$this->getPosition()."',";
        //Xet truong hop upload hinh anh
        if($this->getImage() !="none" && $this->getImage() != NULL){
            $sql[] = "`bgimage` = '".$this->getImage()."',";
        }
        
        $sql[] = "`parent_id` = '".$this->getParentId()."'";
        $sql[] = "WHERE `category_id` = '{$catid}'";
        $sql[] = "LIMIT 1";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function totalCate(){
        $sql = "SELECT COUNT(*) AS `count` FROM `category`";
        $this->query($sql);
        return $this->fetch();
    }
}