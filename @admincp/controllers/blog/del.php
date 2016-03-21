<?php
if(isset($_GET['catid']) && validate_int($_GET['catid']) == true && $_GET['catid'] >0){
        $blogid = $_GET['catid'];
        $mblog = new Model_Blog();
        $data = $mblog->getBlogById($blogid);
        $pathImage =  $_SERVER['DOCUMENT_ROOT'].'/uploads/blog/'.$data['image'];
        if(file_exists($pathImage)){
          unlink($pathImage);
        }
                
        $mblog->deleteBlog($blogid);
        redirect(BASE_ADMIN.'/blog/list');
   
}else{
     redirect(BASE_ADMIN.'/blog/list');
}