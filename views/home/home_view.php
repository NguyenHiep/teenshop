<?php
    require "templates/frontend/version1/header.php";
    require "templates/frontend/version1/slider.php";
?>

<div class="main">
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SALE PRODUCT -->
          <div class="col-md-12 sale-product">
            <h2>Sản phẩm mới về</h2>
            <div class="owl-carousel owl-carousel5">
            <?php
                if(count($datas) > 0):
                    foreach($datas as $data):
                        
                        $data['price'];
                        $data['images'];
                        $id = $data['product_id'];
                        $data['slug'];
            ?>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="uploads/<?php echo $data['images'];?>" class="img-responsive" alt="<?php echo $data['title'];?>" style="min-height: 200px;"/>
                    <div>
                      <a href="uploads/<?php echo $data['images'];?>" class="btn btn-default fancybox-button">Zoom</a>
                      <a data-value="<?php echo $id; ?>" href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3 class="name-min-height"><a href="<?php echo BASE_URL."$id/{$data['slug']}.html";?>"><?php echo $data['title'];?></a></h3>
                  <div class="pi-price"><?php echo number_format($data['price'],0,0,'.')." VNĐ";?></div>
                  <a href="javascript:;" class="btn btn-default add2cart">Mua hàng</a>
                  <div class="sticker sticker-new"></div>
                </div>
              </div>
            <?php 
                endforeach;
            endif;
            ?>
            </div>
          </div>
          <!-- END SALE PRODUCT -->
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-4">
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
                
              <li class="list-group-item clearfix dropdown">
                <a href="shop-product-list.html">
                  <i class="fa fa-angle-right"></i>
                  Mens
                  
                </a>
                <ul class="dropdown-menu">
                  <li class="list-group-item dropdown clearfix">
                    <a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Shoes </a>
                      <ul class="dropdown-menu">
                        <li class="list-group-item dropdown clearfix">
                          <a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic </a>
                          <ul class="dropdown-menu">
                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 1</a></li>
                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 2</a></li>
                          </ul>
                        </li>
                        <li class="list-group-item dropdown clearfix">
                          <a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport  </a>
                          <ul class="dropdown-menu">
                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 1</a></li>
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
          </div>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-8">
            <h2>Sản phẩm bán chạy nhất</h2>
            <div class="owl-carousel owl-carousel3">
            <?php
                if($mhome->num_rows($productbestsellings) > 0):
                    foreach($productbestsellings as $data):
                        $id = $data['product_id'];
            ?>
                   
                 <div>
                    <div class="product-item">
                      <div class="pi-img-wrapper">
                        <img src="uploads/<?php echo $data['images'];?>" class="img-responsive" alt="<?php echo $data['title'];?>"/>
                        <div>
                          <a href="uploads/<?php echo $data['images'];?>" class="btn btn-default fancybox-button">Zoom</a>
                          <a data-value="<?php echo $id;?>" href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                        </div>
                      </div>
                      <h3 class="name-min-height"><a href="<?php echo BASE_URL."$id/{$data['slug']}.html";?>"><?php echo $data['title'];?></a></h3>
                      <div class="pi-price"><?php echo number_format($data['price'],0,0,'.')." VNĐ";?></div>
                      <a href="javascript:;" class="btn btn-default add2cart">Mua hàng</a>
                      <div class="sticker sticker-sale"></div>
                    </div>
                  </div>     
            <?php
                    endforeach;        
                endif;
            ?>
              
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN TWO PRODUCTS & PROMO -->
        <div class="row margin-bottom-35 ">
          <!-- BEGIN TWO PRODUCTS -->
          <div class="col-md-6 two-items-bottom-items">
            <h2>Two items</h2>
            <div class="owl-carousel owl-carousel2">
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="<?php echo TEMPLATE_FRONTEND;?>images/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="<?php echo TEMPLATE_FRONTEND;?>images/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="<?php echo TEMPLATE_FRONTEND;?>images/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="<?php echo TEMPLATE_FRONTEND;?>images/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="<?php echo TEMPLATE_FRONTEND;?>images/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="<?php echo TEMPLATE_FRONTEND;?>images/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="<?php echo TEMPLATE_FRONTEND;?>images/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="<?php echo TEMPLATE_FRONTEND;?>images/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="<?php echo TEMPLATE_FRONTEND;?>images/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="<?php echo TEMPLATE_FRONTEND;?>images/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="<?php echo TEMPLATE_FRONTEND;?>images/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="<?php echo TEMPLATE_FRONTEND;?>images/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
            </div>
          </div>
          <!-- END TWO PRODUCTS -->
          <!-- BEGIN PROMO -->
          <div class="col-md-6 shop-index-carousel">
            <div class="content-slider">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="<?php echo TEMPLATE_FRONTEND;?>images/index-sliders/slide1.jpg" class="img-responsive" alt="Berry Lace Dress">
                  </div>
                  <div class="item">
                    <img src="<?php echo TEMPLATE_FRONTEND;?>images/index-sliders/slide2.jpg" class="img-responsive" alt="Berry Lace Dress">
                  </div>
                  <div class="item">
                    <img src="<?php echo TEMPLATE_FRONTEND;?>images/index-sliders/slide3.jpg" class="img-responsive" alt="Berry Lace Dress">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END PROMO -->
        </div>        
        <!-- END TWO PRODUCTS & PROMO -->
      </div>
    </div>

<?php
    require "templates/frontend/version1/footer.php";
?>