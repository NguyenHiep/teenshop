<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "add":
            require "controllers/product/add.php";
            break;
            case "list":
            require "controllers/product/list.php";
            break;
            case "edit":
            require "controllers/product/edit.php";
            break;
            case "del":
            require "controllers/product/del.php";
            break;
        }
    }else{
        require "controllers/product/list.php";
    }
?>