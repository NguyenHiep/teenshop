
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8" />
  <title><?php echo isset($title)? $title : "Trang chủ | Ôn tập thi liên thông đại học";?></title>
  <base href="<?php echo BASE_URL;?>" />

  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

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
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/components.css" rel="stylesheet"/>
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/style.css" rel="stylesheet"/>
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/style-responsive.css" rel="stylesheet"/>
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/themes/yellow.css" rel="stylesheet" id="style-color"/>
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/custom.css" rel="stylesheet"/>
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
    <header>
    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span> <a href="tel:+(84) 0167 6542 578">+(84) 0167 6542 578</a></span></li>
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
                            <li><a href="/register">Chào bạn, <?php echo $_SESSION['ses_fullname'];?></a></li>
                            <li><a href="/login">Đến trang quản trị</a></li>
                            <li><a href="/login">Thoát</a></li>
                        <?php
                         }else{
                        ?>
                            <li><a href="/register">Đăng ký</a></li>
                            <li><a href="/login">Đăng nhập</a></li>
                        <?php }
                        ?>
                        
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->
   <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
       <a class="site-logo" href="<?php echo BASE_URL;?>"><img src="<?php echo TEMPLATE_FRONTEND;?>images/logo-family.png" alt="Metronic Shop UI" width="128px" height="32px"/></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
       
          <ul>
           
              <?php
                $mcate = new Model_CateBlog();
                $listCate = $mcate->listCategory();
                echo MenuTop($listCate);
             
                ?>
              
                <?php
                        //$mcate = new Model_CateBlog();
                        //$listCate = $mcate->listCategory();
                       // echo "<pre>";
                       //     print_r($listCate);
                       // echo "</pre>";
                      //                          die();
                        /*$htmlcate = '';
                        foreach($listCate as $list):
                        $htmlcate.= '<li ';
                        if(isset($_GET['catid']) && validate_int($_GET['catid']) == true && $_GET['catid'] >0 && $_GET['catid'] == $list['cat_id']){
                            $htmlcate.= " class='active'";
                        }
                        $htmlcate.= '><a href="'.BASE_URL.'on-tap/'.trim($list['slug']).'-'.$list['cat_id'].'.html'.'"> '.$list['cat_name'].'</a></li>';
                        endforeach;
                        echo $htmlcate;
                        //on-thi-dai-hoc/mon-hoc/(.*)-([0-9]+).html
                        */
                      //echo recursiveMenuTop($listCate);
                     // if(count($listCate > 0)){
                      //   die(recursiveMenuTop($listCate));
                     // }
                     
                    ?>
            <!--
            <li><a href="#" target="_blank" onclick="inProcess();">IT shop</a></li>
            <li><a href="#" target="_blank" onclick="inProcess();">Typography</a></li>
            <li><a href="<?php echo BASE_URL.'huong-dan.html'?>" target="_blank">Hướng dẫn</a></li>
            <li><a href="<?php echo BASE_URL.'lien-he.html'?>" target="_blank">Liên hệ</a></li>
            -->
            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="/search" method="get">
                  <div class="input-group">
                    <input type="text" name="q" placeholder="Từ khóa tìm kiếm" class="form-control" />
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->
    </header>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=861201477273916";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>