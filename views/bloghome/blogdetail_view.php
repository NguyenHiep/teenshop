  <?php
    require "templates/frontend/version3/blog-header.php";
 ?>
 <?php
    $name = md5(md5("Blogdetail{$pid}"));
    $xml = simplexml_load_file("cached/BlogDetail_{$pid}$name.xhtml");
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
                             <!--
                            <div id="toc" class="toc">
                                    <div id="toctitle">
                                        <h2 class="text-uppercase">Mục lục</h2>
                                        <span class="toctoggle">&nbsp;[<a role="button" tabindex="0" id="togglelink">ẩn</a>]&nbsp;</span>
                                    </div>
                                    <ul>
                                    <li class="toclevel-1 tocsection-1"><a href="<?php echo $urlsocial;?>#T.C3.A1c_d.E1.BB.A5ng_c.E1.BB.A7a_CSS"><span class="tocnumber">1</span> <span class="toctext">Tác dụng của CSS</span></a></li>
                                    <li class="toclevel-1 tocsection-2"><a href="#S.E1.BB.AD_d.E1.BB.A5ng_CSS"><span class="tocnumber">2</span> <span class="toctext">Sử dụng CSS</span></a></li>
                                    <li class="toclevel-1 tocsection-3"><a href="#M.E1.BB.A9c_.C4.91.E1.BB.99_.C6.B0u_ti.C3.AAn_c.E1.BB.A7a_CSS"><span class="tocnumber">3</span> <span class="toctext">Mức độ ưu tiên của CSS</span></a></li>
                                    <li class="toclevel-1 tocsection-4"><a href="#C.C3.BA_ph.C3.A1p"><span class="tocnumber">4</span> <span class="toctext">Cú pháp</span></a></li>
                                    <li class="toclevel-1 tocsection-5"><a href="#CSS_Selector"><span class="tocnumber">5</span> <span class="toctext">CSS Selector</span></a></li>
                                    <li class="toclevel-1 tocsection-6"><a href="#Tham_kh.E1.BA.A3o"><span class="tocnumber">6</span> <span class="toctext">Tham khảo</span></a></li>
                                    <li class="toclevel-1 tocsection-7"><a href="#Nghi.C3.AAn_c.E1.BB.A9u_th.C3.AAm"><span class="tocnumber">7</span> <span class="toctext">Nghiên cứu thêm</span></a></li>
                                    <li class="toclevel-1 tocsection-8"><a href="#Li.C3.AAn_k.E1.BA.BFt_ngo.C3.A0i"><span class="tocnumber">8</span> <span class="toctext">Liên kết ngoài</span></a></li>
                                    </ul>
                              </div>
                             -->
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

 
 