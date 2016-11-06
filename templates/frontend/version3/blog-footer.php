 <footer id="footer" class="">
        <a href="#" id="backtotop"><i class="fa fa-long-arrow-up"></i></a>
        <div class="menu-bottom center-block container">
               <ul class="topnav" id="myTopnav">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Write for us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Terms & conditions</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li class="icon">
                            <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
                        </li>
              </ul>
            <hr class="line-bottom" />
        </div>
        <div class="copyright text-center" style="line-height: 60px;">
            &copy;2016 Giadinhit.com. All rights reserved
        </div>
    </footer>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo TEMPLATE_FRONTEND;?>plugins/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo TEMPLATE_FRONTEND;?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo TEMPLATE_FRONTEND;?>plugins/responsive-menu/js/menumaker.js"></script>
    <script src="<?php echo TEMPLATE_FRONTEND;?>plugins/gridloadingeffects/js/masonry.pkgd.min.js"></script>
	<script src="<?php echo TEMPLATE_FRONTEND;?>plugins/gridloadingeffects/js/imagesloaded.js"></script>
	<script src="<?php echo TEMPLATE_FRONTEND;?>plugins/gridloadingeffects/js/classie.js"></script>
	<script src="<?php echo TEMPLATE_FRONTEND;?>plugins/gridloadingeffects/js/AnimOnScroll.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE_FRONTEND;?>scripts/main.js"></script>
   <script type="text/javascript">			
			
			function loadTabContent(tabUrl){
				$("#preloader").show();
				jQuery.ajax({
					url: tabUrl, 
					cache: false,
					success: function(message) {
						jQuery(".tab-content").empty().append(message);
						$("#preloader").hide();
					}
				});
			}
			
			jQuery(document).ready(function(){				
				
				$("#preloader").hide();				
				jQuery("[id^=tab]").click(function(){	
					
					// get tab id and tab url
					tabId = $(this).attr("id");										
					tabUrl = jQuery("#"+tabId).attr("href");
					
					jQuery("[id^=tab]").removeClass("current");
					jQuery("#"+tabId).addClass("current");
					
					// load tab content
					loadTabContent(tabUrl);
					return false;
				});
			});
			
		</script>
   <script type="text/javascript">
    $("#cssmenu").menumaker({
      title: "Menu",
      format: "multitoggle"
    });
  </script>
	<script>
    	new AnimOnScroll( document.getElementById( 'grid' ), {
    		minDuration : 0.4,
    		maxDuration : 0.7,
    		viewportFactor : 0.2
    	} );
    </script>

</body>

</html>