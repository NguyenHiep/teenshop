<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_Product extends Database{
    protected $_category_id;
    protected $_title;
    protected $_slug;
    protected $_images;
    protected $_info;
    protected $_price;
    protected $_sale_price;
    protected $_color;
    protected $_size;
    protected $_qty;
    protected $_meta_title;
    protected $_meta_keyword;
    protected $_meta_description;
    protected $_public;
    protected $_create;
    protected $_modified;
    
     public function __construct(){
        $this->connect();
     }
     public function setCatId($catid){
        $this->_category_id = $catid;
     }
     public function getCatId(){ 
        return $this->_category_id;
     }
     public function setTitle($title){
        $this->_title = $title;
     }
     public function getTitle(){
        return $this->_title;
     }
     public function setSlug($slug){
        $this->_slug = $slug;
     }
     public function getSlug(){
        return $this->_slug;
     }
     public function setImage($image){
        $this->_images = $image;
     }
     public function getImage(){
        return $this->_images;
     }
     public function setInfo($info){
        $this->_info = $info;
     }
     public function getInfo(){
        return $this->_info;
     }
     public function setPrice($price){
        $this->_price = $price;
     }
     public function getPrice(){
        return $this->_price;
     }
     public function setSalePrice($sale_price){
        $this->_sale_price = $sale_price;
     }
     public function getSalePrice(){
        return $this->_sale_price;
     }
     public function setColor($color){
        $this->_color = $color;
     }
     public function getColor(){
        return $this->_color;
     }
     public function setSize($size){
        $this->_size = $size;
     }
     public function getSize(){
        return $this->_size;
     }
     public function setQty($qty){
        $this->_qty = $qty;
     }
     public function getQty(){
        return $this->_qty;
     }
     public function setMetaTile($meta_title){
        $this->_meta_title = $meta_title;
     }
     public function getMetaTile(){
        return $this->_meta_title;
     }
     public function setMeTaKeyWord($keyword){
        $this->_meta_keyword = $keyword;
     }
     public function getMetaKeyWord(){
        return $this->_meta_keyword;
     }
     public function setMetaDescription($meta_description){
        $this->_meta_description = $meta_description;
     }
     public function getMetaDescription(){
        return $this->_meta_description;
     }
     public function setPublic($disable){
        $this->_public = $disable;
     }
     public function getPublic(){
        return $this->_public;
     }
     public function setCreate($createDate){
        $this->_create = $createDate;
     }
     public function getCreate(){
        return $this->_create;
     }
     public function setModified($modifiedDate){
        $this->_modified = $modifiedDate;
     }
     public function getModified(){
        return $this->_modified;
     }
     
     
     public function insertProduct(){
        $sql[] = "INSERT INTO `product`(`category_id`, `title`, `slug`, `images`,";
        $sql[] = " `info`, `price`, `sale_price`, `color`, `size`, `qty`, `meta_title`,";
        $sql[] = " `meta_keyword`, `meta_description`, `publish`, `create`, `modified`)";
        $sql[] = "VALUES('".$this->getCatId()."','".$this->getTitle()."','".$this->getSlug()."',";
        $sql[] = "'".$this->getImage()."','".$this->getInfo()."','".$this->getPrice()."',";
        $sql[] = "'".$this->getSalePrice()."','".$this->getColor()."','".$this->getSize()."',";
        $sql[] = "'".$this->getQty()."','".$this->getMetaTile()."','".$this->getMetaKeyWord()."',";
        $sql[] = "'".$this->getMetaDescription()."','".$this->getPublic()."','".$this->getCreate()."',";
        $sql[] = "'".$this->getModified()."')";
        $sql  = implode(' ',$sql);
        $this->query($sql);
     }
     public function checkProduct($prid=''){
        $sql[] = "SELECT * FROM `product`";
        if($prid != ''){
            $sql[] = "WHERE `title` = '".$this->getTitle()."' AND `product_id` != '{$prid}'";
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
     public function listProduct($start="", $limit=""){
        $sql[] = "SELECT `product_id`,`name`,`title`,`images`,`info`,`price`,`qty`,`publish`";
        $sql[]  = "FROM `product` LEFT JOIN `category` USING(`category_id`)";
        $sql[]  = "ORDER BY `product_id` DESC";
         if($start !="" && $limit!=""){
             $sql[] = "LIMIT {$start},{$limit}";
        }
       
        $sql    = implode(' ',$sql);
        $this->query($sql);
        return $this->fetchAll();
     }
     public function deleteProduct($prid){
        $sql[]  = "DELETE FROM `product`";
        $sql[]  = "WHERE `product_id` = '{$prid}'";
        $sql[]  = "LIMIT 1";
        $sql    = implode(' ',$sql);
        $this->query($sql);
     }
     public function deleteAllProduct($prid){
        $sql[]  = "DELETE FROM `product`";
        $sql[]  = "WHERE `product_id` IN('{$prid}')";
        $sql    = implode(' ',$sql);
     }
     public function getProductById($prid){
        $sql[] = "SELECT * FROM `product`";
        $sql[] = "WHERE `product_id` = '{$prid}'";
        $sql   = implode(' ',$sql);
        $this->query($sql);
        return $this->fetch();
     }   
     public function updateProduct($prid){
        $sql[]  = "UPDATE `product`";
        $sql[]  = "SET `category_id` = '".$this->getCatId()."',`title`='".$this->getTitle()."',";
        $sql[]  = "`slug` = '".$this->getSlug()."',";
        if($this->getImage() != "none"){
             $sql[]  = "`images` = '".$this->getImage()."',`info` = '".$this->getInfo()."',";
        }else{
             $sql[]  = "`info` = '".$this->getInfo()."',";
        }
        $sql[]  = "`price` = '".$this->getPrice()."',`sale_price` = '".$this->getSalePrice()."',";
        $sql[]  = "`color` = '".$this->getColor()."',`size` = '".$this->getSize()."',";
        $sql[]  = "`qty` = '".$this->getQty()."',`meta_title` = '".$this->getMetaTile()."',";
        $sql[]  = "`meta_keyword` = '".$this->getMetaKeyWord()."',";
        $sql[]  = "`meta_description` = '".$this->getMetaDescription()."',";
        $sql[]  = "`publish` = '".$this->getPublic()."',";
        $sql[]  = "`modified` = '".$this->getModified()."'";
        $sql[]  = "WHERE `product_id` = '{$prid}'";
        $sql[]  = "LIMIT 1";
        $sql    = implode(' ',$sql);
        $this->query($sql);
     }
     public function totalProduct(){
        $sql = "SELECT COUNT(*) AS `count` FROM `product`";
        $this->query($sql);
        return $this->fetch();
     }
     
}