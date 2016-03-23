 <?php
    require "templates/frontend/version1/blog-header.php";
 ?>
 <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo BASE_URL;?>">Home</a></li>
            <li class="active"><?php echo $catedata['cat_name'];?></li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
           
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-posts">
                <?php
                    if($numrow > 0){
                ?>
                  <?php
                    $name = md5(md5("catelistblog"));
                    $xml = simplexml_load_file("cached/$name.xhtml");
                    $data = $xml->news;
                    foreach($data as $item):
                  ?>
                  <div class="row">
                    <div class="col-md-4 col-sm-4 gallery-item">
                       <a data-rel="fancybox-button" title="<?php echo $item->title;?>" href="<?php echo URL_UPLOAD.'blog/'.trim($item->image); ?>" class="fancybox-button">
                            <img alt="" src="<?php echo URL_UPLOAD.'blog/'.trim($item->image); ?>" class="img-responsive" />
                            <div class="zoomix"><i class="fa fa-search"></i></div>
                       </a> 
                    
                    </div>
                    <div class="col-md-8 col-sm-8 detail-content-post">
                      <h2><a href="<?php echo BASE_URL.'on-tap/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>"><?php echo $item->title;?></a></h2>
                      <ul class="blog-info">
                        <li><i class="fa fa-user-secret"></i> <?php echo $item->author;?></li>
                        <li><i class="fa fa-calendar"></i> <?php echo date("d/m/Y",strtotime($item->poston)); ?></li>
                        <li><i class="fa fa-list"></i> <?php echo $item->catename;?></li>
                        <li><i class="fa fa-eye"></i> <?php echo $item->viewpost; ?> views</li>
                      </ul>
                      <section class="item">
                            <p><?php echo wordLimiter($item->full, 75, '...'); ?></p>
                      <a href="<?php echo BASE_URL.'on-tap/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>" class="more">Xem chi tiết <i class="icon-angle-right"></i></a>
                      </section>
                    </div>
                  </div>
                  <hr class="blog-post-sep" />
                  <?php    
                    endforeach;
                  ?> 
                  <div class="row">
            	       <?php
                            if($totalItems >1){
                                $start = $position + 1;
                                $limit = $totalItemsPage*$currentPage;
                                if($limit > $totalItems){
                                    $limit = $totalItems;
                                }
                       ?>
                        <div class="col-md-7 col-sm-7 items-info">
                            Bài viết từ <?php echo $start; ?> đến <?php echo $limit; ?> trên tổng cộng <?php echo $totalItems;?>
                        </div>
                          <div class="col-md-5 col-sm-5 pull-right">
                               <?php 
                                        echo $paginationHTML;
                                ?>
                          </div>
                       <?php }//End if ?>
                    </div>
                    <div class="clearfix"></div>
                <?php }else{
                    echo '<p>Hiện tại thể loại này chưa có bài viết, bạn vui lòng quay lại sau!!!</p>';
                } ?>           
                </div>
                <!-- END LEFT SIDEBAR -->
                <?php
                     require "templates/frontend/version1/blog-sidebar.php";
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
    require "templates/frontend/version1/blog-footer.php";
?>