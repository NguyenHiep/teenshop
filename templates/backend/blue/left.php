<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="shortcut icon" href="<?php echo BASE_ADMIN?>/favicon.ico" />
  <title><?php echo isset($title) ? $title : "Quản trị hệ thống";?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/blue/bootstrap/css/bootstrap.min.css" />
  <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
   
  <!-- Ionicons -->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
  
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/blue/plugins/select2/select2.min.css" />
   <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/blue/plugins/iCheck/all.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/blue/dist/css/AdminLTE.min.css" />
   <!-- Pace style -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/blue/plugins/pace/pace.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/blue/dist/css/custom.css" /> 

  <link rel="stylesheet" href="<?php echo BASE_URL;?>/templates/backend/blue/dist/css/skins/skin-blue.min.css" />
   
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->      
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo BASE_ADMIN;?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>QTHT </b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Quản trị hệ thống</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
               <?php
                    $muser2 = new Model_User();
                    $data2 = $muser2->getUserByid($_SESSION['ses_userid']);
             
                    if(isset($data2['avatart']) && $data2['avatart'] != "none"):
                 ?>
                    <img src="<?php echo URL_UPLOAD.trim($data2['avatart']); ?>" class="user-image" alt="<?php echo $_SESSION['ses_fullname']; ?>" />

                 <?php       
                    else:
                 ?>
                 <!-- Ảnh avatart mặc định nằm ở đây -->
                  <img src="<?php echo URL_UPLOAD.'avatart-none.png'; ?>" class="user-image" alt="<?php echo $_SESSION['ses_fullname']; ?>" />

                 <?php       
                    endif;
                ?>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Xin chào, <?php echo $_SESSION['ses_fullname'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <?php
             
                     if(isset($data2['avatart']) && $data2['avatart'] != "none"):
                 ?>
                    <img src="<?php echo URL_UPLOAD.trim($data2['avatart']); ?>" class="img-circle" alt="<?php echo $_SESSION['ses_fullname']; ?>" />

                 <?php       
                    else:
                 ?>
                 <!-- Ảnh avatart mặc định nằm ở đây -->
                  <img src="<?php echo URL_UPLOAD.'avatart-none.png'; ?>" class="img-circle" alt="<?php echo $_SESSION['ses_fullname']; ?>" />

                 <?php       
                    endif;
                 if(author_admin() == true):
                ?>
                
                <p>
                  <?php echo $_SESSION['ses_fullname'];?> - Web Developer
                    <small>Member since Nov. 2012</small>
                </p>
                <?php
                    endif;
                ?>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
               <?php
                if(author_admin() == true):
                ?>
			      <a href="<?php echo BASE_ADMIN.'/user/edit/uid/'.$_SESSION['ses_userid'];?>" class="btn btn-default btn-flat">Thông tin tài khoản</a>
            <?php
                else:
             ?>
             	<a href="#" class="btn btn-default btn-flat">Thông tin tài khoản</a>
			
             <?php   
                endif;
            ?>
                </div>
                <div class="pull-right">
                  <a href="<?php echo BASE_ADMIN;?>/logout.php" class="btn btn-default btn-flat">Thoát</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
            <?php
         
                if(isset($data2['avatart']) && $data2['avatart'] != "none"):
             ?>
                <img src="<?php echo URL_UPLOAD.trim($data2['avatart']); ?>" class="img-circle" alt="<?php echo $_SESSION['ses_fullname']; ?>" />

             <?php       
                else:
             ?>
             <!-- Ảnh avatart mặc định nằm ở đây -->
              <img src="<?php echo URL_UPLOAD.'avatart-none.png'; ?>" class="img-circle" alt="<?php echo $_SESSION['ses_fullname']; ?>" />

             <?php       
                endif;
            ?>
         </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['ses_fullname'];?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Tìm kiếm ..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      -->
      <!-- /.search form -->
        <?php
                //Begin active menu
                if(isset($_GET['controller'])){
                    $active = $_GET['controller'];
                }else{
                    $active = "home";
                }
            ?>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Chuyên mục</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?php echo BASE_URL;?>" target="_blank"><i class="fa fa-backward"></i> <span>Xem website</span></a></li>
        <li <?php if($active == "blog") echo "class='active'"; ?> ><a href="<?php echo BASE_ADMIN;?>/blog/list"><i class="fa fa-list"></i> <span>Bài viết</span></a></li>
        <li <?php if($active == "cateblog") echo "class='active'"; ?> ><a href="<?php echo BASE_ADMIN;?>/cateblog/list"><i class="fa fa-list-alt"></i> <span>Chuyên mục</span></a></li>
        <li <?php if($active == "comment") echo "class='active'"; ?>><a href="<?php echo BASE_ADMIN;?>/comment/list"><i class="fa fa-comment"></i> <span>Bình luận</span></a></li>
        
        
        <li <?php if($active == "slider") echo "class='active'"; ?>><a href="<?php echo BASE_ADMIN;?>/slider/list"><i class="fa fa-sliders"></i> <span>Slider</span></a></li>
        <li  <?php if($active == "user") echo "class='active'"; ?> ><a href="<?php echo BASE_ADMIN;?>/user/list"><i class="fa fa fa-users"></i> <span>Thành viên</span></a></li>
        <li><a href="#"><i class="fa fa-star-half-o"></i> <span>Quảng cáo</span></a></li>
        <li><a href="#"><i class="fa fa-envelope"></i> <span>Email marketing</span></a></li>
        <li><a href="#"><i class="fa fa-calendar"></i> <span>Event</span></a></li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-certificate"></i> <span>Cấu hình hệ thống</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#">Header</a></li>
            <li><a href="#">Footer</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
