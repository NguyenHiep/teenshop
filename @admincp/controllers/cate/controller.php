<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "add":
            require "controllers/cate/add.php";
            break;
            case "list":
            require "controllers/cate/list.php";
            break;
            case "edit":
            require "controllers/cate/edit.php";
            break;
            case "del":
            require "controllers/cate/del.php";
            break;
        }
    }else{
        require "controllers/cate/list.php";
    }

?>