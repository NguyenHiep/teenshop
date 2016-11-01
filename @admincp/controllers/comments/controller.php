<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "list":
            require "controllers/comments/list.php";
            break;
            case "edit":
            require "controllers/comments/edit.php";
            break;
            case "del":
            require "controllers/comments/del.php";
            break;
        }
    }else{
        require "controllers/comments/list.php";
    }
?>