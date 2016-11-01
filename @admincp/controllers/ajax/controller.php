<?php
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "listuser":
            require "controllers/ajax/list_user.php";
            break;
           //Begin list blog 
            case "blog":
                require "controllers/ajax/blog_ajax.php";
        }
    }

?>