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
                        <div class="col-md-12">
                          <div id="map" class="gmaps margin-bottom-40" style="height:400px;"></div>
                        </div>
                        <div class="col-md-9 col-sm-9">
                          <h1>Liên hệ với GIADINHIT.COM</h1>
                          <p>
                            Nếu bạn muốn hợp tác liên hệ, hoặc có những câu hỏi thì hãy liên hệ với mình
                          </p>
                          <p>
                            Nhập đầy đủ nội dung thông tin để mình có thế liên hệ với bạn dễ hơn
                          </p>
                          <!-- BEGIN FORM-->
                          <form action="#" role="form" method="post">
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
                        </div>
                        <!-- BEGIN SIDEBAR -->
                        <div class="col-md-3 col-sm-3 blog-sidebar">
                             <div id="accordion1" class="panel-group" style="margin-top: 20px;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="title-comment panel-title">
                                    <span class="fa fa-book"></span> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1">
                                     Góc học tập
                                    </a>
                                </h2>   
                            </div>
                            <div  style="height: 0;" id="accordion1_1" class="panel-collapse  collapse">
                                <div class="panel-body">
                                    <p class="lead">Metronic is seeking an experienced.</p>

                                    <h4>Requirements</h4>
                                    <ul>
                                        <li>Strong background in PHP and Web application development</li>
                                        <li>Javascript a plus</li>
                                        <li>Bachelor's degree in CS and/or equivalent industry experience</li>
                                    </ul>

                                    <p>Experience building production applications with Metronic would be good to have as well.</p>

                                    <h4>Responsibilities</h4>
                                    <ul>
                                        <li>Conduct detailed analysis of problem domains and customer requirements</li>
                                        <li>Develop innovative software designs and architectures</li>
                                    </ul>

                                    <hr/>
                                    <p>Qualified candidates, send resume and salary requirements with form in the sidebar.</p>
                                </div>
                            </div>
                        </div>         
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h2 class="title-comment panel-title">
                                    <span class="fa fa-list"></span> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_2">
                                     Tuyển dụng
                                    </a>
                                </h2>   
                            </div>
                            <div style="height: 0px;" id="accordion1_2" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    <p class="lead">Metronic is seeking an experienced.</p>

                                    <h4>Requirements</h4>
                                    <ul>
                                        <li>Strong background in PHP and Web application development</li>
                                        <li>Javascript a plus</li>
                                        <li>Bachelor's degree in CS and/or equivalent industry experience</li>
                                    </ul>

                                    <p>Experience building production applications with Metronic would be good to have as well.</p>

                                    <h4>Responsibilities</h4>
                                    <ul>
                                        <li>Conduct detailed analysis of problem domains and customer requirements</li>
                                        <li>Develop innovative software designs and architectures</li>
                                    </ul>

                                    <hr />
                                    <p>Qualified candidates, send resume and salary requirements with form in the sidebar.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                             <div class="panel-heading">
                                <h2 class="title-comment panel-title">
                                    <span class="fa fa-hand-o-right"></span> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_3">
                                     Like page facebook
                                    </a>
                                </h2>   
                                </div>
                            <div  id="accordion1_3" class="panel-collapse in collapse">
                                 <div class="panel-body">
                                    <!-- BEGIN CODE LIKE PAGE -->
                                     <div class="fb-page" data-href="https://www.facebook.com/daigiadinhcntt/" data-width="100%" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/daigiadinhcntt/"><a href="https://www.facebook.com/daigiadinhcntt/">Hỏi đáp lập trình</a></blockquote></div></div>
                                    <!-- END CODE LIKE PAGE -->
                                </div>
                            </div>
                        </div>
                    </div>    
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