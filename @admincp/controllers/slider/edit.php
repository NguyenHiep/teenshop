
<?php
    if(isset($_GET['sid']) && validate_int($_GET['sid']) == true){
        $id = $_GET['sid'];
        $title = "Cập nhật slider";
        $mslider = new Model_Slider();
        $resultData = $mslider->getSliderById($id);
        if(isset($_POST['btnUpdate'])){
            $error      = array();
            if(!empty($_POST['txtTitle'])){
                 $title = fix_str($_POST['txtTitle']);
            }else{
                $error[]= "Vui lòng nhập tên tiêu đề";           
            }
           
            $alt        = fix_str($_POST['txtAlt']);
            $position   = intval($_POST['txtPosition']);
            $link       = fix_str($_POST['txtLink']);
            $target     = fix_str($_POST['txtTarget']);
            $status     = intval($_POST['txtStatus']);
            $content    = fix_content($_POST['txtContent']);
            if(empty($error)){
                //Upload image slider
               if($_FILES['txtImage']['name'] !=NULL){
                     $uimage = new Upload($_FILES['txtImage']);
                     $uimage->setPath('../uploads/');
                    if($uimage->do_upload() == true){
                        $imageslider = $uimage->getName();
                    }else{
                        $error[] = $uimage->error;
                    }
               }else{
                    $imageslider = "none";
               }
                $mslider->setTitle($title);
                $mslider->setImage($imageslider);
                $mslider->setAlt($alt);
                $mslider->setPosition($position);
                $mslider->setLink($link);
                $mslider->setTarget($target);
                $mslider->setStatus($status);
                $mslider->setContent($content);
                
             if($mslider->checkSlider($id) == true){
                  $mslider->updateSlider($id);
                  redirect(BASE_ADMIN.'/slider/list');
               }else{
                    $error[] = "Tên slider đã tồn tại, vui lòng chọn tên khác.";
                }
            }
        }
        require_once "views/slider/edit_view.php";
    }else{
        redirect(BASE_ADMIN);
    }
    
?>