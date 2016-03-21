<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "add":
                require_once "controllers/blog/add.php";
                break;
            case "edit":
                require_once "controllers/blog/edit.php";
                break;
            case "del":
                require_once "controllers/blog/del.php";
                break;
            case "list":
                require_once "controllers/blog/list.php";
                break;
            case "search":
                require_once "controllers/blog/search.php";
                break;  
            default:
                require_once "controllers/blog/list.php";   
        }
    }else{
        require_once "controllers/blog/list.php";
    }
    
?>