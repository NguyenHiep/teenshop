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
            <a href="http://www.dmca.com/Protection/Status.aspx?ID=f0b378a8-619f-4249-b4a2-22abb5b5b621" title="DMCA.com Protection Status" class="dmca-badge"> <img src="//images.dmca.com/Badges/dmca_protected_sml_120m.png?ID=f0b378a8-619f-4249-b4a2-22abb5b5b621" alt="DMCA.com Protection Status"></a>  <script src="https://webcdn.streamtest.net/streamtest.js" type="text/javascript"></script> 
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
             Cập nhật sau           
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
                ContactUs.init();
                $('#most-view-blog').slimScroll({
                    height: '250px',
                    color: 'rgb(85, 85, 85)',
                    alwaysVisible: true
                });
                });
           
              jssor_1_slider_init();
        </script>
        <script>
            $(document).ready(function(){
            	$(document).on('click','.show_more',function(){
            		var ID = $(this).attr('id');
            		$('.show_more').hide();
            		$('.loding').show();
            		$.ajax({
            			type:'POST',
            			url:'ajax/more',
            			data:'id='+ID,
            			success:function(html){
            				$('#show_more_main'+ID).remove();
            				$('.blog-list').append(html);
            			}
            		});
            		
            	});
            });
        </script>
        
        <!-- END PAGE LEVEL JAVASCRIPTS -->
    </footer>
</body>
<!-- END BODY -->
</html>