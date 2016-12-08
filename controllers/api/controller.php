<?php
$_SESSION['oauth_token'] = '@gianhit.com';
if(!@$_SESSION['oauth_token']){
        echo "Eror oauth: Inval oauth token";
        die();
    }
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "blog":
                require_once "controllers/api/v1/blog/controller.php";
                break;                   
        }
    }else{
    //require_once "controllers/api/v1/blog.php";
}
   
