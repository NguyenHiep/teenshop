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
        }
    }

?>