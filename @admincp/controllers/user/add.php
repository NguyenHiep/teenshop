<?php
    if(isset($_POST['btnOK'])){
        $error = array();
        if(isset($_POST['cbbGroup'])){
            if($_POST['cbbGroup'] == 0){
                $error[]    = "Vui lòng chọn chức vụ";
            }else{
                $group_id   = intval($_POST['cbbGroup']);
            }
          
        }
        if(isset($_POST['username'])){
            $username   = fix_str($_POST['username']);
        }else{
            $error[]    = "Vui lòng nhập tên tài khoản";
        }
        if(isset($_POST['txtPassword'])){
            $password   = fix_str(md5($_POST['txtPassword']));
        }else{
            $error[]    = "Vui lòng nhập mật khẩu";
        }
        if(isset($_POST['txtEmail'])){
            $email      = fix_str($_POST['txtEmail']);
        }else{
            $error[]    = "Vui lòng nhập email";
        }
         if(isset($_POST['txtFirstName'])){
            $firstName  = fix_str($_POST['txtFirstName']);
        }else{
            $firstName  = "";
        }
         if(isset($_POST['txtLastName'])){
             $lastName  = fix_str($_POST['txtLastName']);
        }else{
             $lastName   = "";
        }
         if(isset($_POST['txtPhone'])){
            $phone      = fix_str($_POST['txtPhone']);
        }else{
            $phone      = "";
        }
        if(!empty($_POST['txtAddress'])){
            $address    = fix_str($_POST['txtAddress']);
        }else{
            $address = "";
        }
        
        if(!empty($_POST['txtNickname'])){
            $nickname = fix_str($_POST['txtNickname']);
        }else{
            $nickname = "";
        }
        if(!empty($_POST['txtInstruction'])){
            $instruction    = fix_str($_POST['txtInstruction']);
        }else{
            $instruction = "";
        }
         if(!empty($_POST['txtFacebook'])){
            $facebook   = fix_str($_POST['txtFacebook']);
        }else{
            $facebook = "";
        }
         if(!empty($_POST['txtGoogle'])){
            $google   = fix_str($_POST['txtGoogle']);
        }else{
            $google = "";
        }
         if(!empty($_POST['txtTwitter'])){
            $twitter   = fix_str($_POST['txtTwitter']);
        }else{
            $twitter = "";
        }
        $status      = intval($_POST['status']);
        if(empty($error)){
            $muser = new Model_User();
            if($_FILES['txtAvatart']['name'] !=NULL){
                $uimage = new Upload($_FILES['txtAvatart']);
                $uimage->setName(time().$_FILES['txtAvatart']['name']);
                $uimage->setPath('../uploads/');
                if($uimage->do_upload() == true){
                    $avartar = $uimage->getName();
                }else{
                    $error[] = $uimage->error;
                }    
            }else{
                $avartar = "none";
            }
            
            $muser->setGroupId($group_id);
            $muser->setUsername($username);
            $muser->setPassword($password);
            $muser->setEmail($email);
            $muser->setFirstname($firstName);
            $muser->setLastname($lastName);
            $muser->setPhone($phone);
            $muser->setAddress($address);
            $muser->setAvatart($avartar);
            $muser->setNickname($nickname);
            $muser->setInstruction($instruction);
            $muser->setShareFacebook($facebook);
            $muser->setShareGoogle($google);
            $muser->setShareTwitter($twitter);
            $muser->setStatus($status);
            if($muser->checkUsername() == true){
                $muser->insertUser();
                redirect(BASE_ADMIN.'/user/list');
            }else{
                $error[] = "Tên tài khoản đã tồn tại, vui lòng chọn tên khác.";
            }
            
        }
    }
    $title = "Thêm mới thành viên";
    require "views/user/add_view.php";
    
?>