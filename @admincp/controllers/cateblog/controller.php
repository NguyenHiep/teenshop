<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "add":
                require_once "controllers/cateblog/add.php";
                break;
            case "edit":
                require_once "controllers/cateblog/edit.php";
                break;
            case "del":
                require_once "controllers/cateblog/del.php";
                break;
            case "list":
                require_once "controllers/cateblog/list.php";
                break; 
            default:
                require_once "controllers/cateblog/list.php";   
        }
    }else{
        require_once "controllers/cateblog/list.php";
    }
    
?>