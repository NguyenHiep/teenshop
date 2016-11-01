<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_Comment extends Database{
    
    private $_id;
	private $_author;
    private $_email;
    private $_comment;
    private $_parent_id;
    private $_post_id;
    private $_accepted;
    
         
    public function __construct(){
        $this->connect();
    }
    public function setAuthor($author){
        $this->_author = $author;
    }
    public function getAuthor(){
        return $this->_author;
    }
    public function setEmail($email){
        $this->_email = $email;
    }
    public function getEmail(){
        return $this->_email;
    }
    public function setComment($comment){
        $this->_comment = $comment;
    }
    public function getComment(){
        return $this->_comment;
    }
    public function setParentId($parent_id){
        $this->_parent_id = $parent_id;
    }
    public function getParentId(){
        return $this->_parent_id;
    }
    public function setPostId($post_id){
        $this->_post_id = $post_id;
    }
    public function getPostId(){
        return $this->_post_id;
    }
    public function setAccepted($accepted){
        $this->_accepted = $accepted;
    }
    public function getAccepted(){
        return $this->_accepted;
    }
    public function  getComments(){
        $sql[] = "SELECT * ";
        $sql[] = "FROM `comments`";
        $sql[] = "WHERE  `accepted` =  '1' ";
        $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetchAll();
    }   
    
    /*
        This private function checks whether there are any comment whose parent_id is the same as its.
       If there's any such comment, it again executes the same function.
    */
    public function hierarchy(){
        
    }

    public function get_gravatar(){
        
    }
    //Form displat when reaply
    public function form(){
        
    }
    
    //Validation
    public function comments(){
        $sql[] = "INSERT INTO `comments`(`id`, `author`, `email`, `comment`, `created_at`, `parent_id`, `post_id`, `accepted`)";
        $sql[] = "VALUES()";
        
    }
    
    //show error when submit
    public function show_errors(){
        
    }
}