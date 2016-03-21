<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "detail":
                require_once "controllers/bloghome/blog-detail.php";
                break;
            case "list":
                require_once "controllers/bloghome/blog.php";
                break;
            case "cate":
                require_once "controllers/bloghome/blog-cate.php";
                break;                       
        }
    }else{
    require_once "controllers/bloghome/blog.php";
}
   
