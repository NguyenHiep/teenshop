<!DOCTYPE html>

<html lang="en">
 
	<head>
		
		<meta charset="UTF-8" />
		<link rel="shortcut icon" href="favicon.ico" />
		<title><?php echo isset($title) ? $title : "Quản trị hệ thống";?></title>
		
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
        <script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/plugins/ckeditor/ckeditor.js"></script>
         <script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/plugins/ckfinder/ckfinder.js"></script>
       
        <script>
            $(document).ready(listUser);
        </script>
        <script type="text/javascript">
             function BrowseServer() {
            var finder = new CKFinder();
            //finder.basePath = '../';
            finder.selectActionFunction = SetFileField;
            finder.popup();
        }
        function SetFileField(fileUrl) {
            document.getElementById('Image').value = fileUrl;
        }
        </script>        
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
        <script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/scripts/validate_del.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/plugins/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/plugins/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/green/resources/plugins/fancybox/jquery.fancybox-1.3.4.css"></script>		
        <script>
            jQuery(document).ready(function(){
                jQuery('a.fancybox').click(function(){
                    
                    
                });
               jQuery("a.fancybox").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			}); 
            });
        </script>
    </head>
  
	<body>
    <div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar">
            <div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="<?php echo BASE_ADMIN;?>/">Admin control panel</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="<?php echo BASE_ADMIN;?>"><img id="logo" src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Xin chào, <a href="#" title="Edit your profile"><?php echo $_SESSION['ses_fullname'];?></a>, bạn có <a href="#messages" rel="modal" title="3 Messages">3 tin nhắn</a><br />
				<br />
				<a href="#" title="View the Site">View the site</a> | <a href="<?php echo BASE_ADMIN;?>/logout.php" title="Sign Out">Đăng xuất</a>
			</div>        
			<?php
                //Begin active menu
                if(isset($_GET['controller'])){
                    $active = $_GET['controller'];
                }else{
                    $active = "home";
                }
                //Begin active sub
                if(isset($_GET['action'])){
                    $active_sub = $_GET['action'];
                }else{
                    $active_sub = "list";
                }
            ?>
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="<?php echo BASE_ADMIN;?>" class="nav-top-item no-submenu <?php if($active == "home") echo 'current';?>"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Màn hình chính
					</a>       
				</li>
                <li>
                    <a href="javascript:(0)" class="nav-top-item">
                        Quản lý nhóm
                    </a>
                    <ul>
                        <li><a href="#">Thêm nhóm</a></li>
						<li><a href="#">Quản lý nhóm</a></li> 
                    </ul>
                </li>
				<li> 
					<a href="javascript:(0)" class="nav-top-item <?php if($active == "user") echo 'current';?>"> <!-- Add the class "current" to current menu item -->
					Thành viên
					</a>
					<ul>
						<li><a <?php if($active_sub == "add") echo 'class="current"';?> href="<?php echo BASE_ADMIN;?>/user/add">Thêm mới thành viên</a></li>
						<li><a   <?php if($active_sub == "list") echo 'class="current"';?> href="<?php echo BASE_ADMIN;?>/user/list">Quản lý thành viên</a></li>                         
					</ul>
				</li>
                
				<li> 
					<a href="javascript:(0)" class="nav-top-item  <?php if($active == "product") echo 'current';?>"> <!-- Add the class "current" to current menu item -->
					Sản phẩm
					</a>
					<ul>
						<li><a  <?php if($active_sub == "add") echo 'class="current"';?> href="<?php echo BASE_ADMIN;?>/product/add">Thêm mới sản phẩm</a></li>
						<li><a   <?php if($active_sub == "list") echo 'class="current"';?> href="<?php echo BASE_ADMIN;?>/product/list">Quản lý sản phẩm</a></li> <!-- Add class "current" to sub menu items also -->
						<li><a href="#">Quản lý bình luận</a></li>
					</ul>
				</li>
				
				<li>
					<a href="javascript:(0)" class="nav-top-item <?php if($active == "cate") echo 'current';?>">
						Chuyên mục sản phẩm
					</a>
					<ul>
						<li><a <?php if($active_sub == "add") echo 'class="current"';?> href="<?php echo BASE_ADMIN;?>/cate/add">Thêm chuyên mục</a></li>
						<li><a <?php if($active_sub == "list") echo 'class="current"';?> href="<?php echo BASE_ADMIN;?>/cate/list">Quản lý chuyên mục</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="nav-top-item">
						Slider
					</a>
					<ul>
						<li><a href="<?php echo BASE_ADMIN;?>/slider/list">Quản lý slider</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="nav-top-item">
						Khảo sát khách hàng
					</a>
					<ul>
						<li><a href="#">Thêm câu hỏi</a></li>
						<li><a href="#">Quản lý câu hỏi</a></li>
						<li><a href="#">Manage Albums</a></li>
						<li><a href="#">Gallery Settings</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Đơn đặt hàng (Order)
					</a>
					<ul>
						<li><a href="<?php echo BASE_ADMIN; ?>/order/list">Quản lý đơn đặt hàng</a></li>
					
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Page
					</a>
					<ul>
						<li><a href="#">Thêm page</a></li>
						<li><a href="#">Quản lý page</a></li>
					</ul>
				</li>      
				<li>
					<a href="javascript:(0)" class="nav-top-item <?php if($active == "cateblog") echo 'current';?>">
						Chuyên mục blog
					</a>
					<ul>
						<li><a <?php if($active_sub == "add") echo 'class="current"';?> href="<?php echo BASE_ADMIN;?>/cateblog/add">Thêm chuyên mục</a></li>
						<li><a <?php if($active_sub == "list") echo 'class="current"';?> href="<?php echo BASE_ADMIN;?>/cateblog/list">Quản lý chuyên mục</a></li>
					</ul>
				</li>
                <li>
					<a href="javascript:(0)" class="nav-top-item <?php if($active == "blog") echo 'current';?>">
						Blog
					</a>
					<ul>
						<li><a <?php if($active_sub == "add") echo 'class="current"';?> href="<?php echo BASE_ADMIN;?>/blog/add">Thêm Blog</a></li>
						<li><a <?php if($active_sub == "list") echo 'class="current"';?> href="<?php echo BASE_ADMIN;?>/blog/list">Quản lý Blog</a></li>
					</ul>
				</li>
			</ul> <!-- End #main-nav -->
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Tin nhắn</h3>
			 
				<p>
					<strong>17th May 2009</strong> bởi Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Gỡ bỏ</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Gỡ bỏ</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Gỡ bỏ</a></small>
				</p>
				
				<form action="" method="post">
				
					<h4>Tin nhắn mới</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" name="btnSendMessage" value="Gửi" />
						
					</fieldset>
					
				</form>
				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->
        
        		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
				<!-- Page Head -->
		