<?php
if(isset($_GET['catid']) && validate_int($_GET['catid']) && $_GET['catid'] > 0){
    $catid = intval($_GET['catid']);
    $mcate = new Model_Cate();
    $data = $mcate->getCateById($catid);
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
            
                $mcate->setCateName($catname);
                if($slug != "none"){
                    $mcate->setSlug($slug);
                }else{
                    $mcate->setSlug(unicode_str_filter($catname));
                }
                //Upload image category
                           
                $mcate->setDesscription($description);
                $mcate->setStatus($status);
                $mcate->setPosition($position);
                $mcate->setParentId($parentid);
                $mcate->setImage($imagecate);
                if($mcate->checkCate($catid) == true){
                    $mcate->updateCate($catid);
                    redirect(BASE_ADMIN.'/cate/list');
                }else{
                    $error[] = "Tên chuyên mục đã tồn tại, bạn vui lòng chọn tên khác";
                }
           }
    }

    $title = "Cập nhật chuyên mục";
    require "views/cate/edit_view.php";
}else{
    redirect(BASE_ADMIN.'/cate/list');
}

