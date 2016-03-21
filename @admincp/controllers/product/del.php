<?php

if(isset($_GET['prid']) && validate_int($_GET['prid']) == true && $_GET['prid'] >0){
    $prid = $_GET['prid'];
    $mproduct = new Model_Product();
    $data = $mproduct->getProductById($prid);
    
    if(file_exists($data['images'])){
        unlink($data['images']);
    }
    
    $mproduct->deleteProduct($prid);
    redirect(BASE_ADMIN.'/product/list');
    
}else{
     redirect(BASE_ADMIN.'/product/list');
}