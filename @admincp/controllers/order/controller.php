<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "add":
            require "controllers/order/add.php";
            break;
            case "list":
            require "controllers/order/list.php";
            break;
            case "edit":
            require "controllers/order/edit.php";
            break;
            case "del":
            require "controllers/order/del.php";
            break;
        }
    }else{
        require "controllers/order/list.php";
    }
?>