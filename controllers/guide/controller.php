<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "contact":
                require_once "controllers/guide/contact.php";
                break;
            case "guide":
                require_once "controllers/guide/guide.php";
                break;
            default:  require_once "controllers/guide/contact.php";               
        }
    }else{
    require_once "controllers/guide/contact.php";
}
   
