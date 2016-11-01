<?php
    if(isset($_POST['btnLogin'])){
        $error = array();
        if(validate_email($_POST['txtEmail']) == true){
            $email = trim(fix_str($_POST['txtEmail']));
        }else{
            $error[] = "Email không hợp lệ";
        }
        if(!empty($_POST['txtPassword'])){
            $pass = md5(fix_str($_POST['txtPassword']));
        }else{
             $error[] = "Mật khẩu không hợp lệ";
        }
        
        if(empty($error)){
            //Kiem tra login
          $muser = new Model_User();
            $muser->setEmail($email);
            $muser->setPassword($pass);
            $data = $muser->checkLogin();
            if($muser->num_rows() == 1){
               $_SESSION['ses_username'] = $data['username'];
               $_SESSION['ses_group']    = $data['group_id'];
               $_SESSION['ses_userid']   = $data['user_id'];
               $_SESSION['ses_fullname'] = $data['fullname'];
               $_SESSION['ses_start'] = time(); // Xác định thời gian đăng nhập.
                // Kết thúc phiên làm việc sau 60 phút kể từ lúc đăng nhập.
               $_SESSION['ses_expire'] = $_SESSION['ses_start'] + (60 * 60);
                $ret['response'] = 1;
                $ret['redirecturl'] = BASE_URL;
               // redirect(BASE_URL); // Chuyển đến trang chủ     
            }elseif($muser->num_rows() > 1){
                 $error[]  = "Lỗi hệ thống";
            }else{
               // $error[]  = "Tài khoản, mật khẩu không đúng";
               //redirect(BASE_URL);
                $ret['response'] = 0;
                $ret['error'] = 'Tài khoản mật khẩu không đúng';
            }
            
        }
        echo json_encode($ret);
    }else{
        redirect(BASE_URL);
    }
?>