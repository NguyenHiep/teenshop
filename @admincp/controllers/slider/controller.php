<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "add":
            require "controllers/slider/add.php";
            break;
            case "list":
            require "controllers/slider/list.php";
            break;
            case "edit":
            require "controllers/slider/edit.php";
            break;
            case "del":
            require "controllers/slider/del.php";
            break;
        }
    }else{
        require "controllers/slider/list.php";
    }
?>