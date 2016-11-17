  <?php
    require "templates/frontend/version3/blog-header.php";
 ?>
 <div class="main">
      <div class="container">
          <div class="row">
            <!-- BEGIN CONTENT -->
              <div class="content col-md-8 page-contact">
                <div class="row">
                     <ul class="breadcrumb">
                        <li><a href="<?php echo BASE_URL;?>">Home</a></li>
                        <li class="active">Liên hệ</li>
                    </ul>
                     <h1 class="col-md-12 text-uppercase text-center">Liên hệ</h1>
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
                              <input type="text" class="form-control" name="contacts-name" id="contacts-name" required="required" placeholder="Họ và tên người liên hệ(bắt buộc)"/>
                            </div>
                            <div class="form-group col-md-9">
                              <!-- <label for="contacts-email">Email <span class="require">*</span></label> -->
                              <input type="email" class="form-control" id="contacts-email" required="required" placeholder="Email liên hệ (bắt buộc)"/>
                            </div>
                            <div class="form-group col-md-12">
                              <!-- <label for="contacts-message">Nội dung liên hệ</label> -->
                              <textarea class="form-control" rows="5" id="contacts-message" placeholder="Nội dung liên hệ (bắt buộc)"></textarea>
                            </div>
                             <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
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
                            <div class="clearfix"></div>
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-md-6">&nbsp;</div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success  pull-right"><i class="icon-ok"></i> Gửi thông tin</button>
                                    </div>
                                    
                                </div>
                                <!-- <button type="button" class="btn btn-success">Hủy bỏ</button> -->
                            </div>
                          </form>
                         </div>
                    </div>
                    <!-- <div id="map" class="gmaps margin-bottom-40 margin-top-20" style="height:400px;"></div> -->
                </div>
                </div>
                <!-- END CONTENT -->
                <?php
                     require "templates/frontend/version3/blog-sidebar.php";
                ?>
          
          </div>
      </div>
      
   </div> <!--END MAIN -->
<?php
    require "templates/frontend/version3/blog-footer.php";
?>

 