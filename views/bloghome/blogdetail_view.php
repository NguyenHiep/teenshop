 <?php
    require "templates/frontend/version1/blog-header.php";
    $name = md5(md5("Blogdetail"));
    $xml = simplexml_load_file("cached/$name.xhtml");
    $data = $xml->news;
    
 ?>

 <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo BASE_URL;?>">Home</a></li>
            <li><a href="<?php echo BASE_URL.'on-tap/'.trim($data->slugcate).'-'.$data->cateid.'.html';?>"><?php echo $data->catename;?></a></li>
            <li class="active"><?php echo $data->title; ?></li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
           
            <div class="content-page">
              <div class="row">
              
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-item">
                    <div class="row">
                     <?php
                            if(trim($data->image) != "none"){
                        ?>
                        <div class="blog-item-img">
                       
                            <!-- BEGIN CAROUSEL -->            
                            <div class="front-carousel">
                              <div id="myCarousel" class="carousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                  <div class="item active">
                                    <img src="<?php echo trim($data->image); ?>" alt="<?php echo $data->title;?>" />
                                  </div>
                                </div>
                                <!-- Carousel nav -->
                                <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                  <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                  <i class="fa fa-angle-right"></i>
                                </a>
                              </div>                
                            </div>
                            <!-- END CAROUSEL -->             
                          </div>
                       <?php
                        } //End data->image == none
                       ?>
                           <h1 class="" style="margin-top: 10px;"><?php echo $data->title; ?></h1>
                             <ul class="blog-info">
                                <li>
                                    <i class="fa fa-user-secret"></i>
                                     <?php 
                                            if(!empty($data->nickname)){
                                                 echo $data->nickname;
                                            }else{
                                                echo $data->author;
                                            }
                                        ?>
                                </li>
                                <li><i class="fa fa-calendar"></i> <?php echo date("d/m/Y",strtotime($data->poston)); ?></li>
                                <li><i class="fa fa-list"></i> <?php echo $data->catename;?></li>
                                <li><i class="fa fa-eye"></i> <?php echo $data->viewpost; ?> views</li>
                              </ul>
                            <article class="content-blog">
                                <?php echo $data->full; ?>
                                <?php
                               // echo sizeof($relapost);
                       
                                    if($count_relapost > 0){
                                ?>
                                  <hr class="blog-post-sep" />
                                  <h2>Bài viết liên quan</h2>
                                 <ol>
                                    <?php
                                        foreach($relapost as $post):
                                    ?>
                                        <li><a href="<?php echo BASE_URL.'on-tap/'.trim($post['slugcate']).'/'.trim($post['slug']).'-'.$post['blog_id'].'.html'; ?>"><?php echo $post['blog_name'];?></a></li>
                     
                                    <?php
                                        endforeach;
                                    ?>
                                </ol>
                                <?php        
                                    } //End count
                                ?>
                               
                            </article>
                          <hr class="blog-post-sep" />
                         <div class="base-box single-box about-the-author">
                            <div class="author_avatar">
                                <img src="<?php 
                                                if(!empty($data->avartar)){
                                                    echo URL_UPLOAD.trim($data->avartar);
                                                }else{
                                                    echo URL_UPLOAD.'avatart-none.png';
                                                }
                                                
                                            ?>
                                        " class="avatar avatar-80 photo disappear appear" width="90" height="90" alt="<?php echo $data->author;?>" />
                            </div>
                            <div class="author_desc">
                                <h3 class="vcard author">
                                    <span class="fn">
                                        <a href="#">
                                        <?php 
                                            if(!empty($data->nickname)){
                                                 echo $data->nickname;
                                            }else{
                                                echo $data->author;
                                            }
                                        ?>
                                       </a>
                                    </span>
                                </h3>
                                <p>
                                  <?php
                                    echo $data->instruction;
                                  ?>                     
                                </p>
                                <div class="mom-socials-icons author-social-icons">
                                    <ul class="list-unstyled">
                                        <li class="home"><a target="_blank" href="<?php if(!empty($data->facebook)) echo $data->facebook; else "https://www.facebook.com/"; ?>" rel="nofollow"><i class="fa fa-home"></i></i></a></li>    
                                        <li class="facebook"><a target="_blank" href="<?php if(!empty($data->facebook)) echo $data->facebook; else "https://www.facebook.com/"; ?>" rel="nofollow"><i class="fa fa-facebook-official"></i></a></li>     
                                        <li class="googleplus"><a target="_blank" href="<?php if(!empty($data->facebook)) echo $data->google; else "https://www.facebook.com/"; ?>"  rel="nofollow"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="twitter"><a target="_blank" href="<?php if(!empty($data->facebook)) echo $data->twitter; else "https://www.facebook.com/"; ?>" rel="nofollow"><i class="fa fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                        
                            </div>
                        <div class="clear"></div>
                        </div>
                        <div class="clearfix"></div>
                         <div class="comment-blog">
                            <h2 class="title-comment"><span>Bình luận</span></h2>
                            <div class="clearfix"> </div>
                            <div class="facebook-comment">
                               <div class="fb-comments" data-href="<?php echo $actual_link;?>" data-width="100%" data-numposts="5"></div>                       
                            </div>
                         </div>  
                    </div> 
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