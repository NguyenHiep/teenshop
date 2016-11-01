<!-- Modal -->
    <div id="loginModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">x</button>
            <h3 class="modal-title text-center">Thành viên đăng nhập</h3>
            <div class="form-group text-center" id="msg_login"></div>
          </div>
          
          <div class="modal-body">
           <form  action="/login" method="POST" id="loginForm" onsubmit="return loginAction();">
              
              
              <div class="form-group">
                <label for="txtEmail">Email đăng nhập</label>
                <input type="email" name="txtEmail" class="form-control" id="txtEmail"  placeholder="Nhập email" required="required"/>
              </div>
              <div class="form-group">
                <label for="txtPassword">Mật khẩu:</label>
                <input type="password" name="txtPassword" class="form-control" id="txtPassword" placeholder="Nhập password" required="required" />
              </div>
              <div class="checkbox" >
                <label><input type="checkbox" name="ckhRemember" style="position: inherit;margin-left: 0;"/> Ghi nhớ</label>
              </div>
              <button type="submit" class="btn btn-primary more" name="btnLogin" id="btnLogin">Đăng nhập</button>
            </form>
          </div>
       
        </div>
    
      </div>
    </div>
<!-- End login -->

<!-- Modal -->
    <div id="registerModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">x</button>
            <h3 class="modal-title text-center">Đăng ký thành viên</h3>
          </div>
          <div class="modal-body">
           <form action="/register" method="POST">
              <div class="form-group">
                <label for="email">Email đăng nhập</label>
                <input type="email" name="txtEmail" class="form-control" id="email"  placeholder="Nhập email" required="required"/>
              </div>
              <div class="form-group">
                <label for="pwd">Mật khẩu:</label>
                <input type="password" name="txtPassword" class="form-control" id="pwd" placeholder="Nhập mật khẩu" required="required" />
              </div>
              <div class="form-group">
                <label for="pwd">Nhập lại khẩu:</label>
                <input type="password" name="txtRepassword" class="form-control" id="repwd" placeholder="Nhập lại mật khẩu" required="required" />
              </div>
              <div class="checkbox" >
                <label>Mã bảo vệ</label>
                 <input type="text" name="txtCapcha" class="form-control" id="capcha" placeholder="Nhập mã bảo vệ" required="required" />
              </div>
              <button type="submit" class="btn btn-primary more" name="btnRegister">Đăng ký</button>
            </form>
          </div>
       
        </div>
    
      </div>
    </div>
<!-- End register -->
    
 
 <footer>
