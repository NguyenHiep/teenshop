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
                    if($number > 0){
                        $name = md5(md5("listblog"));
                        $xml = simplexml_load_file("cached/$name.xhtml");
                        $data = $xml->news;

                        foreach($data as $item):
                        
                    ?>
                         <!-- BEGIN POST ITEM SPECIAL -->
                        <article class="post blog-item blog-item-special col-md-12">
                            <div class="post-content">
                                <figure class="post-media">
                                    <a href="<?php echo BASE_URL.'danh-muc/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>" title="<?php echo $item->title; ?>">
                                    <img src="<?php echo trim($item->image);?>" class="img-responsive" alt="<?php echo $item->slug;?>" title="<?php echo $item->title; ?>" /> 
                                    </a>
                                </figure>
                                <div class="post-content-info"> 
                                    <h2 class="post-category"><?php echo $item->catename; ?></h2>
                                    <h3 class="post-title"><?php echo $item->title; ?> </h3>
                                    <div class="blog-short-description">
                                       <?php
                                            echo $item->short;
                                       ?>
                                    </div>
                                    <div class="post-permalink text-center">
                                        <ul class="breadcrumb">
                                        <li><?php echo $item->author; ?></li>
                                        <li><?php echo date('d m Y', strtotime($item->poston));?></li>
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
                    } //End if($number > 0)
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