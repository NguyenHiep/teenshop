<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_Comments extends Database{
     //Begin khai bao thuoc tinh
    public function __construct(){
        $this->connect();
    }
    
    public function getAllComments($start="",$limit=""){
        $sql[] = "SELECT * FROM comments";
        if(!is_null($start) && !is_null($limit))
            $sql[] = "LIMIT {$start},{$limit}";
        $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetchAll();
    }
    
    public function getTotalComment(){
        $sql[] = "SELECT COUNT(*) AS count";
        $sql[] = "FROM comments";
        $sql = implode(' ',$sql);
        $this->query($sql);
        return $this->fetch();
    }
    public function showComments($id){
        $sql[] = "UPDATE comments SET ";
        $sql[] = "accepted = 1 AND id IN({$id})";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function hideComments($id){
        $sql[] = "UPDATE comments SET ";
        $sql[] = "accepted = 0 AND id IN({$id})";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
    public function deleteComments($id){
        $sql[] = "DELETE FROM comments ";
        $sql[] = "WHERE id IN({$id})";
        $sql = implode(' ',$sql);
        $this->query($sql);
    }
        
}