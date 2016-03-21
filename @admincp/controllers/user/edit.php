<?php
if(isset($_GET['uid']) && validate_int($_GET['uid']) == true && $_GET['uid'] >0){
    $uid = intval($_GET['uid']);
    $muser = new Model_User();
    //Begin update
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
            if($_POST['txtPassword'] != ''){
                $password   = fix_str(md5($_POST['txtPassword']));
            }else{
                $password   = "none";
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
              if(isset($_POST['txtAddress'])){
                $address    = fix_str($_POST['txtAddress']);
            }else{
                $address = "";
            }
            if(empty($error)){
                
                $muser->setGroupId($group_id);
                $muser->setUsername($username);
                $muser->setPassword($password);
                $muser->setEmail($email);
                $muser->setFirstname($firstName);
                $muser->setLastname($lastName);
                $muser->setPhone($phone);
                $muser->setAddress($address);
                //Check User exist in database
                if($muser->checkUsername($uid) == true){
                   $muser->updateUser($uid);
                  redirect(BASE_ADMIN.'/user/list');
                }else{
                    $error[] = "Tên tài khoản đã tồn tại, vui lòng chọn tên khác.";
                }
                
            }//End if empty($error)
    }//End if(isset($_POST['btnOK']))
    
    $data = $muser->getUserByid($uid);
    $title = "Cập nhật thành viên";
    require "views/user/edit_view.php";

}else{
    redirect(BASE_ADMIN.'/user/list');
}
