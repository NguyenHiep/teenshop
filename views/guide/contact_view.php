  <?php
    require "templates/frontend/version3/blog-header.php";
 ?>
 <div class="main">
      <div class="container">
          <div class="row">
            <!-- BEGIN CONTENT -->
              <div class="content col-md-8 page-contact">
                <div class="row address-company margin-bottom-30">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo BASE_URL;?>">Home</a></li>
                        <li class="active">Liên hệ</li>
                    </ul>
                     <h1 class="col-md-12 text-uppercase text-center">Liên hệ</h1>
                    <div class="col-md-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d244.94128664002423!2d106.6318103620936!3d10.806671782349362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbf3c68a7c4aa9b66!2sCty+may+Gia+H%E1%BB%93i!5e0!3m2!1sen!2s!4v1480110669650" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                 </div>
                <div class="row content-contact">
                    <div class="col-md-4">
                          <p>
                            Nếu bạn muốn hợp tác liên hệ, hoặc có những câu hỏi thì hãy liên hệ với mình.
                          </p>
                          <p>
                            Nhập đầy đủ nội dung thông tin để mình có thể liên hệ với bạn dễ hơn.
                          </p>
                    </div>
                    <div class="col-md-8">
                         <div class="row">
                            <form action="<?php echo BASE_URL;?>/contact"  method="POST">
                            <div class="form-group col-md-9">
                              <!-- <label for="contacts-name">Tiêu đề <span class="require">*</span></label> -->
                              <input type="text" class="form-control" name="contacts-title" id="contacts-title" required="required" placeholder="Tiêu đề liên hệ (bắt buộc)"/>
                            </div>
                            <div class="form-group col-md-9">
                              <!-- <label for="contacts-name">Họ và tên người gửi <span class="require">*</span></label> -->
                              <input type="text" class="form-control" name="contacts-name" id="contacts-name" required="required" placeholder="Họ và tên người liên hệ (bắt buộc)"/>
                            </div>
                            <div class="form-group col-md-9">
                              <!-- <label for="contacts-email">Email <span class="require">*</span></label> -->
                              <input type="email" class="form-control" id="contacts-email" required="required" placeholder="Email liên hệ (bắt buộc)"/>
                            </div>
                            <div class="form-group col-md-12">
                              <!-- <label for="contacts-message">Nội dung liên hệ</label> -->
                              <textarea class="form-control" rows="5" id="contacts-message" placeholder="Nội dung liên hệ (bắt buộc)"></textarea>
                            </div>
                            <!--
                             <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="g-recaptcha" data-sitekey="6LdF-gwUAAAAAPFTdCZRJZErAD1n1Ic4cxTVNqMA"></div>
                                    
                                      <img id="captcha" src="/capchaimage" title="CAPTCHA Image" alt="CAPTCHA Image" class="margin-bottom-10 width-capcha"/>
                                      <a href="#" onclick="document.getElementById('captcha').src = '<?php echo BASE_URL;?>libraries/securimage/securimage_show.php?' + Math.random(); return false">
                                       <img class="captcha_play_image"  src="<?php echo BASE_URL; ?>libraries/securimage/images/refresh.png" alt="Play CAPTCHA Audio" title="Play CAPTCHA Audio"/>
                                      </a>
                                      
                                    </div>
                                    <div class="col-md-6">
                                        <input required="required" class="form-control" type="text" name="captcha_code" size="10" maxlength="6" id="capcha_code" placeholder="Nhập mã bảo vệ (bắt buộc)"/>
                                    </div>
                                </div>
                            </div>
                            -->
                            <div class="clearfix"></div>
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-md-6"><div class="g-recaptcha" data-sitekey="6LdF-gwUAAAAAPFTdCZRJZErAD1n1Ic4cxTVNqMA"></div></div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success  pull-right" style="height: 78px;"><i class="icon-ok"></i> Gửi thông tin</button>
                                    </div>
                                    
                                </div>
                                <!-- <button type="button" class="btn btn-success">Hủy bỏ</button> -->
                            </div>
                          </form>
                         </div>
                       
                    </div>
                    <!-- <div id="map" class="gmaps margin-bottom-40 margin-top-20" style="height:400px;"></div> -->
                  
                </div>
                 
                <!-- END CONTENT -->
               
          
          </div>
           <?php
                     require "templates/frontend/version3/blog-sidebar.php";
                ?>
      </div>
      </div>
   </div> <!--END MAIN -->
<?php
    require "templates/frontend/version3/blog-footer.php";
?>

 