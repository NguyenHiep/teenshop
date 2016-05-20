<?php
    $title = "Thêm mới slider";
    if(isset($_POST['btnAdd'])){
        $error      = array();
        $type       = fix_str($_POST['txtType']);
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
             //Upload image product
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
            $mslider = new Model_Slider();
            $mslider->setType($type);
            $mslider->setTitle($title);
            $mslider->setImage($imageslider);
            $mslider->setAlt($alt);
            $mslider->setPosition($position);
            $mslider->setLink($link);
            $mslider->setTarget($target);
            $mslider->setStatus($status);
            $mslider->setContent($content);

           if($mslider->checkSlider() == true){
                $mslider->insertSlider();
                redirect(BASE_ADMIN.'/slider/list');
           }else{
                $error[] = "Tên tiêu đề slider đã tồn tại, vui lòng chọn tên khác.";
            }
        }
        
        
    }
    require_once "views/slider/add_view.php";
?>