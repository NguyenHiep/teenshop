
                <!-- BEGIN RIGHT SIDEBAR -->            
                <div class="col-md-3 col-sm-3 blog-sidebar">
                  <!-- CATEGORIES START -->
                  <h2 class="no-top-space title-comment"><span class="fa fa-th-list"></span>Quảng cáo</h2>
                  <!--<ul class="nav sidebar-categories margin-bottom-40">
                    <li><a href="javascript:;">London (18)</a></li>
                    <li><a href="javascript:;">Moscow (5)</a></li>
                    <li class="active"><a href="javascript:;">Paris (12)</a></li>
                    <li><a href="javascript:;">Berlin (7)</a></li>
                    <li><a href="javascript:;">Istanbul (3)</a></li>
                  </ul>
                  -->
                  <ul class="nav sidebar-categories margin-bottom-40">
                    <?php
                    /*
                        $mcate = new Model_CateBlog();
                        $listCate = $mcate->listCategory();
                        $htmlcate = '';
                        foreach($listCate as $list):
                        $htmlcate.= '<li ';
                        if(isset($_GET['catid']) && validate_int($_GET['catid']) == true && $_GET['catid'] >0 && $_GET['catid'] == $list['cat_id']){
                            $htmlcate.= " class='active'";
                        }
                        //index.php?controller=cateblog&action=list&catid='.$list['cat_id'].'&slug='.trim($list['slug'])'; 
                        $htmlcate.= '><a href="'.BASE_URL.'on-tap/'.trim($list['slug']).'-'.$list['cat_id'].'.html'.'"> '.$list['cat_name'].' ('.$list['sumblog'].')</a></li>';
                       //$htmlcate.= '><a href="'.BASE_URL.'on-tap/'.trim($list['slug']).'-'.$list['cat_id'].'.html'.'"> '.$list['cat_name'].' ('.$list['sumblog'].')</a></li>';
                        endforeach;
                        echo $htmlcate;
                        //on-thi-dai-hoc/mon-hoc/(.*)-([0-9]+).html
                        */
                    ?>
                  </ul>
                  <!-- CATEGORIES END -->

                  <!-- BEGIN RECENT NEWS -->                            
                  <h2 class="title-comment">
                    <span class="fa fa-eye"></span>Bài viết xem nhiều</h2>
                    <div id="most-view-blog" style="background: #222;">

                    
                     <?php
                        $mblog = new Model_Blog();
                        $listMostView = $mblog->listMostView();
                        $stt = 0;
                        foreach($listMostView as $list):
                        
                        $stt++;
                     ?>
                        <article>
                         <div class="recent-news margin-bottom-10">
                            <div class="row margin-bottom-10">
                              <!--<div class="col-md-2">
                                <span class="display:block; background: #FFF; color: red !important;"><?php echo $stt; ?> </span>
                              </div>
                              -->
                              <div class="col-md-12 recent-news-inner">
                                <!-- on-tap/lap-trinh-web-1/xu-ly-ngay-gio-trong-php-9.html-->
                                    <h3><a href="<?php echo BASE_URL.'on-tap/'.trim($list['slugcate']).'/'.trim($list['slug']).'-'.$list['blog_id'].'.html'; ?>"><?php echo $list['blog_name'];?></a></h3>
                                    <div class="item-description">
                                    <?php echo wordLimiter($list['short_content'], 15, '...');?>
                                    <i class="fa fa-eye"></i> <?php echo $list['view_post'];?> views
                                </div>
                              </div>                        
                            </div>
                          </div>
                         </article>
                         <div class="clearfix"></div>
                     <?php       
                        endforeach;
                    ?>
                    </div>
                  <!-- END RECENT NEWS -->                            

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
                                   <p class="lead">Đang cập nhật</p>
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
                                    <p class="lead">Đang cập nhật</p>
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
                                    <div class="fb-page"
                                      data-href="https://www.facebook.com/daigiadinhcntt" 
                                      data-width="340"
                                      data-hide-cover="false"
                                          data-show-facepile="true">
                                    </div>
                                    <!-- END CODE LIKE PAGE -->
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                <!-- END RIGHT SIDEBAR -->