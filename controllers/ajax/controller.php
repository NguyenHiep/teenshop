<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "productdetail":
                require "controllers/ajax/product-detail.php";
                break;
            case "review":
                require "controllers/ajax/review.php";
                break;
            case "blog":
                require "controllers/ajax/list-blog.php";
                break;
            case "listpagehome":
                require "controllers/ajax/getdata-blog.php";
                break;
            case "contenttabs":
                require "controllers/ajax/content-tabs.php";
                break;
        }
    }else{
        redirect(BASE_URL);
    }

?>