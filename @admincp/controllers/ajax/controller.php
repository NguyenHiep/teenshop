<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "listuser":
            require "controllers/ajax/list_user.php";
            break;
            
        }
    }

?>