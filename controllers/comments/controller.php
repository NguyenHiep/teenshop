<?php
if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'comment':
            require_once "controllers/comments/comment.php";
            break;
    }
}else{
    require_once "controllers/comments/comment.php";
}