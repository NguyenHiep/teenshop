  <?php
    require "templates/frontend/version3/blog-header.php";
 ?>
 <?php
    $name = md5(md5("Blogdetail"));
    $xml = simplexml_load_file("cached/$name.xhtml");
    $data = $xml->news;
    
 ?>

 <div class="main">
      <div class="container">
          <div class="row">
            <!-- BEGIN CONTENT -->
              <div class="content col-md-8">
                <div class="row">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo BASE_URL;?>">Home</a></li>
                        <li><a href="<?php echo BASE_URL.'danh-muc/'.trim($data->slugcate).'.html';?>"><?php echo $data->catename;?></a></li>
                        <li class="active"><?php echo $data->title; ?></li>
                    </ul>
                 </div>
                 <div class="row">
                    <div class="col-md-12 bg-white">
                          <?php
                            if(trim($data->image) != "none"){
                        ?>
                           <div class="blog-item-img row">           
                             <img class="img-responsive" src="<?php echo trim($data->image); ?>" alt="<?php echo $data->title;?>" title="<?php echo $data->title;?>"/>        
                          </div>
                       <?php
                        } //End data->image == none
                       ?>                    
                            <h1 class="title-post-blog"><?php echo $data->title; ?></h1>
                             <ul class="blog-info list-inline">
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
                                <li><i class="fa fa-list"></i> <a href="<?php echo BASE_URL.'danh-muc/'.trim($data->slugcate).'.html';?>"><?php echo $data->catename;?> </a></li>
                                <li><i class="fa fa-eye"></i> <?php echo $data->viewpost; ?> views</li>
                              </ul>
                        
                            <article class="content-blog">
                                <div class="content-blog">
                                    <?php echo $data->full; ?>
                                </div>
                                <div class="pagination-post">
                                    <?php echo $post_link; ?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="share-post-social">
                                    <h2 class="text-uppercase post-content-title"><i class="fa fa-share-alt-square" aria-hidden="true"></i> Chia sẻ bài viết</h2>
                                    <div id="share-post-social">
                                        <input id="sharepost" type="text" value="<?php echo $urlsocial;?>" class="form-control" readonly="readonly"/>
                                    </div>
                                </div> 
                                <?php
                                    if($count_relapost > 0){
                                ?>
                                  <h2 class="text-uppercase post-content-title"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Bài viết cùng chuyên mục</h2>
                                 <ol class="list-post-related">
                                    <?php
                                        foreach($relapost as $post):
                                    ?>
                                        <li><a href="<?php echo BASE_URL.'danh-muc/'.trim($post['slugcate']).'/'.trim($post['slug']).'-'.$post['blog_id'].'.html'; ?>"><?php echo $post['blog_name'];?></a></li>
                     
                                    <?php
                                        endforeach;
                                    ?>
                                </ol>
                                <?php        
                                    } //End count
                                ?>
                               
                            </article>
                    </div>             
                  </div>
                    <hr class="line-bottom" />
                    <div class="row bg-white">
                        <div class="col-md-12 comment-blog">
                            <h2 class="text-uppercase post-content-title"><i class="fa fa-comments" aria-hidden="true"></i> Bình luận</h2>
                            <div class="facebook-comment">
                                <div class="fb-comments" data-href="<?php echo $urlsocial;?>" data-width="100%" data-numposts="5"></div>
                            </div>
                          </div>             
                    </div>
                    
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

 
 