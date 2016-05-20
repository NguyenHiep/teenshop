<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
    $mblog = new Model_Blog();
    $numbers = $mblog->coutBlogMore($_POST["id"]);
    $allRows = $numbers['num_rows'];
    $showLimit = 4;
    
    //get rows query
    
    $query = $mblog->getBlogMore($_POST['id'], $showLimit);
    //number of rows
    $rowCount = $mblog->num_rows($query);
    if($rowCount > 0){ 
        foreach($query as $data):
        $tutorial_id = $data["blog_id"]; 
    ?>
     <div class="row">
                    <div class="col-md-4 col-sm-4 gallery-item">
                    <?php
                        if(trim($data['image']) != "none"){
                            
                    ?>
                       <a data-rel="fancybox-button" title="<?php echo $data['blog_name'];?>" href="<?php echo trim($data['image']); ?>" class="fancybox-button">
                            <img alt="" src="<?php echo trim($data['image']); ?>" class="img-responsive" />
                            <div class="zoomix"><i class="fa fa-search"></i></div>
                       </a> 
                    <?php
                        }else{ //Neu khong co image
                    ?>
                         <a data-rel="fancybox-button" title="<?php echo $data['blog_name'];?>" rel="nofollow" href="<?php echo URL_UPLOAD.'blog/noneimage.png'; ?>" class="fancybox-button">
                                <img alt="" src="<?php echo "http://placehold.it/250x220"; ?>"  class="img-responsive" />
                                <div class="zoomix"><i class="fa fa-search"></i></div>
                           </a> 
                    <?php        
                        }
                    ?>
                    </div>
                    <div class="col-md-8 col-sm-8 detail-content-post">
                      <h2><a href="<?php echo BASE_URL.'on-tap/'.trim($data['slugcate']).'/'.trim($data['slug']).'-'.$data['blog_id'].'.html'; ?>"><?php echo $data['blog_name'];?></a></h2>
                      <ul class="blog-info">
                        <li><i class="fa fa-user-secret"></i> <?php echo $data['author'];?></li>
                        <li><i class="fa fa-calendar"></i> <?php echo date("d/m/Y",strtotime($data['post_on'])); ?></li>
                        <li><i class="fa fa-list"></i> <?php echo $data['cat_name'];?></li>
                        <li><i class="fa fa-eye"></i> <?php echo $data['view_post']; ?> views</li>
                      </ul>
                      <section class="item">
                            <p><?php echo $data['short_content']; ?></p>
                      <a href="<?php echo BASE_URL.'on-tap/'.trim($data['slugcate']).'/'.trim($data['slug']).'-'.$data['blog_id'].'.html'; ?>" class="btn btn-primary pull-right more">Xem chi tiết <i class="icon-angle-right"></i></a>
                      </section>
                    </div>
                  </div>
                  <hr class="blog-post-sep" />
    <?php       
        endforeach;
    ?>
    <?php if($allRows > $showLimit){ ?>
        <div class="row show_more_main" id="show_more_main<?php echo $tutorial_id; ?>">
            <span id="<?php echo $tutorial_id; ?>" class="show_more" title="Hiển thị nhiều bài viết hơn nữa">Hiển thị nhiều hơn nữa </span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading…</span></span>
        </div>
    <?php } //End ($allRows > $showLimit) ?>  
    <?php 
        } //End if ($rowCount > 0)
    }
?>