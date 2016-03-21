<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8" />
  <title><?php echo isset($title)? $title : "Trang chủ | Chuyên bán các phụ kiện, linh kiện máy tính";?></title>
  <base href="<?php echo BASE_URL;?>" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/slider-layer-slider/css/layerslider.css" rel="stylesheet">
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
  <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"><!-- for slider-range -->
  <link href="<?php echo TEMPLATE_FRONTEND;?>plugins/rateit/src/rateit.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/components.css" rel="stylesheet">
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/style.css" rel="stylesheet">
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/style-layer-slider.css" rel="stylesheet">
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo TEMPLATE_FRONTEND;?>css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
    

    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span><strong>0167 6542 578</strong>  (Hotline - Zalo - Viber)</span></li>
                        <!-- BEGIN CURRENCIES -->
                        <li class="shop-currencies">
                            <a href="https://www.facebook.com/thoitrangpho.vn" target="_blank" title="Fanpage giadinhit.com">Facebook</a>
                            <a href="skype:thoitrangpho.vn?chat&text=" target="_blank">Skype</a>
                            <a href="ymsgr:sendim?thoitrangpho" target="_blank">Yahoo</a>
                        </li>
                        <!-- END CURRENCIES -->
                        <!-- BEGIN LANGS -->
                        <li class="langs-block">
                            <a href="javascript:void(0);" class="current">Tiếng việt </a>
                            <div class="langs-block-others-wrapper"><div class="langs-block-others">
                              <a href="javascript:void(0);">English</a>
                            </div></div>
                        </li>
                        <!-- END LANGS -->
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <li><a href="/customer/account/">Tài khoản</a></li>
                        <li><a href="/wishlist">Sản phẩm yêu thích</a></li>
                        <li><a href="/checkout">Thanh toán</a></li>
                        <li><a href="/customer/account/login">Đăng nhập</a></li>
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
        <a class="site-logo" href="<?php echo BASE_URL;?>"><img src="<?php echo TEMPLATE_FRONTEND;?>images/logos/logo-shop-red.png" alt="Metronic Shop UI"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block">
          <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count">3 mặt hàng</a>
            <a href="javascript:void(0);" class="top-cart-info-value">3.000.000 VNĐ</a>
          </div>
          <i class="fa fa-shopping-cart"></i>
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content">
              <ul class="scroller" style="height: 250px;">
                <li>
                  <a href="shop-item.html"><img src="<?php echo TEMPLATE_FRONTEND;?>images/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                
              </ul>
              <div class="text-right">
                <a href="shop-shopping-cart.html" class="btn btn-default">Xem giỏ hàng</a>
                <a href="shop-checkout.html" class="btn btn-primary">Thanh toán</a>
              </div>
            </div>
          </div>            
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Liên thông đại học 
              </a>
                
              <!-- BEGIN DROPDOWN MENU -->
              <ul class="dropdown-menu">
                <!--
<li class="dropdown-submenu">
                  <a href="shop-product-list.html">Hi Tops <i class="fa fa-angle-right"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="shop-product-list.html">Second Level Link</a></li>
                    <li><a href="shop-product-list.html">Second Level Link</a></li>
                    <li class="dropdown-submenu">
                      <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        Second Level Link 
                        <i class="fa fa-angle-right"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="shop-product-list.html">Third Level Link</a></li>
                        <li><a href="shop-product-list.html">Third Level Link</a></li>
                        <li><a href="shop-product-list.html">Third Level Link</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
-->
                <li><a href="shop-product-list.html">Nhập môn lập trình</a></li>
                <li><a href="shop-product-list.html">Cơ sở dữ liệu</a></li>
                <li><a href="shop-product-list.html">Cấu trúc dữ liệu</a></li>
                 <li><a href="shop-product-list.html">Giải tích</a></li>
                <li><a href="shop-product-list.html">Mạng máy tính</a></li>
                <li><a href="shop-product-list.html">Lập trình web 1</a></li>
                 <li><a href="shop-product-list.html">Đại số tuyến tính</a></li>
                  <li><a href="shop-product-list.html">Toán rời rạc</a></li>
              </ul>
              <!-- END DROPDOWN MENU -->
            </li>
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Lập trình
              </a>
                
              <!-- BEGIN DROPDOWN MENU -->
              <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                  <a href="shop-product-list.html">Ứng dụng web <i class="fa fa-angle-right"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="shop-product-list.html">IOS và Android</a></li>
                    <li><a href="shop-product-list.html">CSharp</a></li>
                    <li class="dropdown-submenu">
                      <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        Second Level Link 
                        <i class="fa fa-angle-right"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="shop-product-list.html">Third Level Link</a></li>
                        <li><a href="shop-product-list.html">Third Level Link</a></li>
                        <li><a href="shop-product-list.html">Third Level Link</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="shop-product-list.html">Di động</a></li>
                <li><a href="shop-product-list.html">Desktop</a></li>
              </ul>
              <!-- END DROPDOWN MENU -->
            </li>
            
             <li><a href="index.html" target="_blank">IT shop</a></li>
            <li><a href="onepage-index.html" target="_blank">Hướng dẫn</a></li>
            <li><a href="http://www.keenthemes.com/preview/metronic/theme/templates/admin/ecommerce_index.html" target="_blank">Liên hệ</a></li>

            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Từ khóa tìm kiếm" class="form-control" />
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