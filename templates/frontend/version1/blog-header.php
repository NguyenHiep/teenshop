<!DOCTYPE html>
<!--[if IE 8]> <html lang="vi" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="vi" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html amp='' dir='ltr' lang='vn-vi' xmlns='http://www.w3.org/1999/xhtml' xmlns:b='http://www.google.com/2005/gml/b' xmlns:data='http://www.google.com/2005/gml/data' xmlns:expr='http://www.google.com/2005/gml/expr'>

<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8" />
  <title><?php echo isset($title)? $title : "Liên thông đại học - Lập trình website - Học magento";?></title>
  <base href="<?php echo BASE_URL;?>" />

  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content='VN-SG' name='geo.region'/>
  <meta content='Hồ chí minh' name='geo.placename'/>
  <meta content='14.058324;108.277199' name='geo.position'/>
  <meta content='14.058324, 108.277199' name='ICBM'/>
  <?php
    // Kiểm tra trình duyệt
    if(isset($_SERVER['HTTP_USER_AGENT'])&& (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        header('X-UA-Compatible: IE=edge,chrome=1');
  ?>
  <meta content="<?php echo isset($description)? $description : "Giadinhit.com | Ôn tập thi liên thông đại học, học lập trình;";?>" name="description" />
  <meta content="<?php echo isset($keyword)? $keyword : "Liên thông đại học, magento, php, word";?>" name="keywords" />
  <meta content="Gia đình IT" name="author" />

  <meta property="og:site_name" content="<?php echo BASE_URL;?>" />
  <meta property="og:title" content="<?php echo isset($title)? $title : "Trang chủ | Ôn tập thi liên thông đại học";?>" />
  <meta property="og:description" content="<?php echo isset($description)? $description : "Giadinhit.com | Ôn tập thi liên thông đại học, học lập trình;";?>" />
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="vi-vn"/>
  <meta property="og:image" content="-CUSTOMER VALUE-" /><!-- link to image for socio -->
  <meta property="og:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />

  <link rel="shortcut icon" href="favicon.ico"/>
  <!-- Icon -->
  <link rel="shortcut icon" type="image/x-icon" href="/templates/frontend/version1/images/icons/favicon.ico"> <link rel="icon" type="image/x-icon" href="/templates/frontend/version1/images/icons/favicon.ico"> <link rel="icon" type="image/gif" href="/templates/frontend/version1/images/icons/favicon.gif"> <link rel="icon" type="image/png" href="/templates/frontend/version1/images/icons/favicon.png"> <link rel="apple-touch-icon" href="/templates/frontend/version1/images/icons/apple-touch-icon.png"> <link rel="apple-touch-icon" href="/templates/frontend/version1/images/icons/apple-touch-icon-57x57.png" sizes="57x57"> <link rel="apple-touch-icon" href="/templates/frontend/version1/images/icons/apple-touch-icon-60x60.png" sizes="60x60"> <link rel="apple-touch-icon" href="/templates/frontend/version1/images/icons/apple-touch-icon-72x72.png" sizes="72x72"> <link rel="apple-touch-icon" href="/templates/frontend/version1/images/icons/apple-touch-icon-76x76.png" sizes="76x76"> <link rel="apple-touch-icon" href="/templates/frontend/version1/images/icons/apple-touch-icon-114x114.png" sizes="114x114"> <link rel="apple-touch-icon" href="/templates/frontend/version1/images/icons/apple-touch-icon-120x120.png" sizes="120x120"> <link rel="apple-touch-icon" href="/templates/frontend/version1/images/icons/apple-touch-icon-128x128.png" sizes="128x128"> <link rel="apple-touch-icon" href="/templates/frontend/version1/images/icons/apple-touch-icon-144x144.png" sizes="144x144"> <link rel="apple-touch-icon" href="/templates/frontend/version1/images/icons/apple-touch-icon-152x152.png" sizes="152x152"> <link rel="apple-touch-icon" href="/templates/frontend/version1/images/icons/apple-touch-icon-180x180.png" sizes="180x180"> <link rel="apple-touch-icon" href="/templates/frontend/version1/images/icons/apple-touch-icon-precomposed.png"> <link rel="icon" type="image/png" href="/templates/frontend/version1/images/icons/favicon-16x16.png" sizes="16x16"> <link rel="icon" type="image/png" href="/templates/frontend/version1/images/icons/favicon-32x32.png" sizes="32x32"> <link rel="icon" type="image/png" href="/templates/frontend/version1/images/icons/favicon-96x96.png" sizes="96x96"> <link rel="icon" type="image/png" href="/templates/frontend/version1/images/icons/favicon-160x160.png" sizes="160x160"> <link rel="icon" type="image/png" href="/templates/frontend/version1/images/icons/favicon-192x192.png" sizes="192x192"> <link rel="icon" type="image/png" href="/templates/frontend/version1/images/icons/favicon-196x196.png" sizes="196x196"> <meta name="msapplication-TileImage" content="/templates/frontend/version1/images/icons/win8-tile-144x144.png">  <meta name="msapplication-TileColor" content="#ffffff">  <meta name="msapplication-navbutton-color" content="#ffffff">  <meta name="msapplication-square70x70logo" content="/templates/frontend/version1/images/icons/win8-tile-70x70.png">  <meta name="msapplication-square144x144logo" content="/templates/frontend/version1/images/icons/win8-tile-144x144.png">  <meta name="msapplication-square150x150logo" content="/templates/frontend/version1/images/icons/win8-tile-150x150.png">  <meta name="msapplication-wide310x150logo" content="/templates/frontend/version1/images/icons/win8-tile-310x150.png">  <meta name="msapplication-square310x310logo" content="/templates/frontend/version1/images/icons/win8-tile-310x310.png">  
  <!-- Fonts START -->
  <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  -->
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet"/>

  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/syntaxhighlighter/styles/shCoreEmacs.css" rel="stylesheet"/>
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/social/jssocials.css" rel="stylesheet"/>
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/social/jssocials-theme-classic.css" rel="stylesheet"/>
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/components.css" rel="stylesheet"/>
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/style.css" rel="stylesheet"/>
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/style-responsive.css" rel="stylesheet"/>
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/themes/yellow.css" rel="stylesheet" id="style-color"/>
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/custom.css" rel="stylesheet"/>
  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-71560824-1', 'auto');
      ga('send', 'pageview');

</script>
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
    <div class="ajax-load-qa" style="display: none;"></div>
    <header>
    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span> <a href="tel:+(84)01676542578">+(84) 0167 6542 578</a></span></li>
                        <li><i class="fa fa-envelope-o"></i><span><a href="mailto:giadinhit.com@gmail.com">giadinhit.com@gmail.com</a></span></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <?php
                            if(isset($_SESSION['ses_username']) && $_SESSION['ses_userid'] != 0){
                                
                        ?>
                            <li><a href="/user/profile/<?php echo trim($_SESSION['ses_userid']);?>/">Chào bạn, <?php echo $_SESSION['ses_fullname'];?></a></li>
                            <li><a href="<?php echo BASE_ADMIN;?>">Đến trang quản trị</a></li>
                            <li><a href="/logout">Thoát</a></li>
                        <?php
                         }else{
                        ?>
                            <li><a href="javascript:void(0)"  data-toggle="modal" data-target="#registerModal">Đăng ký</a></li>
                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal">Đăng nhập</a></li>
                        <?php }
                        ?>
                        
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->
    <!-- Login -->
   
   <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <h1 class="hide">Giadinhit.com, ôn thi liên thông đại học, chia sẻ kiến thức lập trình</h1>
            <a class="site-logo" href="<?php echo BASE_URL;?>">
                <img src="<?php echo TEMPLATE_FRONTEND;?>images/logo-giadinhit-huong-dan-on-thi-dai-hoc.png" title="Giadinhit.com, website hướng dẫn ôn thi liên thông đại học" alt="Lien thong dai hoc, mon co ban, mon co so, mon chuyen nganh" />
            </a>
       
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <?php echo MenuTop();?>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->
    </header>
   <?php
    //Get googanylatic
     include_once("analyticstracking.php");
     //Connect socical facebook
    // require_once "login.php";
   ?>
