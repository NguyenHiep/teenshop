    <!-- BEGIN RIGHT SIDEBAR -->            
    <div class="col-md-3 blog-sidebar">
        <!-- ADS -->
        <?php echo getAdsSidbar(); ?>
        
          <!-- CATEGORIES START -->
          <?php echo getTotalBlogByCate(); ?>
          <!-- CATEGORIES END -->
          
            <?php echo getBlogMostView(); ?>
           <!-- BEGIN RECENT NEWS --> 
           
        <!-- END RECENT NEWS -->       
          <?php echo getAllTag(); ?>
          <!-- END RECENT NEWS -->            
    </div>
    <!-- END RIGHT SIDEBAR -->