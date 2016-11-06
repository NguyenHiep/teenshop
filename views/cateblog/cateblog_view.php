 <?php
    require "templates/frontend/version3/blog-header.php";
 ?>
 <div class="main">
      <div class="container">
          <div class="row">
            <!-- BEGIN CONTENT -->
              <div class="content col-md-8">
                <div class="row">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo BASE_URL;?>">Home</a></li>
                        <li class="active"><?php echo $catedata['cat_name'];?></li>
                    </ul>
                    
                  <?php
                  $html = '';
                    if($numrow > 0){
              
                    $name = md5(md5("catelistblog"));
                    $xml = simplexml_load_file("cached/$name.xhtml");
                    $data = $xml->news;
                    $html .= ' <ul class="grid effect-6" id="grid">';
                  
                    foreach($data as $item):
                        if(trim($item->image) != "none"){
                            $html .= '<li>
                            <a href="'.BASE_URL.'danh-muc/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'.'" title="'.$item->title.'">
                            <img src="'.BASE_URL.trim($item->image).'" class="img-responsive" alt="'.$item->title.'" title="'.$item->title.'"/></a>
                            
                            </li>';
                        }else{
                            $html .= '<li>
                            <a href="'.BASE_URL.'danh-muc/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'.'" title="'.$item->title.'">
                            <img src="'.URL_UPLOAD.'default-image.jpg" class="img-responsive" alt="'.$item->title.'" title="'.$item->title.'"/></a>
                            
                            </li>';
                        }    
                       
                    endforeach;
                     $html .= '</ul>';
                 }else{
                     $html .= '<p>Hiện tại thể loại này chưa có bài viết, bạn vui lòng quay lại sau!!!</p>';
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