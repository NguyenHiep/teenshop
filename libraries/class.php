<?php
class Database {
    protected $_hostname = "localhost";
    protected $_userhost = "root";
    protected $_passhost = "";
    protected $_dbname = "giadinhit_mvc";
    protected $_conn;
    protected $_result;
    
    public function connect(){
        $this->_conn = mysqli_connect($this->_hostname, $this->_userhost,$this->_passhost, $this->_dbname);
        mysqli_query($this->_conn, "SET NAMES 'UTF-8'");
        mysqli_set_charset($this->_conn, 'SET CHARACTER SET utf8');
    }
    
    public function disconnect(){
        if($this->_conn){
            mysqli_close($this->_conn);
        }
    }
    
    public function query($sql){
        $this->_result = mysqli_query($this->_conn, $sql);
    }
    
    public function num_rows(){
        if($this->_result){
            $row = mysqli_num_rows($this->_result);
        }else{
            $row = 0;
        }
        return $row;
    }
    
    public function fetch(){
        if($this->_result){
            $row = mysqli_fetch_assoc($this->_result);
        }else{
            $row = 0;
        }
        return $row;
    }
    
    public function fetchAll(){
        if($this->_result){
            if($this->num_rows() >0){
                while($row = $this->fetch()){
                    $data[] = $row;
                }
            }else{
                $data = 0;
            }
            
        }else{
            $data = 0;
        }
        return $data;
    }
}