<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "login":
                require_once "controllers/user/login.php";
                break;
            case "logout":
                require_once "controllers/user/logout.php";
                break;
            case "register":
                require_once "controllers/user/register.php";
                break;
            case "profile":
                require_once "controllers/user/profile.php";
                break;                       
        }
    }else{
    require_once "controllers/user/login.php";
}
   
