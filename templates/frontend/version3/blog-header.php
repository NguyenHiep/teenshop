<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta content='Học lập trình web, học lập trình cơ bản' name='DC.title'/>
  <meta content='VN-SG' name='geo.region'/>
  <meta content='Hồ chí minh' name='geo.placename'/>
  <meta content='14.058324;108.277199' name='geo.position'/>
  <meta content='14.058324, 108.277199' name='ICBM'/>
  <meta content="Giadinhit" name="description" />
  <meta content="Giadinhit" name="keywords" />
  <meta content="Giadinhit" name="author" />

  <meta property="og:site_name" content="-CUSTOMER VALUE-" />
  <meta property="og:title" content="-CUSTOMER VALUE-" />
  <meta property="og:description" content="-CUSTOMER VALUE-" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="-CUSTOMER VALUE-" /><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-" />

	<title>Giadinhit home page</title>

	<!-- Bootstrap -->
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7cCookie%7cPT+Serif&amp;subset=all" rel="stylesheet" type="text/css" />

  <link href="<?php echo TEMPLATE_FRONTEND;?>css/components.css" rel="stylesheet" />
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/responsive-menu/css/menumaker.css" rel="stylesheet" />
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/styles.css" rel="stylesheet" />
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/style-responsive.css" rel="stylesheet" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<div id="wrapper">
    	<header>
          <div class="preheader">
              <div class="container">
                  <div class="row">
                      <!-- BEGIN SOCIAL HEADER -->
                      <div class="col-md-3 additional-blog-info">
                          <div class="preheader-social">
                              <ul class="list-icon social-network social-circle list-inline no-space">
                              <li><a target="_blank" href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                              <li><a target="_blank" href="#" class="icoYoutube" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                              <li><a target="_blank" href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                              <li><a target="_blank" href="#" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                  <!-- END SOCIAL HEADER -->
                  <!-- BEGIN LOGO -->
                    <div class="col-md-6">
                        <h1 id="logo"> <a href="<?php echo BASE_URL; ?>">Giadinhit.com kênh hướng dẫn ôn thi liên thông đại học, lập trình </a> </h1>
                    </div>
                  <!-- END LOGO -->
                  <!-- BEGIN SEARCH -->
                    <div class="col-md-3">
                        <div class="top-search">
                            <form action="/search" method="get">
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