<?php
if(isset($_GET['catid']) && validate_int($_GET['catid']) == true && $_GET['catid'] > 0){
    $blogid      = intval($_GET['catid']);
    $mblog      = new Model_Blog();
    $data       = $mblog->getBlogById($blogid);
    $mcateblog  = new Model_CateBlog();
    $cat_id = $mcateblog->listCateBlog(null,null);
      if(isset($_POST['btnOK'])){
       $error           = array();
       $user_id         =  $_SESSION['ses_userid'];
       if(isset($_POST['txtcatId']) && $_POST['txtcatId'] >0){
            $cat_id     = intval($_POST['txtcatId']);
       }else{
        $error[]        = "Vui lòng chọn chuyên mục";
       }
        if(!empty($_POST['txtTitle'])){
            $blogname   = fix_str($_POST['txtTitle']);
       }else{
            $error[]    = "Vui lòng nhập tên cho bài viết";
       }
       if(!empty($_POST['txtSlug'])){
            $slug       = unicode_str_filter($_POST['txtSlug']);
       }else{
            $slug       = "none";
       }
       $keyword         = fix_str($_POST['txtKeyword']);
       $description     = fix_str($_POST['txtDescription']);
        if(!empty($_POST['txtShortContent'])){
            $shortcontent    = fix_content(trim($_POST['txtShortContent']));
       }else{
            $error[]    = "Vui lòng nhập mô tả cho bài viết";
       }
       
       if(!empty($_POST['txtContent'])){
            $content    = fix_content(trim($_POST['txtContent']));
       }else{
            $error[]    = "Vui lòng nhập nội dung cho bài viết";
       }
       $status          = intval($_POST['status']);
       $view_post       = intval($_POST['txtViewPost']);
       
       if(isset($_POST['txtHightlight'])){
            $hightlight = 1;
       }else{
            $hightlight = 0;
       }
      $post_on = date('Y-m-d H:m:i');
       if(empty($error)){
        //Upload image blog
           /* if($_FILES['txtImage']['name'] !=NULL){
                $uimage = new Upload($_FILES['txtImage']);
                $uimage->setPath('../uploads/blog/');
                if($uimage->do_upload() == true){
                    $imageblog = $uimage->getName();
                }else{
                    $error[] = $uimage->error;
                }    
            }else{
                $imageblog = "none";
            }
            */
            if($_POST['txtImage'] != ""){
                $imageblog = $_POST['txtImage'];
            }else{
                $imageblog = "none";
            }
          $mblog->setUserId($user_id);
          $mblog->setCatId($cat_id);
          $mblog->setBlogName($blogname);
           if($slug != "none"){
                $mblog->setSlug($slug);
            }else{
                $mblog->setSlug(unicode_str_filter($blogname));
            }
          $mblog->setMetakeyword($keyword);
          $mblog->setMetaDescription($description);
          $mblog->setShortContent($shortcontent);
          $mblog->setContent($content);
          $mblog->setStatus($status);
          $mblog->setViewPost($view_post);
          $mblog->setHightLight($hightlight);
          $mblog->setPostOn($post_on);
          $mblog->setImage($imageblog);
            if($mblog->checkBlog($blogid) == true){
                $mblog->updateBlog($blogid);
                redirect(BASE_ADMIN.'/blog/list');
            }else{
                $error[] = "Tên blog đã tồn tại, bạn vui lòng chọn tên khác";
            } 
       } //End if empty
        
    } //End if(isset($_POST))
    
    $title = "Cập nhật blog";
    require_once "views/blog/edit_view.php";
}