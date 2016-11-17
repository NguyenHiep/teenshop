 <?php
    require "templates/frontend/version3/blog-header.php";
 ?>
 <div class="main">
      <div class="container">
          <div class="row">
            <!-- BEGIN CONTENT -->
              <div class="content col-md-8 category-blog">
                <div class="row">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo BASE_URL;?>">Home</a></li>
                        <li class="active"><?php echo $catedata['cat_name'];?></li>
                    </ul>
                    <div class="col-md-12 news-block-post">
                      <h2 class="title-popular-post"><?php echo $catedata['cat_name'];?></h2>
                      
                      <?php
                            if(trim($description) !== ""){
                                $html  = '';
                                $html .= '<div class="description-category">';
                                $html .= $description;
                                $html .= '</div>';
                                echo $html;
                            }
                      ?>
                      
                  </div>
                  <?php
                  $html = '';
                    if($numrow > 0){
              
                    $name = md5(md5("catelistblog"));
                    $xml = simplexml_load_file("cached/$name.xhtml");
                    $data = $xml->news;
                   // $html .= ' <ul class="grid effect-6" id="grid">';
                  
                    foreach($data as $item):
                       
                            //$html .= '<li>
                           // <a href="'.BASE_URL.'danh-muc/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'.'" title="'.$item->title.'">
                           // <img src="'.BASE_URL.trim($item->image).'" class="img-responsive" alt="'.$item->title.'" title="'.$item->title.'"/></a>
                            
                           // </li>';
                            $html .= '<article class="post blog-item col-md-12">
                                    <div class="post-content">';
                                     if(trim($item->image) != "none"){
                                        $html .='<figure class="post-media">
                                            <a href="'.BASE_URL.'danh-muc/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'.'" title="'.$item->title.'">
                                            <img src="'.BASE_URL.trim($item->image).'" class="img-responsive" alt="'.$item->title.'" title="'.$item->title.'"/>
                                            </a></figure>';
                                      }     
                                        $html .='
                                        <div class="post-content-info">
                                            <h3 class="post-title"><a href="'.BASE_URL.'danh-muc/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'.'" title="'.$item->title.'">'.$item->title.'</a></h3>
                                            <div class="blog-short-description">
                                                '.$item->short.'
                                            </div>
                                            <div class="post-permalink text-center">
                                                <ul class="breadcrumb">
                                                <li>'.$item->author.'</li>
                                                <li>'.date("d F Y",strtotime($item->poston)).'</li>
                                                <li>'.$item->comment.' Bình luận</li>
                                                </ul>
                                            </div>
                                            <div class="post-morelink">
                                                <a title="Đọc tiếp" href="'.BASE_URL.'danh-muc/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'.'" class="btn btn-success">Đọc tiếp</a>
                                            </div>
                                        </div>
                                      
                                 </div>
                              </article>';
            
                       
                    endforeach;
                    // $html .= '</ul>';
                 }else{
                     $html .= '<p class="col-md-12">Hiện tại thể loại này chưa có bài viết, bạn vui lòng quay lại sau!!!</p>';
                 }
                 echo $html;
                 
                 ?>
                  
                 </div>
                 <div class="row">
            	       <?php
                            if($totalItems >1){
                                $start = $position + 1;
                                $limit = $totalItemsPage*$currentPage;
                                if($limit > $totalItems){
                                    $limit = $totalItems;
                                }
                       ?>
                          <div class="col-md-12">
                            <div class="summary-pagination">
                                Bài viết từ <?php echo $start; ?> đến <?php echo $limit; ?> trên tổng cộng <?php echo $totalItems;?>
                            </div>
                            <div class="post-pagination">
                                <?php 
                                        echo $paginationHTML;
                                ?>
                            </div>   
                          </div>
                       <?php }//End if ?>
                    </div>
                    <div class="clearfix"></div>
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