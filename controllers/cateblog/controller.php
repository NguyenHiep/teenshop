<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "list":
                require_once "controllers/cateblog/cate-blog.php";
                break;              
        }
    }else{
    require_once "controllers/cateblog/cate-blog.php";
}
   
