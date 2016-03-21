<?php
    require "templates/frontend/version1/header.php";
?>
<div class="main">
      <div class="container">
        
        <ul class="breadcrumb">
            <li><a href="<?php echo BASE_URL;?>">Home</a></li>
            <li><a href="">Danh mục</a></li>
            <li class="active"><?php echo $dataCate['name'];?></li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-5">
          <?php
                $catehtml = '';
                if($mcategory->num_rows($catedata) > 0){
                    $catehtml.= '<ul class="list-group margin-bottom-25 sidebar-menu">';
                    foreach($catedata as $cate):
                    $catehtml.= '  <li class="list-group-item clearfix"><a href="'.BASE_URL.'chuyen-muc/'.$cate['category_id'].'/'.trim($cate['slug']).'/"><i class="fa fa-angle-right"></i>'.$cate['name'].'</a></li>';
                    endforeach;
                    $catehtml.= '</ul>';
                }
                echo $catehtml;
          ?>
                              
          <!--          
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Ladies</a></li>
              <li class="list-group-item clearfix dropdown active">
                <a href="javascript:void(0);" class="collapsed">
                  <i class="fa fa-angle-right"></i>
                  Mens
                  
                </a>
                <ul class="dropdown-menu" style="display:block;">
                  <li class="list-group-item dropdown clearfix active">
                    <a href="javascript:void(0);" class="collapsed"><i class="fa fa-angle-right"></i> Shoes </a>
                      <ul class="dropdown-menu" style="display:block;">
                        <li class="list-group-item dropdown clearfix">
                          <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Classic </a>
                          <ul class="dropdown-menu">
                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 1</a></li>
                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 2</a></li>
                          </ul>
                        </li>
                        <li class="list-group-item dropdown clearfix active">
                          <a href="javascript:void(0);" class="collapsed"><i class="fa fa-angle-right"></i> Sport  </a>
                          <ul class="dropdown-menu" style="display:block;">
                            <li class="active"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 1</a></li>
                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 2</a></li>
                          </ul>
                        </li>
                      </ul>
                  </li>
                  <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Trainers</a></li>
                  <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Jeans</a></li>
                  <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Chinos</a></li>
                  <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> T-Shirts</a></li>
                </ul>
              </li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kids</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Accessories</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sports</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Brands</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Electronics</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Home & Garden</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Custom Link</a></li>
            </ul>
            -->
            <div class="sidebar-filter margin-bottom-25">
              <h2>Filter</h2>
              <h3>Availability</h3>
              <div class="checkbox-list">
                <label><input type="checkbox" /> Not Available (3)</label>
                <label><input type="checkbox" /> In Stock (26)</label>
              </div>

              <h3>Price</h3>
              <p>
                <label for="amount">Range:</label>
                <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
              </p>
              <div id="slider-range"></div>
            </div>

            <div class="sidebar-products clearfix">
              <h2>Bán chạy nhất</h2>
              <?php
                if($totalProduct > 0):
                    foreach($productBests as $data):
              ?>
                  <div class="item">
                    <a href="<?php echo BASE_URL.$data['product_id'].'/'.$data['slug'].'html';?>"><img src="<?php echo URL_UPLOAD.$data['images']; ?>" alt="<?php echo $data['title']; ?>" /></a>
                    <h3><a href="<?php echo BASE_URL.$data['product_id'].'/'.$data['slug'].'html';?>"><?php echo $data['title']; ?></a></h3>
                    <div class="price"><?php echo number_format($data['price'],0,0,',').' VNĐ';?></div>
                  </div>
              <?php
                    endforeach;      
                endif;
              ?>
              
              
            </div>
          </div>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <div class="row list-view-sorting clearfix">
              <div class="col-md-2 col-sm-2 list-view">
                <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                <a href="javascript:;"><i class="fa fa-th-list"></i></a>
              </div>
              <div class="col-md-10 col-sm-10">
                <div class="pull-right">
                  <label class="control-label">Show:</label>
                  <select class="form-control input-sm">
                    <option value="#?limit=24" selected="selected">24</option>
                    <option value="#?limit=25">25</option>
                    <option value="#?limit=50">50</option>
                    <option value="#?limit=75">75</option>
                    <option value="#?limit=100">100</option>
                  </select>
                </div>
                <div class="pull-right">
                  <label class="control-label">Sort&nbsp;By:</label>
                  <select class="form-control input-sm">
                    <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                    <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                    <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                    <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                    <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                    <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
                    <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>
                    <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
                    <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- BEGIN PRODUCT LIST -->
           
            <?php
                //Hiển thị danh sách sản phẩm theo chuyên mục
                //echo count($datas);
                if($totalProduct > 0):
                    $temp = 0;
                    foreach($datas as $data):
                    
                        if($temp %3 == 0){
                            echo ' <div class="row product-list">';
                        }
                ?>  
                        <!-- PRODUCT ITEM START -->
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                              <div class="pi-img-wrapper">
                                <img src="<?php echo URL_UPLOAD.$data['images'];?>" class="img-responsive" alt="<?php echo $data['title'];?>"/>
                                <div>
                                  <a href="<?php echo URL_UPLOAD.$data['images'];?>" class="btn btn-default fancybox-button">Zoom</a>
                                  <a data-value="<?php echo $data['product_id']?>" href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                              </div>
                              <h3><a href="<?php echo BASE_URL.$data['product_id'].'/'.$data['slug'].'.html'; ?>"><?php echo $data['title']; ?></a></h3>
                              <div class="pi-price"><?php echo number_format($data['price'],0,0,',').' VNĐ';?></div>
                              <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                          </div>
                          <!-- PRODUCT ITEM END -->
                
                <?php
                        $temp ++;
                        if($temp %3 == 0){
                             echo ' </div>';
                        }
                    endforeach;
                    if($totalProduct %3 !=0):
                        echo '</div>';
                    endif;        
                else:
                    echo '<p> Không có sản phẩm trong danh mục này, để xem thêm các sản phẩm
                        <a href="'.BASE_URL.'">click ngay </a>
                     </p>';
                endif;
            ?>
            </div>
            <!-- END PRODUCT LIST -->
            <!-- BEGIN PAGINATOR -->
            <div class="row">
              <div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div>
              <div class="col-md-8 col-sm-8">
                <ul class="pagination pull-right">
                  <li><a href="javascript:;">&laquo;</a></li>
                  <li><a href="javascript:;">1</a></li>
                  <li><span>2</span></li>
                  <li><a href="javascript:;">3</a></li>
                  <li><a href="javascript:;">4</a></li>
                  <li><a href="javascript:;">5</a></li>
                  <li><a href="javascript:;">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- END PAGINATOR -->
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
<?php
    require "templates/frontend/version1/footer.php";
?>