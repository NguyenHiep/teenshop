<?php
if(isset($_POST['btnAction'])){
   
   $idComment = implode(',', $_POST['comment']);
   $mComment = new Model_Comments();
   if($_POST['actionMethod'] == 'hide'){
    $mComment->hideComments($idComment);
    
   }elseif($_POST['actionMethod'] == 'show'){
    $mComment->showComments($idComment);
   }elseif($_POST['actionMethod'] == 'del'){
    $mComment->deleteComments($idComment);
   }
   redirect($_SERVER['HTTP_REFERER']);
}