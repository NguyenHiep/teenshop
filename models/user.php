<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_User extends Database{
    protected $_groupid;
    protected $_username;
    protected $_password;
    protected $_email;
    protected $_firstname;
    protected $_lastname;
    protected $_address;
    protected $_phonenumber;
    protected $_avatart;
    protected $_nickname;
    protected $_short_instruction;
    protected $_share_facebook;
    protected $_share_google;
    protected $_share_twitter;
    protected $_status;
    
    public function __construct(){
        $this->connect();
        
    }
    public function setGroupId($groupid){
        $this->_groupid = $groupid;
    }
    public function getGroupId(){
        return $this->_groupid;
    }
    public function setUsername($user){
        $this->_username = $user;
    }
    public function getUsername(){
        return $this->_username;
    }
    public function setPassword($pass){
        $this->_password = $pass;
    }
    public function getPassword(){
        return $this->_password;
    }
    public function setEmail($email){
        $this->_email = $email;
    }
    public function getEmail(){
        return $this->_email;
    }
    public function setFirstname($fname){
        $this->_firstname = $fname;
    }
    public function getFirstname(){
        return $this->_firstname;
    }
    public function setLastname($lname){
        $this->_lastname = $lname;
    }
    public function getLastname(){
        return $this->_lastname;
    }
    public function setAddress($address){
        $this->_address = $address;
    }
    public function getAddress(){
        return $this->_address;
    }
    public function setPhone($phone){
        $this->_phonenumber = $phone;
    }
    public function getPhone(){
        return $this->_phonenumber;
    }
    public function setAvatart($avatart){
        $this->_avatart = $avatart;
    }
    public function getAvatart(){
        return $this->_avatart;
    }
    public function setNickname($nickname){
        $this->_nickname = $nickname;
    }
    public function getNickname(){
        return $this->_nickname;
    }
  
    public function setInstruction($instruction){
        $this->_short_instruction = $instruction;
    }
    public function getInstruction(){
        return $this->_short_instruction;
    }
    public function setShareFacebook($facebook){
        $this->_share_facebook = $facebook;
    }
    public function getShareFacebook(){
        return $this->_share_facebook;
    }
    public function setShareGoogle($google){
        $this->_share_google = $google;
    }
    public function getShareGoogle(){
        return $this->_share_google;
    }
    public function setShareTwitter($twitter){
        $this->_share_twitter = $twitter;
    }
    public function getShareTwitter(){
        return $this->_share_twitter;
    }
    public function setStatus($status){
        $this->_status = $status;
    }
    public function getStatus(){
        return $this->_status;
    }
    
    
    public function checkLogin(){
       $sql[] = "SELECT `user_id`,`group_id`,`username`,CONCAT_WS(' ',`firstname`,`lastname`) AS `fullname`";
       $sql[] = "FROM `user`";
       $sql[] = "WHERE `email` = '".$this->getEmail()."' AND `password` = '".$this->getPassword()."'";
       $sql = implode(' ',$sql);
       $this->query($sql);
       return $this->fetch();
    }
    public function insertUser(){
        $sql[] = "INSERT INTO `user`(`group_id`,`username`,`password`,`email`,";
        $sql[] = "`firstname`,`lastname`,`address`,`phone_number`,`avatart`,";
        $sql[] = "`nickname`,`short_instruction`,`share_facebook`,`share_google`,";
        $sql[] = "`share_twitter`,`status`,`created`,`modifiled`)";
        $sql[] = "VALUES('".$this->getGroupId()."','".$this->getUsername()."',";
        $sql[] = "'".$this->getPassword()."','".$this->getEmail()."',";
        $sql[] = "'".$this->getFirstname()."','".$this->getLastname()."',";
        $sql[] = "'".$this->getAddress()."','".$this->getPhone()."',";
        //Bein update attribute
        $sql[] =  "'".$this->getAvatart()."','".$this->getNickname()."',";
        $sql[] =  "'".$this->getInstruction()."','".$this->getShareFacebook()."',";
        $sql[] =  "'".$this->getShareGoogle()."','".$this->getShareTwitter()."',";
        $sql[] =  "'".$this->getStatus()."',";
        //End update attribute
        $sql[] = "'".date('Y-m-d H:m:i')."','".date('Y-m-d H:m:i')."')";
        $sql = implode(' ',$sql);
        $this->query($sql);  
    }
    public function checkUsername($uid =""){
        if($uid != ""){
            $sql[] = "SELECT * FROM `user`";
            $sql[] = "WHERE `username` = '".$this->getUsername()."' AND `user_id` != {$uid}";
        }else{
            $sql[] = "SELECT * FROM `user`";
            $sql[] = "WHERE `username` = '".$this->getUsername()."'";
        }
        $sql    = implode(' ',$sql);
        $this->query($sql);
        if($this->num_rows() ==0){
            return true;
        }else{
            return false;
        }
    }
 
    public function getUserByid($uid){
        $sql[] = "SELECT * FROM `user`";
        $sql[] = "WHERE `user_id` = '{$uid}'";
        $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetch();
    }
    public function updateUser($id){
       
        $sql[] = "UPDATE `user`";
        if($this->getPassword() != "none"){
            $sql[] = "SET `group_id` = '".$this->getGroupId()."',`username` = '".$this->getUsername()."', `password` = '".$this->getPassword()."',";
        }else{
            $sql[] = "SET `group_id` = '".$this->getGroupId()."',`username` = '".$this->getUsername()."',";
        }
        $sql[] = "`email` = '".$this->getEmail()."',`firstname` = '".$this->getFirstname()."', `lastname` = '".$this->getLastname()."',";
        $sql[] = " `address` = '".$this->getAddress()."', `phone_number` = '".$this->getPhone()."',";
        //Begin update attribute
        if($this->getAvatart() != "none" && $this->getAvatart() != NULL){
            $sql[] = "`avatart` = '".$this->getAvatart()."',";
        }    
        $sql[] = "`nickname` = '".$this->getNickname()."',`short_instruction` = '".$this->getInstruction()."', `share_facebook` = '".$this->getShareFacebook()."',";
        $sql[] = " `share_google` = '".$this->getShareGoogle()."', `share_twitter` = '".$this->getShareTwitter()."',`status` = '".$this->getStatus()."',";
        
        //End update attribute
        $sql[] = "`modifiled` = '".date('Y-m-d H:m:i')."'";
        $sql[] = "WHERE `user_id` = '{$id}'";
        $sql[] = "LIMIT 1";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    
    //Get info user page home
    public function getUserPageHome(){
        $sql[] = "SELECT * FROM `user`";
        $sql[] = "WHERE `user_id` = '1'";
        $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetch();
    }
    
    
}
















