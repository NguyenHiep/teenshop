<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "blog":
                require_once "controllers/api/blog.php";
                break;                   
        }
    }else{
    require_once "controllers/api/blog.php";
}
   
