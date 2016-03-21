<?php
if(isset($_GET['catid']) && validate_int($_GET['catid']) == true && $_GET['catid'] >0){
        $catid = $_GET['catid'];
        $mcateblog = new Model_CateBlog();
        $data = $mcateblog->getCateBogById($catid);
        $pathImage =  $_SERVER['DOCUMENT_ROOT'].'/uploads/category/'.$data['image'];
        if(file_exists($pathImage)){
          unlink($pathImage);
        }
                
        $mcateblog->deleteCateBlog($catid);
        redirect(BASE_ADMIN.'/cateblog/list');
   
}else{
     redirect(BASE_ADMIN.'/cateblog/list');
}