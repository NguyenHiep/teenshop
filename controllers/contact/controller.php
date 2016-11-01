<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "add":
                require_once "controllers/comments/blog-detail.php";
                break;
            case "list":
                require_once "controllers/comments/blog.php";
                break;
            case "cate":
                require_once "controllers/comments/blog-cate.php";
                break;                       
        }
    }else{
    require_once "controllers/comments/blog.php";
}
   
