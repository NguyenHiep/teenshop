<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require "../libraries/config.php";
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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Giadinhit - Quản lý hệ thống</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/blue/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/blue/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/blue/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Administrantor</b> Control</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Đăng nhập hệ thống</p>

    <form action="login.html" method="post">
        <div class="form-group has-error">
         <?php
                if(!empty($error)):
                    foreach($error as $loi):
               ?>
    			 <label class="control-label" for="inputError">
                    <i class="fa fa-times-circle-o"></i> 
                    <?php echo $loi; ?>
                 </label>
    		<?php
                  endforeach;
                endif;
            ?>
                    
         
        </div>
      <div class="form-group has-feedback">
        <input name="txtUsername" value="<?php echo @$_POST['txtUsername'];?>" type="text" class="form-control" placeholder="Email" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="txtPassword" type="password" class="form-control" placeholder="Mật khẩu" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" /> Ghi nhớ
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btnOK">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- Hoặc -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Đăng nhập với
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập với
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">Quên mật khẩu</a><br>
    <a href="#" class="text-center">Đăng ký thành viên</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo BASE_URL;?>/templates/backend/blue/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo BASE_URL;?>/templates/backend/blue/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo BASE_URL;?>/templates/backend/blue/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
