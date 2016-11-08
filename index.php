<?php
session_start();
//error_reporting(E_ALL & ~E_NOTICE);
//error_reporting(0);

/*
$url = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $url);
$file = $break[count($break) - 1];
$cachefile = 'cached-'.substr_replace($file ,"",-4).'.html';
$cachetime = 18000;
 
// Serve from the cache if it is younger than $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->";
    include($cachefile);
    exit;
}
*/
ob_start(); // Start the output buffer
date_default_timezone_set('Asia/Ho_Chi_Minh');
//Required file postion default
require_once "libraries/functions.php";
require_once "libraries/config.php";
require_once "libraries/class.php";
require_once "libraries/pagination.php";
require_once "libraries/pagination-cate.php";
require_once "libraries/pagination-home.php";

if(isset($_GET['controller'])){
    switch($_GET['controller']){
            case 'ajax':
                require "controllers/ajax/controller.php";
                break;
            case 'cart':
                require "controllers/cart/controller.php";
                break;
            case 'cate':
                require "controllers/cate/controller.php";
                break;
            case 'contact':
                require "controllers/contact/controller.php";
                break;
            case 'custommer':
                require "controllers/custommer/controller.php";
                break;
            case 'guide':
                require "controllers/guide/controller.php";
                break;
            case 'home':
                require "controllers/home/controller.php";
                break;
            case 'order':
                require "controllers/order/controller.php";
                break;
            case 'product':
                require "controllers/product/controller.php";
                break;
            case 'search':
                require "controllers/search/controller.php";
                break;
            case 'user':
                require "controllers/user/controller.php";
                break;
            // Begin blog page
            case 'blog':
                require "controllers/bloghome/controller.php";
                break;
            case 'cateblog':
                require "controllers/cateblog/controller.php";
                break;
            case '404':
                require "controllers/404/controller.php";
                break;
            case '500':
                require "controllers/500/controller.php";
                break;
    }
}else{
    require_once "controllers/defaultblog/controller.php";
}
//Buttom cached
// Cache the contents to a file
/*
$cached = fopen($cachefile, 'w');
fwrite($cached, ob_get_contents());
fclose($cached);
*/
ob_end_flush(); // Send the output to the browser
