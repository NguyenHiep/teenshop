 <?php
    require "templates/frontend/version1/blog-header.php";
 ?>
 <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo BASE_URL;?>">Home</a></li>
            <li class="active">Liên hệ</li>
        </ul>
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
           
            <div class="content-page">
              <div class="row">
               <div class="col-md-12">
                       <div class="content-page">
                      <div class="row" >
                        
                        <div class="col-md-9">
                                 <h1>Liên hệ với GIADINHIT.COM</h1>
                          <p>
                            Nếu bạn muốn hợp tác liên hệ, hoặc có những câu hỏi thì hãy liên hệ với mình
                          </p>
                          <p>
                            Nhập đầy đủ nội dung thông tin để mình có thế liên hệ với bạn dễ hơn
                          </p>
                          <!-- BEGIN FORM-->
                          <form action="/contact"  method="POST">
                            <div class="form-group">
                              <label for="contacts-name">Tiêu đề <span class="require">*</span></label>
                              <input type="text" class="form-control" name="contacts-title" id="contacts-title" required="required" placeholder="Nhập tiêu đề liên hệ"/>
                            </div>
                            <div class="form-group">
                              <label for="contacts-name">Họ và tên người gửi <span class="require">*</span></label>
                              <input type="text" class="form-control" name="contacts-name" id="contacts-name" required="required" placeholder="Nhập họ và tên của bạn"/>
                            </div>
                            <div class="form-group">
                              <label for="contacts-email">Email <span class="require">*</span></label>
                              <input type="email" class="form-control" id="contacts-email" required="required" placeholder="Email của bạn"/>
                            </div>
                            <div class="form-group">
                              <label for="contacts-message">Nội dung liên hệ</label>
                              <textarea class="form-control" rows="5" id="contacts-message" placeholder="Nội dung liên hệ"></textarea>
                            </div>
                             <div class="form-group">
                              
                              <img id="captcha" src="/capchaimage" alt="CAPTCHA Image" class="margin-bottom-10"/>
                              <a href="#" onclick="document.getElementById('captcha').src = '/libraries/securimage/securimage_show.php?' + Math.random(); return false">
                              <img class="captcha_play_image" height="32" width="32" src="/libraries/securimage/images/refresh.png" alt="Play CAPTCHA Audio" style="border: 0px;"/></a>
                               <div class="clearfix"></div>
                               <input required="required" class="form-control" type="text" name="captcha_code" size="10" maxlength="6" id="capcha_code" placeholder="Nhập mã capcha"/>
                              <span class="require">*</span>
                              <div class="clearfix"></div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Gửi</button>
                            <button type="button" class="btn btn-default">Hủy bỏ</button>
                          </form>
                          <!-- END FORM-->
                            <div id="map" class="gmaps margin-bottom-40 margin-top-20" style="height:400px;"></div>
                         
                        </div>
                        <!-- BEGIN SIDEBAR -->
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
                        <!-- END SIDEBAR -->                        
                      </div>
                </div>
            </div>
              </div>
            </div>
            </div>
          </div>
        </div>
</div>

<?php
     require "templates/frontend/version1/blog-footer.php";
?>