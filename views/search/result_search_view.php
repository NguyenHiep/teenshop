 <?php
    require "templates/frontend/version3/blog-header.php";
 ?>
 <div class="main">
      <div class="container">
          <div class="row">
            <!-- BEGIN CONTENT -->
              <div class="content col-md-8 page-search">
                <div class="row">
                 <ul class="breadcrumb">
                    <li><a href="<?php echo BASE_URL;?>">Home</a></li>
                    <li class="active">Kết quả tìm kiếm</li>
                </ul>
                    <div class="col-md-12">
                        <h1>Kết quả tìm kiếm của: <strong><?php echo htmlentities($_GET['q']);?></strong></h1>
                        <div class="content-page">
                          <form action="<?php echo BASE_URL;?>search" class="content-search-view2">
                            <div class="input-group">
                              <input type="text" class="form-control input-search" name="q" placeholder="Nhập từ khóa bạn muốn tìm ..." />
                              <span class="input-group-btn">
                                <button type="submit" class="btn btn-success">Tìm kiếm</button>
                              </span>
                            </div>
                          </form>
                          
                          <!-- Result search -->
                          <div class="row result-search">
                                <div class="col-sm-12">
                                <?php
                                    if($mblog->num_rows($resuls) > 0){
                                        foreach($resuls as $data):
                                ?>
                                    <div class="search-result-item">
                                        <h4><a href="<?php echo BASE_URL.'danh-muc/'.trim($data['slugcate']).'/'.trim($data['slug']).'-'.$data['blog_id'].'.html'; ?>"><?php echo $data['blog_name'];?></a></h4>
                                        <p><?php echo wordLimiter($data['short_content'], 40, '...'); ?></p>
                                        <a class="search-link" href="<?php echo BASE_URL.'danh-muc/'.trim($data['slugcate']).'/'.trim($data['slug']).'-'.$data['blog_id'].'.html'; ?>">Xem chi tiết</a>
                                    </div>
                                    <hr class="line-bottom" />                 
                                <?php
                                        endforeach; //Edn foreach
                                    }else{ //End if($mblog->num_rows($resuls) > 0)
                                        echo "Không tìm thấy kết quả nào phù hợp với từ khóa !";
                                    } 
                                ?>
                                        
                                </div>
                          </div>
                          <!-- End result search -->
            
                          <div class="row">
                                <?php
                                if($totalItems >1){
                                    $start = $position + 1;
                                        if($start <=0){
                                            $start=1;
                                        }
                                        if($start > $totalItems){
                                            $start = ceil($totalItemsPage*($totalItems/$totalItemsPage));
                                           
                                        }
                                        $limit = $totalItemsPage*$currentPage;
                                        if($limit > $totalItems){
                                            $limit = $totalItems;
                                        }
                               ?>
                                <div class="col-md-7 col-sm-7 items-info">
                                    Bài viết từ <?php echo $start; ?> đến <?php echo $limit; ?> trên tổng cộng <?php echo $totalItems;?>
                                </div>
                                  <div class="text-center col-md-12 post-pagination">
                                       <?php 
                                                echo $paginationHTML;
                                        ?>
                                  </div>
                               <?php }//End if ?>
                          </div>
            
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

