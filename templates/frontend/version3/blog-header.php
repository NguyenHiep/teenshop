<!DOCTYPE html>
<html lang='vi' dir='ltr'>
<head>
    <meta charset="utf-8" />
    <title><?php echo isset($title)? $title : "Liên thông đại học - Lập trình website - Học magento";?></title>
    <base href="<?php echo BASE_URL;?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content='VN-SG' name='geo.region'/>
    <meta content='Hồ chí minh' name='geo.placename'/>
    <meta content='14.058324;108.277199' name='geo.position'/>
    <meta content='14.058324, 108.277199' name='ICBM'/>
    <meta name="description" content="<?php echo isset($description)? $description : "Liên thông đại học - Lập trình website - Học magento ";?>"  />
    <meta name="keywords" content="<?php echo isset($keyword)? $keyword : "Lien thong dai hoc, lap trinh, lap trinh php, lap trinh magento";?>"  />
    <meta name="author" content="Giadinhit" />
    <meta property="og:site_name" content="<?php echo BASE_URL;?>" />
    <meta property="og:title" content="<?php echo isset($title)? $title : "Liên thông đại học - Lập trình website - Học magento";?>" />
    <meta property="og:description" content="<?php echo isset($description)? $description : "Liên thông đại học - Lập trình website - Học magento ";?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo isset($imagesocial)? $imagesocial : TEMPLATE_FRONTEND.'img/logo.png'; ?>" />
    <meta property="og:url" content="<?php echo isset($urlsocial)? $urlsocial : siteURL().ltrim($_SERVER["REQUEST_URI"],'/'); ?>" />
    <meta property="og:locale" content="vi-vn"/>
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php echo isset($title)? $title : "Liên thông đại học - Lập trình website - Học magento";?>" />
    <meta name="twitter:description" content="<?php echo isset($description)? $description : "Liên thông đại học - Lập trình website - Học magento ";?>" />
    <meta name="twitter:image" content="<?php echo isset($imagesocial)? $imagesocial : TEMPLATE_FRONTEND.'img/logo.png'; ?>" />
    <meta name="twitter:creator" content="@laptrinhwebphp" /> <!-- @username twitter -->
    <meta property="fb:app_id" content="861201477273916" />
    <meta property="fb:admins" content="100000294314145"/>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/favicon-16x16.png" />
    <link rel="manifest" href="<?php echo TEMPLATE_FRONTEND; ?>img/icon/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="<?php echo TEMPLATE_FRONTEND; ?>img/icon/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/fontawesome/css/font-awesome.min.css?v=2.10" rel="stylesheet" />
    <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/bootstrap/css/bootstrap.min.css?v=2.10" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7cCookie%7cPT+Serif&amp;subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo TEMPLATE_FRONTEND;?>css/components.css?v=2.10" rel="stylesheet" />
    <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/responsive-menu/css/menumaker.css?v=2.10" rel="stylesheet" />
    <link href="<?php echo TEMPLATE_FRONTEND;?>css/styles.css?v=2.10" rel="stylesheet" />
    <link href="<?php echo TEMPLATE_FRONTEND;?>css/style-responsive.css?v=2.10" rel="stylesheet" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-71560824-1', 'auto');
      ga('send', 'pageview');

</script>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=861201477273916";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="loading-overlay"></div>
	<div id="wrapper">
    	<header>
          <div class="preheader">
              <div class="container">
                  <div class="row">
                      <!-- BEGIN SOCIAL HEADER -->
                      <div class="col-md-3 additional-blog-info">
                          <div class="preheader-social">
                              <ul class="list-icon social-network social-circle list-inline no-space">
                              <li><a target="_blank" href="https://www.facebook.com/daigiadinhcntt/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                              <li><a target="_blank" href="https://www.youtube.com/channel/UCKCt7kQ-NHGDGsTDDpdu5qw" class="icoYoutube" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                              <li><a target="_blank" href="https://twitter.com/@laptrinhwebphp" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                              <li><a target="_blank" href="https://www.instagram.com/hoclaptrinhweb/" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                  <!-- END SOCIAL HEADER -->
                  <!-- BEGIN LOGO -->
                    <div class="col-md-6">
                        <h1 id="logo" title="Giadinhit.com kênh hướng dẫn ôn thi liên thông đại học, lập trình"> <a href="<?php echo BASE_URL; ?>" title="Giadinhit.com kênh hướng dẫn ôn thi liên thông đại học, lập trình">Giadinhit.com kênh hướng dẫn ôn thi liên thông đại học, lập trình </a> </h1>
                    </div>
                  <!-- END LOGO -->
                  <!-- BEGIN SEARCH -->
                    <div class="col-md-3">
                        <div class="top-search">
                            <form action="<?php echo BASE_URL;?>search" method="get">
                              <div class="input-group">
                              <input type="text" name="q" placeholder="Từ khóa tìm kiếm.."  class="form-control" required="required" />
                              <span class="input-group-btn ">
                                <button class="btn glyphicon glyphicon-search" type="submit"></button>
                              </span>
                            </div>
                          </form>
                        </div>
                    </div> 
                    <!-- END SEARCH -->
                </div>
              </div>
          </div> <!-- End .preheader -->
          
         <div class="container">
           <hr class="line-bottom" />
              <nav id="cssmenu" class="top-navigation">
                  <?php echo MenuTopNew() ?>
              </nav>
         </div>
    	</header>