<?php

    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "detail":
                require_once "controllers/product/detail.php";
                break;
            case "cate":
                require_once "controllers/product/product-cate.php";
                break;                      
        }
    }
   