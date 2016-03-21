<?php
if(isset($_GET['catid']) && validate_int($_GET['catid']) == true && $_GET['catid'] >0){
    $catid = $_GET['catid'];
        $mcate = new Model_Cate();
        $data = $mcate->getCateById($catid);
        $pathImage =  '../uploads/category/'.$data['bgimage'];
        if(file_exists($pathImage)){
          unlink($pathImage);
        }
                
        $mcate->deleteCate($catid);
        redirect(BASE_ADMIN.'/cate/list');
   
}else{
     redirect(BASE_ADMIN.'/cate/list');
}