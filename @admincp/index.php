<?php
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require "../config.php";
require "../libraries/class.php";
require "../libraries/functions.php";
require "../libraries/upload.php";
//author_admin();
if(check_login() == true){
    $base_uri = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(isset($_GET['controller'])){
           if(author_admin() == true){
                switch($_GET['controller']){
                case 'order':
                require "controllers/order/controller.php";
                break;
                case 'slider':
                require "controllers/slider/controller.php";
                break;
                case 'ajax':
                require "controllers/ajax/controller.php";
                break;
                case 'user':
                require "controllers/user/controller.php";
                break;
                case 'cate':
                require "controllers/cate/controller.php";
                break;
                case 'product':
                require "controllers/product/controller.php";
                break;
                case 'cateblog':
                require "controllers/cateblog/controller.php";
                break;
                case 'blog':
                require "controllers/blog/controller.php";
                break;
            }
        }else{
             switch($_GET['controller']){
                case 'blog':
                require "controllers/blog/controller.php";
                break;
             }
        }
        
    }else{
        require "controllers/main.php";
    }
}else{
     redirect($baseurl.'login.html');
}

?>