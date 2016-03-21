<?php

if(isset($_POST['btnOK'])){
        $error = array();
       if(!empty($_POST['txtCate'])){
            $catname = fix_str($_POST['txtCate']);
       }else{
            $error[] = "Vui lòng nhập tên chuyên mục";
       }
       if(!empty($_POST['txtCateSlug'])){
            $slug = unicode_str_filter($_POST['txtCateSlug']);
       }else{
            $slug = "none";
       }
       if(!empty($_POST['txtDesscription'])){
            $description = fix_str($_POST['txtDesscription']);
       }else{
            $description = "";
       }
       $status      = intval($_POST['status']);
       $position    = intval($_POST['position']);
       $parentid    = intval($_POST['parentid']);
       if(empty($error)){
            //Upload image category
            if($_FILES['txtImage']['name'] !=NULL){
                $uimage = new Upload($_FILES['txtImage']);
                $uimage->setPath('../uploads/category/');
                if($uimage->do_upload() == true){
                    $imagecate = $uimage->getName();
                }else{
                    $error[] = $uimage->error;
                }    
            }else{
                $imagecate = "none";
            }
            $mcate = new Model_Cate();
            $mcate->setCateName($catname);
            if($slug != "none"){
                $mcate->setSlug($slug);
            }else{
                $mcate->setSlug(unicode_str_filter($catname));
            }
            $mcate->setDesscription($description);
            $mcate->setStatus($status);
            $mcate->setPosition($position);
            $mcate->setParentId($parentid);
            $mcate->setImage($imagecate);
            if($mcate->checkCate() == true){
                $mcate->insertCate();
                redirect(BASE_ADMIN.'/cate/list');
            }else{
                $error[] = "Tên chuyên mục đã tồn tại, bạn vui lòng chọn tên khác";
            }
       }    
}
    
$title = "Thêm mới chuyên mục";
require "views/cate/add_view.php";