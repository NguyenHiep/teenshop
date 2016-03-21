<?php

class Upload{
    protected $_name;
    protected $_tmp;
    protected $_size;
    protected $_type;
    protected $_path="uploads/";
    public $error = array();
    public function __construct($data){
        $this->setName($data['name']);
        $this->setTmp($data['tmp_name']);
        $this->setType($data['type']);
        $this->setSize($data['size']);
    }
    public function setName($name){
        $this->_name = $name;
    } 
    public function getName(){
        return $this->_name;       
    }
    public function setTmp($tmp){
        $this->_tmp = $tmp;
    }
    public function getTmp(){
        return $this->_tmp;
    }
    public function setSize($size){
        $this->_size = $size;
    }
    public function getSize(){
        return $this->_size;
    }
    public function setType($type){
        $this->_type = $type;
    }
    public function getType(){
        return $this->_type;
    }
    public function setPath($path){
        $this->_path = $path;
    }
    public function getPath(){
        return $this->_path;
    }
    
    public function checkSize(){
        //3145728 = 5*1024*1024 = 5mb
        if($this->getSize() > 3145728){
           $this->error = "Dung lượng ảnh quá lớn";
           return false;
        }
        return true; 
    }
    public function checkFormatImage(){
        if($this->getType()== "image/jpg" || $this->getType() == "image/jpeg" || $this->getType() == "image/png"){
            return true;
        }
        $this->error = "Định dạng ảnh không hợp lệ";
        return false;
        
    }
    public function checkFileExist(){
        $pathFile = $this->getPath().$this->getName();
        if(file_exists($pathFile)){
            $this->error = "Ảnh đã tồn tại, vui lòng chọn ảnh khác";
            return false;
        }
        return true;
    }
    public function do_upload(){
        if($this->getName() == ""){
            $this->error = "Vui lòng chọn ảnh upload";
        }
        if($this->getName()!= "" && $this->checkSize() == true && $this->checkFormatImage() == true && $this->checkFileExist() == true){
            move_uploaded_file($this->getTmp(),$this->getPath().$this->getName());
            return true;
        }else{
            return false;
        }
    }
}