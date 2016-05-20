<?php
    require "templates/frontend/version1/blog-header.php";
 ?>
  <div class="main">
      <div class="container">
      
        <ul class="breadcrumb">
            <li><a href="<?php echo BASE_URL;?>">Home</a></li>
            <li class="active">Kết quả tìm kiếm</li>
        </ul>
      
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
        <!-- BEGIN CONTENT -->
          <div class="col-md-12">
            <h1>Kết quả tìm kiếm của: <em><?php echo $_GET['q'];?></em></h1>
            <div class="content-page">
              <form action="/search" class="content-search-view2">
                <div class="input-group">
                  <input type="text" class="form-control" name="q" placeholder="Nhập từ khóa bạn muốn tìm ..." />
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                  </span>
                </div>
              </form>
              
              <!-- Result search -->
              <div class="row">
                    <div class="col-sm-12">
                    <?php
                        if($mblog->num_rows($resuls) > 0){
                            foreach($resuls as $data):
                    ?>
                        <div class="search-result-item">
                            <h4><a href="<?php echo BASE_URL.'on-tap/'.trim($data['slugcate']).'/'.trim($data['slug']).'-'.$data['blog_id'].'.html'; ?>"><?php echo $data['blog_name'];?></a></h4>
                            <p><?php echo wordLimiter($data['short_content'], 40, '...'); ?></p>
                            <a class="search-link" href="<?php echo BASE_URL.'on-tap/'.trim($data['slugcate']).'/'.trim($data['slug']).'-'.$data['blog_id'].'.html'; ?>">Xem chi tiết</a>
                        </div>                 
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
                      <div class="col-md-5 col-sm-5 pull-right">
                           <?php 
                                    echo $paginationHTML;
                            ?>
                      </div>
                   <?php }//End if ?>
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