<!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>GIADINHIT.COM</h2>
            <p>
                Giadinhit.com là một website chia sẻ những kiến thức cũng như ước mơ developer của chính tôi...
            </p>
            <p>
                Bạn không được tự ý copy và phát hành lại nội dung của Giadinhit nếu chưa được sự đồng ý của tôi.
            </p>
            <p>
            <a target="_blank" rel="nofollow" href="http://www.dmca.com/Protection/Status.aspx?ID=f0b378a8-619f-4249-b4a2-22abb5b5b621" title="DMCA.com Protection Status" class="dmca-badge"> <img src="//images.dmca.com/Badges/dmca_protected_sml_120m.png?ID=f0b378a8-619f-4249-b4a2-22abb5b5b621" alt="DMCA.com Protection Status"></a>  
          
            <script src='//images.dmca.com/Badges/DMCABadgeHelper.min.js' type='text/javascript'></script>
            </p>
            
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <div class="photo-stream">
              <h2>Liên kết bạn bè</h2>
              <?php
                //echo $_SERVER['REMOTE_ADDR'];
              ?>
               <ul class="list-unstyled">
    				<li><a href="<?php echo BASE_URL.'lien-he.html'; ?>">Liên hệ </a></li>
    				<li><a href="<?php echo BASE_URL.'huong-dan.html'; ?>">Điều khoản </a></li>
    				<li><a href="mailto:giadinhit.com@gmail.com">giadinhit.com@gmail.com</a> </li>
                </ul>          
            </div>
          </div>
          <!-- END BOTTOM CONTACTS -->
            <div class="clearfix visible-sm"></div>
          <!-- BEGIN CONTACT BLOCK --> 
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Liên hệ với chúng tôi</h2>
            <span>Nguyễn Minh Hiệp</span>
            <ul class="list-unstyled">
				<li class="clearfix"><span class="fa fa-map-marker pull-left"></span> Quận 3, Hồ Chí Minh</li>
				<li class="clearfix"><span class="fa fa-phone pull-left"></span> +(84) 0167 6542 578</li>
				<li class="clearfix"><span class="fa fa-envelope-o pull-left"></span><a href="mailto:giadinhit.com@gmail.com">giadinhit.com@gmail.com</a> </li>
            </ul>
                    
            
          </div>
          <!-- END CONTACT BLOCK -->
          
          <!-- BEGIN NEWSLETTER BLOCK --> 
          <div class="col-md-3 col-sm-6 pre-footer-col">
              <div class="pre-footer-subscribe-box pre-footer-subscribe-box-vertical">
              <h2>Đăng ký nhận tin</h2>
              <p>Nhập email của bạn để nhận tin tức mới nhất mỗi ngày</p>
              <form action="#">
                <div class="input-group">
                  <input type="text" placeholder="Nhập email" class="form-control" required="required" />
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Đăng ký</button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <!-- END NEWSLETTER BLOCK -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
   
   
        <div class="footer">
          <div class="container">
            <div class="row">
              <!-- BEGIN COPYRIGHT -->
              <div class="col-md-6 col-sm-6 padding-top-10">
                COPYRIGHT 2015 - <?php echo date('Y',time());?> GIADINHIT.COM
              </div>
              <!-- END COPYRIGHT -->
              <!-- BEGIN PAYMENTS -->
              <div class="col-md-6 col-sm-6">
                <ul class="social-footer list-unstyled list-inline pull-right">
             	<li><a title="Facebook" href="https://www.facebook.com/" target="_blank" rel="nofollow" class="fa fa-facebook"></a></li>
    			<li><a title="Youtube" href="https://www.youtube.com/" target="_blank" rel="nofollow" class="fa fa-play"></a></li>
    			<li><a title="Goole Plus" href="https://google.com/" target="_blank" rel="nofollow" class="fa fa-google-plus"></a></li>
    			<li><a title="Twitter" href="#" target="_blank" rel="nofollow" class="fa fa-twitter"></a></li>
                </ul>  
              </div>
              <!-- END PAYMENTS -->
            </div>
          </div>
        </div>
        <!-- END FOOTER -->
    
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
        <!--[if lt IE 9]>
        <script src="<?php echo TEMPLATE_FRONTEND;?>plugins/respond.min.js"></script>
        <![endif]-->
         <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
        <script src="<?php echo TEMPLATE_FRONTEND;?>js/giadinhmain.js" type="text/javascript"></script>
       
        <script src="<?php echo TEMPLATE_FRONTEND;?>plugins/syntaxhighlighter/scripts/shCore.js" type="text/javascript"></script>
        <script src="<?php echo TEMPLATE_FRONTEND;?>plugins/syntaxhighlighter/scripts/shAutoloader.js" type="text/javascript"></script>
         <script src="<?php echo TEMPLATE_FRONTEND;?>plugins/social/jssocials.min.js" type="text/javascript"></script>
        
        
        <!-- END RevolutionSlider -->
         <script src="<?php echo TEMPLATE_FRONTEND;?>js/giadinhit.js" type="text/javascript"></script>
         <script type="text/javascript">
            var base_url_syntax = '<?php echo TEMPLATE_FRONTEND;?>plugins/syntaxhighlighter/scripts/';
            SyntaxHighlighter.autoloader(
                ['js','jscript','javascript', base_url_syntax + 'shBrushJScript.js'],
                ['bash','shell',    base_url_syntax + 'shBrushBash.js'],
                ['css', base_url_syntax + 'shBrushCss.js'],
                ['xml', base_url_syntax + 'shBrushXml.js'],
                ['sql', base_url_syntax + 'shBrushSql.js'],
                ['php', base_url_syntax + 'shBrushPhp.js'],
                ['as3', base_url_syntax + 'shBrushAS3.js'],
                ['applescript', base_url_syntax + 'shBrushAppleScript.js'],
                ['bash', base_url_syntax + 'shBrushBash.js'],
                ['csharp', base_url_syntax + 'shBrushCSharp.js'],
                ['cf', base_url_syntax + 'shBrushColdFusion.js'],
                ['cpp', base_url_syntax + 'shBrushCpp.js'],
                ['delphi', base_url_syntax + 'shBrushDelphi.js'],
                ['diff', base_url_syntax + 'shBrushDiff.js'],
                ['erl', base_url_syntax + 'shBrushErlang.js'],
                ['groovy', base_url_syntax + 'shBrushGroovy.js'],
                ['java', base_url_syntax + 'shBrushJava.js'],
                ['javafx', base_url_syntax + 'shBrushJavaFX.js'],
                ['perl', base_url_syntax + 'shBrushPerl.js'],
                ['plain', base_url_syntax + 'shBrushPlain.js'],
                ['applescript', base_url_syntax + 'shBrushPowerShell.js'],
                ['ps', base_url_syntax + 'shBrushAppleScript.js'],
                ['python', base_url_syntax + 'shBrushPython.js'],
                ['ruby', base_url_syntax + 'shBrushRuby.js'],
                ['scss', base_url_syntax + 'shBrushSass.js'],
                ['scala', base_url_syntax + 'shBrushScala.js'],
                ['vb', base_url_syntax + 'shBrushVb.js']
            );
            SyntaxHighlighter.all();
         
         </script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                Layout.init();
                Layout.initTwitter();
                var map = $("#map").val();
                if(typeof map != "undefined"){
                    ContactUs.init();
                }
                
                $('#most-view-blog').slimScroll({
                    height: '520px',
                    color: 'rgb(85, 85, 85)',
                    alwaysVisible: true
                });
                
                $(document).on('click','.show_more',function(){
            		var ID = $(this).attr('id');
            		$('.show_more').hide();
            		$('.loding').show();
                    //Get all list blog
            	   loadMoreBlog(ID);
            	});
                
             });
             
            //Display message list 
            console.log("%c%s","color: red; background: yellow; font-size: 24px;","Khu vực này cấm mở lên và debug!!");
            console.log("%c%s","color: black; font-size: 18px;","Đây là một tính năng của trình duyệt dành cho các nhà phát triển. Nếu ai đó bảo bạn sao chép-dán nội dung nào đó vào đây để bật một tính năng của GiadinhIT hoặc 'hack' tài khoản của người khác, thì đó là hành vi lừa đảo và sẽ khiến họ có thể truy cập vào tài khoản Giadinhit của bạn..\n");
            var url = "http://giadinhit.com/on-tap/typography/lorem-ipsum-khong-phai-chi-la-mot-doan-van-ban-ngau-nhien-48.html";
            var text = "131314trích từ một đoạn của Lorem Ipsum, và đã ";

           /* $("#share-post-social").jsSocials({
                url: url,
                text: text,
                showLabel: false,
                showCount: "inside",
                shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp", "telegram"]
            });
            */
            $('img').each(function(){
                var $img = $(this);
                var $alt = $(this).attr('alt');
                var $title = $(this).attr('title');
                var filename = $img.attr('src');
                if($title === undefined || $title == null || $title.length <= 0)
                $img.attr('title', filename.substring((filename.lastIndexOf('/'))+1, filename.lastIndexOf('.')));
                if($alt === undefined || $alt == null || $alt.length <= 0)
                $img.attr('alt', filename.substring((filename.lastIndexOf('/'))+1, filename.lastIndexOf('.')));
            }); 
        </script>
     
        <!-- END PAGE LEVEL JAVASCRIPTS -->
    </footer>
</body>
<!-- END BODY -->
</html>