 <div class="sidebar col-md-4">
      <!--BEGIN BLOCK PROFILE -->
      <?php
        echo getProfileHomePage();
      ?>
      <!-- END BLOCK PROFILE -->
      <!-- BEGIN POST SIDEBAR -->
      <?php
        echo getPostTab();
      ?>
      <!-- END POST SIDEBAR -->
      <!-- BEGIN BLOCK FOLLOW ME -->
      <?php
        echo getFllowsocial();
      ?>
      <!-- END BLOCK FOLLOW ME -->

        <!-- BEGIN BLOCK CATEGORIES -->
        <?php
            echo getTotalBlogByCate();
        ?>
      <!-- END BLOCK CATEGORIES -->

      <!-- BEGIN BLOG SLIDER -->
       <?php
            echo getPostSlider();
       ?>    
     
      <!-- END BLOG SLIDER -->
      <!-- BEGIN BLOG VIDEO -->
       <?php
        echo getPostVideo();
       ?> 
      <!-- END BLOG VIDEO -->

        <!-- BEGIN BLOCK FLICKR PHOTO -->
        <?php
            echo getFlickrPhoto();
        ?>
      <!-- END BLOCK FLICKR PHOTO -->

      <!-- BEGIN BLOCK NEWSLETTER-->
     <?php
        echo getNewletter();
     ?>
      <!-- END BLOCK NEWSLETTER -->
</div>