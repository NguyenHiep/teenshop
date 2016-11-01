 <?php
    require "templates/frontend/version3/blog-header.php";
 ?>
 
<div class="main">
      <div class="container">

        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
           
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR --> 
                  
                <div class="col-md-9 blog-posts">
                        <?php
                             if($totalSlider > 0){
                        ?>
                    <!-- BEGIN SLIDER -->
                    <div class="row" id="slider-home" style="padding-top: 15px; padding-bottom: 15px;">
                        
                           <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                              <?php
                               
                                    for($i=0; $i < $totalSlider; $i++){
                                        $active ='';
                                      if($i == 0){
                                        $active = 'class="active"';
                                      }
                              ?>
                                <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" <?php echo $active; ?> ></li>
                               
                              <?php
                                    } //End for loop 
                              ?>
                              </ol>
                            
                              <div class="carousel-inner" role="listbox">
                              <?php
                                    $dem = 1;
                                    foreach($dataSlider as $slide):
                                    $dem++;
                              ?>
                                <div class="item <?php echo ($dem >2)? " ":"active"; ?>">
                                  <img src="<?php echo URL_UPLOAD.trim($slide['image']); ?>" alt="<?php echo $slide['alt']?>" />
                                      <div class="carousel-caption">
                                        <h3><?php echo $slide['title']; ?></h3>
                                        <p><?php echo $slide['content']; ?></p>
                                      </div>
                                </div>
                                <?php
                                    endforeach;
                                ?>
                              </div>
                            
                              <!-- Left and right controls -->
                              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Quay lại</span>
                              </a>
                              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Xem tiếp</span>
                              </a>
                        </div>
                       
                    </div>  <!-- END SLIDER-->
                     <?php
                            } //End if($totalSlider > 0
                     ?>
                    <br />
                    
                    <div class="blog-list">
                    <?php
                    if($number > 0){
                        $name = md5(md5("listblog"));
                        $xml = simplexml_load_file("cached/$name.xhtml");
                        $data = $xml->news;

                        foreach($data as $item):
                    ?>
                      <div class="row">
                        <div class="col-md-4 col-sm-4 gallery-item">
                        <?php
                            if(trim($item->image) != "none"){
                                
                        ?>
                           <a data-rel="fancybox-button" title="<?php echo $item->title;?>" href="<?php echo trim($item->image); ?>" class="fancybox-button">
                                <img alt="" src="<?php echo trim($item->image); ?>" class="img-responsive" />
                                <div class="zoomix"><i class="fa fa-search"></i></div>
                           </a> 
                        <?php
                            }else{ //Neu khong co image
                        ?>
                             <a data-rel="fancybox-button" title="<?php echo $item->title;?>" rel="nofollow" href="<?php echo URL_UPLOAD.'blog/noneimage.png'; ?>" class="fancybox-button">
                                <img alt="" src="<?php echo "http://placehold.it/250x220"; ?>"  class="img-responsive" />
                                <div class="zoomix"><i class="fa fa-search"></i></div>
                           </a> 
                        <?php        
                            }
                        ?>
                        </div>
                        <section class="col-md-8 col-sm-8 detail-content-post item">
                          <h2><a href="<?php echo BASE_URL.'on-tap/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>"><?php echo $item->title;?></a></h2>
                          <ul class="blog-info">
                            <li><i class="fa fa-user-secret"></i> <?php echo $item->author;?></li>
                            <li><i class="fa fa-calendar"></i> <?php echo date("d/m/Y",strtotime($item->poston)); ?></li>
                            <li><i class="fa fa-list"></i> <?php echo $item->catename;?></li>
                            <li><i class="fa fa-eye"></i> <?php echo $item->viewpost; ?> views</li>
                          </ul>
                         
                         <div><?php echo $item->short; ?></div>
                          
                          <a href="<?php echo BASE_URL.'on-tap/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>" class="btn btn-primary pull-right more">Xem chi tiết <i class="icon-angle-right"></i></a>
                          
                        </section>
                      </div>
                      <hr class="blog-post-sep" />
                  <?php    
                    endforeach;
                    } //End if($number > 0)
                  ?> 
                 </div> <!-- End .blog-list -->
                <?php 
                    if($number > 0){
                ?>
                <div class="row show_more_main" id="show_more_main<?php echo $item['newsid']; ?>">
                    <span id="<?php echo $item['newsid']; ?>" class="show_more" title="Hiển thị nhiều bài viết hơn nữa">Hiển thị nhiều hơn nữa</span>
                    <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
                </div>
                
                <?php
                    }
                ?>
                </div>
                <!-- END LEFT SIDEBAR -->
                <?php
                     require "templates/frontend/version3/blog-sidebar.php";
                ?>    
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

<?php
    require "templates/frontend/version3/blog-footer.php";
?>