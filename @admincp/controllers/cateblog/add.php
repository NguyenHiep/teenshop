<?php
    if(isset($_POST['btnOK'])){
        $error = array();
        if(!empty($_POST['txtCate'])){
            $catename = fix_str($_POST['txtCate']);
       }else{
            $error[] = "Vui lòng nhập tên chuyên mục";
       }
       if(!empty($_POST['txtCateSlug'])){
            $slug = unicode_str_filter($_POST['txtCateSlug']);
       }else{
            $slug = "none";
       }

        $status             = intval($_POST['status']);
        $position           = intval($_POST['position']);
        $metakeyword        = fix_str($_POST['txtMetakeyword']);
        $metadiscription    = fix_str($_POST['txtMetadescription']);
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
            $mcateblog = new Model_CateBlog();
            $mcateblog->setCateName($catename);
            if($slug != "none"){
                $mcateblog->setSlug($slug);
            }else{
                $mcateblog->setSlug(unicode_str_filter($catename));
            }
            $mcateblog->setStatus($status);
            $mcateblog->setPosition($position);
            $mcateblog->setMetakeyword($metakeyword);
            $mcateblog->setMetaDescription($metadiscription);
            $mcateblog->setImage($imagecate);
            if($mcateblog->checkCateBlog() == true){
                $mcateblog->insertCateBlog();
                redirect(BASE_ADMIN.'/cateblog/list');
            }else{
                $error[] = "Tên chuyên mục đã tồn tại, bạn vui lòng chọn tên khác";
            }
       }      
    }
    $title = "Thêm mới blog";
    require_once "views/cateblog/add_view.php";