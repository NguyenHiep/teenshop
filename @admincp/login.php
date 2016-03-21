<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require "../config.php";
require "../libraries/class.php";
require "../libraries/functions.php";
if(check_login() == true){
    redirect(BASE_URL);
}
    $error = array();
    if(isset($_POST['btnOK'])){
        if(!empty($_POST['txtUsername'])){
            $user = fix_str($_POST['txtUsername']);
        }else{
            $error[] = "Vui lòng nhập tên tài khoản";
        }
        if(!empty($_POST['txtPassword'])){
            $pass = fix_str(md5($_POST['txtPassword']));
        }else{
            $error[] = "Vui lòng nhập mật khẩu";
        }
        if(empty($error)){
            $muser = new Model_User();
            $muser->setUsername($user);
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
                redirect(BASE_ADMIN); // Chuyển đến trang chủ     
            }elseif($muser->num_rows() > 1){
                 $error[]  = "Lỗi hệ thống";
            }else{
                $error[]  = "Tài khoản, mật khẩu không đúng";
            }
        }
        
    }
?>
<!DOCTYPE html>

<html lang="vi">
 
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<title>Đăng nhập quản trị hệ thống</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/green/resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/green/resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/green/resources/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/green/resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/green/resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/green/resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/scripts/jquery.wysiwyg.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/scripts/ajax.js"></script>
        <script>
            $(document).ready(listUser);
        </script>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
        <script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/scripts/validate_del.js"></script>
		
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/logo.png" alt="Logo admin" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="login.html" method="POST">
				     <?php
                        if(!empty($error)):
                            foreach($error as $loi):
                       ?>
    					<div class="notification information png_bg">
		                      <div>
                                    <?php echo $loi;?>
                              </div>
    					</div>
					<?php
                          endforeach;
                        endif;
                    ?>
					<p>
						<label>Username</label>
						<input class="text-input" name="txtUsername" type="text" placeholder="Nhập tài khoản quản trị" value="<?php if(isset($_POST['txtUsername'])) echo $_POST['txtUsername'];?>"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" name="txtPassword" type="password" placeholder="Nhập mật khẩu"/>
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" name="btnOK" value="Đăng nhập hệ thống" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  
</html>
