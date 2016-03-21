<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "login":
                require_once "controllers/custommer/guide-contact.php";
                break;
            case "register":
                require_once "controllers/custommer/guide-contact.php";
                break;                
        }
    }else{
    require_once "controllers/custommer/guide-contact.php";
}
   
