<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_Slider extends Database{
    protected $_title;
    protected $_image;
    protected $_alt;
    protected $_position;
    protected $_link;
    protected $_target  ;
    protected $_status;
    protected $_content;
    protected $_type;
    public function __construct(){
        $this->connect();
        
    }
    public function setType($type){
        $this->_type = $type;
    }
    public function getType(){
        return $this->_type;
    }
    public function setTitle($title){
        $this->_title = $title;
    }
    public function getTitle(){
        return $this->_title;
    }
    public function setImage($image){
        $this->_image = $image;
    }
    public function getImage(){
        return $this->_image;
    }
    public function setAlt($alt){
        $this->_alt = $alt;
    }
    public function getAlt(){
        return $this->_alt;
    }
     public function setPosition($position){
        $this->_position = $position;
    }
    public function getPosition(){
        return $this->_position;
    }
    public function setLink($link){
        $this->_link = $link;
    }
    public function getLink(){
        return $this->_link;
    }
    public function setTarget($target){
        $this->_target =  $target;
    }
    public function getTarget(){
        return $this->_target;
    }
    
    public function setStatus($status){
        $this->_status = $status;
    }
    public function getStatus(){
        return $this->_status;
    }
    public function setContent($content){
        $this->_content = $content;
    }
    public function getContent(){
        return $this->_content;
    }
   
    
    
    
    public function insertSlider(){
        $sql[] = "INSERT INTO `slider`(`type`,`title`,`image`,`alt`,`position`,`link`,`target`,`status`,`content`)";
        $sql[] = "VALUES('".$this->getType()."','";
        $sql[] = $this->getTitle()."','";
        $sql[] = $this->getImage()."','".$this->getAlt()."','";
        $sql[] = $this->getPosition()."','".$this->getLink()."','";
        $sql[] = $this->getTarget()."','".$this->getStatus()."','".$this->getContent()."')";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function checkSlider($slid=""){
        $sql[] = "SELECT * FROM `slider`";
        if($slid !=""){
            $sql[] = "WHERE `title` = '".$this->getTitle()."' AND `slider_id` != '{$slid}'";
        }else{
            $sql[] = "WHERE `title` = '".$this->getTitle()."'";
        }
        $sql = implode(' ',$sql);
        $this->query($sql);
        if($this->num_rows() == 0){
            return true;
        }else{
            return false;
        }
    }
    public function listSlider($start="",$limit=""){
        $sql[] = "SELECT * FROM `slider`";
        $sql[] = "ORDER BY `slider_id` DESC";
        if($start !="" && $limit!=""){
             $sql[] = "LIMIT {$start},{$limit}";
        }
       $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetchAll();
    }
    public function deleteSlider($slid){
        $sql[] = "DELETE FROM `slider`";
        $sql[] = "WHERE `slider_id` = '{$slid}'";
        $sql[] = "LIMIT 1";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function deleteAllSlider($slid){
        
    }
    public function getSliderById($slid){
        $sql[] = "SELECT * FROM `slider`";
        $sql[] = "WHERE `slider_id` = '{$slid}'";
        $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetch();
    }
    public function updateSlider($slid){
        $sql[] = "UPDATE `slider` SET `title` = '".$this->getTitle()."',";
      //  $sql[] = " `image` = '".$this->getImage()."',";
        //Xet truong hop upload hinh anh
        if($this->getImage() !="none" && $this->getImage() != NULL){
            $sql[] = "`image` = '".$this->getImage()."',";
        }
        $sql[] = "`type` = '".$this->getType()."',";
        $sql[] = "`alt` = '".$this->getAlt()."',";
        $sql[] = "`position` = '".$this->getPosition()."',";
        $sql[] = "`link` = '".$this->getLink()."',";
        $sql[] = "`target` = '".$this->getTarget()."',";
        $sql[] = "`status` = '".$this->getStatus()."',";
        $sql[] = "`content` = '".$this->getContent()."'";
        $sql[] = "WHERE `slider_id` = '{$slid}'";
        $sql[] = "LIMIT 1";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function totalSlider(){
        $sql = "SELECT COUNT(*) AS `count` FROM `slider`";
        $this->query($sql);
        return $this->fetch();
    }
}