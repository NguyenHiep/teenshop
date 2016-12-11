 <?php
    require "templates/frontend/version3/blog-header.php";
 ?>
<div class="main">
      <div class="container">
          <div class="row">
              <div class="content col-md-8">
                <div class="row">
                  <div class="col-md-12 news-block-post">
                      <h2 class="title-popular-post">Bài viết phổ biến</h2>
                  </div>
                  <div id="post-content-list">
                   <?php
                    $name = md5(md5("listblog"));
                    if(file_exists("cached/homepage_$name.xhtml")){
                        //if($number > 0){
                        $xml = simplexml_load_file("cached/homepage_$name.xhtml");
                        $data = $xml->news;
                        foreach($data as $item):    
                    ?>
                         <!-- BEGIN POST ITEM SPECIAL -->
                        <article class="post blog-item blog-item-special col-md-12">
                            <div class="post-content">
                             <?php if(trim($item->image) != 'none'): ?>
                                <figure class="post-media">
                                    <a href="<?php echo BASE_URL.'danh-muc/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>" title="<?php echo $item->title; ?>">
                                        <img src="<?php echo BASE_URL.trim(ltrim($item->image,'/'));?>" class="img-responsive" alt="<?php echo $item->slug;?>" title="<?php echo $item->title; ?>" /> 
                                    </a>
                                </figure>
                                 <?php endif;?>
                                <div class="post-content-info"> 
                                    <span class="post-category"><?php echo $item->catename; ?></span>
                                    <h3 class="post-title"><?php echo $item->title; ?> </h3>
                                    <div class="blog-short-description">
                                       <?php
                                            echo $item->short;
                                       ?>
                                    </div>
                                    <div class="post-permalink text-center">
                                        <ul class="breadcrumb">
                                        <li><?php echo $item->author; ?></li>
                                        <li><?php echo date('d F Y', strtotime($item->poston));?></li>
                                        <li><?php echo $item->comment; ?> Bình luận </li>
                                        </ul>
                                    </div>
                                    <div class="post-morelink">
                                        <a href="<?php echo BASE_URL.'danh-muc/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>" class="btn btn-success">Đọc tiếp</a>
                                    </div>
                                </div>
                                    
                            </div>
                        </article>
                  <!-- END POST ITEM SPECIAL -->
                    <?php    
                        endforeach;
                  ?>
                  <div class=" text-center col-md-12 post-pagination">
                      <?php
                        echo $pagination->createLinks();
                      ?>
                     
                  </div>
                  <?php      
                    //  } //End if($number > 0)
                  } //End  if(file_exists("cached/homepage_$name.xhtml")){
                    else{
                        echo "<div class='col-md-12'>Bài viết đang được cập nhật!</div>";
                    }
                  ?> 
                </div> <!-- END DIV#POST-CONTENT -->
               
                  
                </div>
                </div>
                <!-- END CONTENT -->
                <?php
                     require "templates/frontend/version3/blog-sidebar.php";
                ?>
          
          </div>
      </div>
      
   </div>
<?php
    require "templates/frontend/version3/blog-footer.php";
?>