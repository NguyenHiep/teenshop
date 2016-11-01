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
                                    <a href="<?php echo BASE_URL.'on-tap/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>" title="<?php echo $item->title; ?>">
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
                                        <a href="<?php echo BASE_URL.'on-tap/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>" class="btn btn-success">Đọc tiếp</a>
                                    </div>
                                </div>
                                    
                            </div>
                        </article>
                  <!-- END POST ITEM SPECIAL -->
                    <?php    
                        endforeach;
                    } //End if($number > 0)
                  ?> 
                
                <!--
                  <article class="post blog-item col-md-6">
                     <div class="post-content">
                        <figure class="post-media">
                            <a href="#" title="Image post">
                            <img src="img/items03.jpg" class="img-responsive" alt="item special" title="item special" /> 
                            </a>
                        </figure>
                         <div class="post-content-info">
                             <h2 class="post-category">BUSINESS </h2>
                            <h3 class="post-title">Lorem Ipsum is simply dummy text of the </h3>
                            <div class="blog-short-description">
                                orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. I
                            </div>
                            <div class="post-permalink text-center">
                                <ul class="breadcrumb">
                                <li>Lida Paymer</li>
                                <li>27 December 2014</li>
                                <li>12 Comments</li>
                                </ul>
                            </div>
                            <div class="post-morelink">
                                <a href="detail.html" class="btn btn-success">Read More</a>
                            </div>
                         </div>
                    </div>
                  </article>

                  <article class="post blog-item col-md-6">
                        <div class="post-content">
                            <figure class="post-media">
                                <a href="#" title="Image post">
                                <img src="img/items02.jpg" class="img-responsive" alt="item special" title="item special" /> 
                                </a>
                            </figure>
                            <div class="post-content-info">
                                <h2 class="post-category">BUSINESS </h2>
                                <h3 class="post-title">Lorem Ipsum is simply dummy text of the </h3>
                                <div class="blog-short-description">
                                    orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. I
                                </div>
                                <div class="post-permalink text-center">
                                    <ul class="breadcrumb">
                                    <li>Lida Paymer</li>
                                    <li>27 December 2014</li>
                                    <li>12 Comments</li>
                                    </ul>
                                </div>
                                <div class="post-morelink">
                                    <a href="detail.html" class="btn btn-success">Read More</a>
                                </div>
                            </div>
                          
                     </div>
                  </article>
                
                 
                  <article class="post blog-item blog-item-special col-md-12">
                      <div class="post-content">
                        <figure class="post-media">
                            <a href="#" title="Image post">
                            <img src="img/items04.jpg" class="img-responsive" alt="item special" title="item special" /> 
                            </a>
                        </figure>
                        <div class="post-content-info">
                            <h2 class="post-category">BUSINESS </h2>
                            <h3 class="post-title">Lorem Ipsum is simply dummy text of the </h3>
                            <div class="blog-short-description">
                                orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. I
                            </div>
                            <div class="post-permalink text-center">
                                <ul class="breadcrumb">
                                <li>Lida Paymer</li>
                                <li>27 December 2014</li>
                                <li>12 Comments</li>
                                </ul>
                            </div>
                            <div class="post-morelink">
                                <a href="detail.html" class="btn btn-success">Read More</a>
                            </div>  
                        </div>    
                     </div>
                  </article>
                 
                  <article class="post blog-item blog-item-special col-md-12">
                      <div class="post-content">
                        <figure class="post-media">
                           <div class="col-md-6">
                                <a href="#" title="Image post">
                            <img src="img/items05.jpg" class="img-responsive" alt="item special" title="item special" /> 
                            </a>
                            
                           </div>
                           <div class="col-md-6">
                               <div class="row">
                                   <a href="#" title="Image post">
                                    <img src="img/items05-02.jpg" class="img-responsive" alt="item special" title="item special" /> 
                                    </a>
                               </div>
                               <div class="row">
                                    <a href="#" title="Image post">
                                        <img src="img/items05-03.jpg" class="img-responsive" alt="item special" title="item special" /> 
                                    </a>
                               </div>
                           </div>
                        </figure>
                        <div class="clearfix"></div>
                        <div class="post-content-info">
                            <h2 class="post-category">BUSINESS </h2>
                            <h3 class="post-title">Lorem Ipsum is simply dummy text of the </h3>
                            <div class="blog-short-description">
                                orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. I
                            </div>
                            <div class="post-permalink text-center">
                                <ul class="breadcrumb">
                                <li>Lida Paymer</li>
                                <li>27 December 2014</li>
                                <li>12 Comments</li>
                                </ul>
                            </div>
                            <div class="post-morelink">
                                <a href="detail.html" class="btn btn-success">Read More</a>
                            </div>   
                        </div>
                          
                     </div>
                  </article>
                -->
                  <div class=" text-center col-md-12 post-pagination">
                      <ul class="pagination">
                              <li><a href="#"><i class="fa fa-long-arrow-left"></i> Prev</a></li>
                              <li><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li class="active"><a href="#">3</a></li>
                              <li><a href="#">4</a></li>
                              <li><a href="#">5</a></li>
                              <li><a href="#">Next <i class="fa fa-long-arrow-right"></i></a></li>
                      </ul>
                  </div>
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