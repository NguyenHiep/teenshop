<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_Blog extends Database{
    protected $_blog_id;
    protected $_user_id;
    protected $_cat_id;
    protected $_blog_name;
    protected $_slug;
    protected $_meta_keyword;
    protected $_meta_description;
    protected $_shortcontent;
    protected $_content;
    protected $_status;
    protected $_view_post;
    protected $_hightlight;
    protected $_post_on;
    protected $_image;
    
    //Be gin khai bao thuoc tinh
    public function __construct(){
        $this->connect();
    }
    
    public function setBlogId($blogid){
        $this->_blog_id = $blogid;
    }
    public function getBlogId(){
        return $this->_blog_id;
    }
    
    public function setUserId($userid){
        $this->_user_id = $userid;
    }
    public function getUserId(){
        return $this->_user_id;
    }
    public function setCatId($catid){
        $this->_cat_id = $catid;
    }
    public function getCatId(){
        return $this->_cat_id;
    }
    
    public function setBlogName($blogname){
        $this->_blog_name = $blogname;
    }
    public function getBlogName(){
        return $this->_blog_name;
    }
    public function setSlug($slug){
        $this->_slug = $slug;
    }
    public function getSlug(){
        return $this->_slug;
    }
    public function setMetakeyword($keyword){
        $this->_meta_keyword = $keyword;
    }
    public function getMetakeyword(){
        return $this->_meta_keyword;
    }
    public function setMetaDescription($description){
        $this->_meta_description = $description;
    }
    public function getMetaDescription(){
        return $this->_meta_description;
    }
    public function setShortContent($shortcontent){
        $this->_shortcontent = $shortcontent;
    }
    public function getShortContent(){
        return $this->_shortcontent;
    }
    
    public function setContent($content){
        $this->_content = $content;
    }
    public function getContent(){
        return $this->_content;
    }
    public function setStatus($status){
        $this->_status = $status;
    }
    public function getStatus(){
        return $this->_status;
    }
    public function setViewPost($viewpost){
        $this->_view_post = $viewpost;
    }
    public function getViewPost(){
        return $this->_view_post;
    }
    public function setHightLight($hightlight){
        $this->_hightlight = $hightlight;
    }
    public function getHightLight(){
        return $this->_hightlight;
    }
    public function setPostOn($poston){
        $this->_post_on = $poston;
    }
    public function getPostOn(){
        return $this->_post_on;
    }
    
    
    public function setImage($image){
        $this->_image = $image;
    }
    public function getImage(){
        return $this->_image;
    }
    //End khai bao thuoc tinh
    
    
    public function insertBlog(){
        $sql[] = "INSERT INTO `blog`(`user_id`,`cat_id`,`blog_name`,`slug`,`meta_keyword`,`meta_description`,`short_content`,`content`,`status`,`view_post`,`hightlight`,`post_on`,`image`)";
        $sql[] = "VALUES('".$this->getUserId()."','";
        $sql[] = $this->getCatId()."','".$this->getBlogName()."','";
        $sql[] = $this->getSlug()."','".$this->getMetakeyword()."','";
        $sql[] = $this->getMetaDescription()."','";
        $sql[] = $this->getShortContent()."','".$this->getContent()."','";
        $sql[] = $this->getStatus()."','".$this->getViewPost()."','";
        $sql[] = $this->getHightLight()."','".$this->getPostOn()."','";
        $sql[] = $this->getImage()."')";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function checkBlog($blogid=""){
        $sql[] = "SELECT * FROM `blog`";
        if($blogid !=""){
            $sql[] = "WHERE `blog_name` = '".$this->getBlogName()."' AND `blog_id` != '{$blogid}'";
        }else{
            $sql[] = "WHERE `blog_name  ` = '".$this->getBlogName()."'";
        }
        $sql = implode(' ',$sql);
        $this->query($sql);
        if($this->num_rows() == 0){
            return true;
        }else{
            return false;
        }
    }
    public function listBlog($start="",$limit="",$column = "blog_id", $userid = ""){
        $sql[] = "SELECT bl.*, cat.slug AS slugcat, cat.cat_name";
        $sql[] = "FROM `blog` AS bl LEFT JOIN `cateblog` AS cat USING(cat_id)";
        if($userid != ""){
            $sql[] = "WHERE bl.user_id = '{$userid}'";
        }
         
        $sql[] = "ORDER BY bl.`{$column}` DESC";
        $sql[] = "LIMIT {$start},{$limit}";
        $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetchAll();
    }
    public function deleteBlog($blogid){
        $sql[] = "DELETE FROM `blog`";
        $sql[] = "WHERE `blog_id` = '{$blogid}'";
        $sql[] = "LIMIT 1";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function deleteAllBlog($blogid){
        
    }
    public function getBlogById($blogid){
        $sql[] = "SELECT * FROM `blog`";
        $sql[] = "WHERE `blog_id` = '{$blogid}'";
        $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetch();
    }
    public function updateBlog($blogid){
        $sql[] = "UPDATE `blog` SET `cat_id` = '".$this->getCatId()."', `blog_name` = '".$this->getBlogName()."',";
        $sql[] = "`slug` = '".$this->getSlug()."',";
        $sql[] = "`meta_keyword` = '".$this->getMetakeyword()."',";
        $sql[] = "`meta_description` = '".$this->getMetaDescription()."',";
        $sql[] = "`short_content` = '".$this->getShortContent()."',";
        $sql[] = "`content` = '".$this->getContent()."',";
        $sql[] = "`status` = '".$this->getStatus()."',";
        $sql[] = "`view_post` = '".$this->getViewPost()."',";
        $sql[] = "`hightlight` = '".$this->getHightLight()."',";
        //Xet truong hop upload hinh anh
        if($this->getImage() !="none" && $this->getImage() != NULL){
            $sql[] = "`image` = '".$this->getImage()."',";
        }
        $sql[] = "`post_on` = '".$this->getPostOn()."'";
        $sql[] = "WHERE `blog_id` = '{$blogid}'";
        $sql[] = "LIMIT 1";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function totalBlog($userid=""){
        $sql[] = "SELECT COUNT(*) AS `count`";
        $sql[] = "FROM `blog`";
        if($userid != ""){
             $sql[] = "WHERE user_id = '{$userid}'";
        }
        $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetch();
    }
    public function findBlog($title, $start="",$limit="", $userid = ""){
        $sql[] = "SELECT * FROM `blog`";
        if($userid != ""){
            $sql[] = "WHERE user_id = '{$userid}' AND blog_name LIKE '%{$title}%'";
        }else{
            $sql[] = "WHERE blog_name LIKE '%{$title}%' ";
        }
        $sql[] = "ORDER BY `blog_id` DESC";
        $sql[] = "LIMIT {$start},{$limit}";
        $sql = implode(' ',$sql);
        
        $this->query($sql);
        return $this->fetchAll();
    }
    
    public function totalFind($title,$userid = ""){
        $sql[] = "SELECT COUNT(*) AS `count`";
        $sql[] = "FROM `blog`";
        if($userid != ""){
            $sql[] = "WHERE user_id = '{$userid}' AND blog_name LIKE '%{$title}%'";
        }else{
            $sql[] = "WHERE blog_name LIKE '%{$title}%' ";
        }
        $sql[] = "ORDER BY `blog_id` DESC";
        $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetch();
    }
    //Begin ajax
    public function ajaxBlog($type){
        /*
        Neu type la hightlight => update hightlight
        
        Nguoc lai neu type la delete => xoa bai viet
        
        Nguoc lai neu type la an => update status
        
        Nguoc lai type la hien => update status
        
        */
        if($type == "hightlight"){
            $sql = "UPDATE blog SET hightlight= '".$this->getHightLight()."' WHERE blog_id = '".$this->getBlogId()."' LIMIT 1";
        }elseif($type == "delete"){
            $sql = "DELETE FROM blog WHERE blog_id = '".$this->getBlogId()."' LIMIT 1";
        }elseif($type == "status"){
            $sql = " UPDATE blog SET status = '".$this->getStatus()."' WHERE blog_id ='".$this->getBlogId()."' LIMIT 1";
        }else{
            return 0;
        }
        $result = $this->query($sql);
    }
}