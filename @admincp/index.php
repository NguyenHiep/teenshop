<?php
#error_reporting(E_ALL & ~E_NOTICE);
#error_reporting(0);
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require "../libraries/functions.php";
require "../libraries/config.php";
require "../libraries/class.php";
require "../libraries/upload.php";
require "../libraries/pagination-admin.php";
//author_admin();
if(check_login() == true){
    $base_uri = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(isset($_GET['controller'])){
           if(author_admin() == true){
                switch($_GET['controller']){
                case 'slider':
                require "controllers/slider/controller.php";
                break;
                case 'ajax':
                require "controllers/ajax/controller.php";
                break;
                case 'user':
                require "controllers/user/controller.php";
                break;
                case 'cateblog':
                require "controllers/cateblog/controller.php";
                break;
                case 'blog':
                require "controllers/blog/controller.php";
                break;
                case 'comment':
                require "controllers/comments/controller.php";
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
        if(author_admin() == true)
            require "controllers/main.php";
        else
            require "controllers/blog/controller.php";
    }
}else{
     redirect($baseurl.'login.html');
}

?>