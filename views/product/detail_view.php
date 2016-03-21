<?php
    require "templates/frontend/version1/header.php";
?>

  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '861201477273916',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
            <li><a href="<?php echo BASE_URL."chuyen-muc/{$dataCate['category_id']}/{$dataCate['slug']}.html"; ?>"><?php echo $dataCate['name']; ?></a></li>
            <li class="active"><?php echo $dataDetail['title']; ?></li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-5">
              <?php
                $catehtml = '';
                    if($totalCate > 0){
                        $catehtml.= '<ul class="list-group margin-bottom-25 sidebar-menu">';
                        foreach($catedata as $cate):
                        $catehtml.= '  <li class="list-group-item clearfix"><a href="'.BASE_URL.'chuyen-muc/'.$cate['category_id'].'/'.trim($cate['slug']).'/"><i class="fa fa-angle-right"></i>'.$cate['name'].'</a></li>';
                        endforeach;
                        $catehtml.= '</ul>';
                    }
                echo $catehtml;
                ?>
               

            <div class="sidebar-products clearfix">
              <h2>Bán chạy nhất</h2>
              <?php
                /*
                 * San pham ban chay   
                */
              
              ?>
              <?php
                if($totalProductBest > 0):
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
            <div class="product-page">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="product-main-image">
                    <img src="<?php echo URL_UPLOAD.$dataDetail['images'];?>" alt="<?php echo $dataDetail['title']; ?>" class="img-responsive" data-BigImgsrc="<?php echo URL_UPLOAD.$dataDetail['images'];?>">
                  </div>
                  <div class="product-other-images">
                    <a href="<?php echo URL_UPLOAD.$dataDetail['images'];?>" class="fancybox-button" rel="photos-lib"><img alt="<?php echo $dataDetail['title'];?>" src="<?php echo URL_UPLOAD.$dataDetail['images'];?>"></a>
                    <!--<a href="images/products/model4.jpg" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="images/products/model4.jpg"></a>
                    <a href="images/products/model5.jpg" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="images/products/model5.jpg"></a>
                    -->
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <h1><?php echo $dataDetail['title']; ?></h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><?php echo number_format($dataDetail['price'],0,0,',');?> <span>VNĐ</span> </strong>
                      <em><span><?php echo number_format($dataDetail['sale_price'],0,0,',');?></span> VNĐ </em>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p>
                        <?php 
                            echo $dataDetail['meta_description'];
                        ?>
                    </p>
                  </div>
                  <div class="product-page-options">
                    <div class="pull-left">
                      <label class="control-label">Size:</label>
                      <select class="form-control input-sm">
                        <option>L</option>
                        <option>M</option>
                        <option>XL</option>
                      </select>
                    </div>
                    <div class="pull-left">
                      <label class="control-label">Color:</label>
                      <select class="form-control input-sm">
                        <option>Red</option>
                        <option>Blue</option>
                        <option>Black</option>
                      </select>
                    </div>
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                  </div>
                  <div class="review">
                    <input type="range" value="4" step="0.25" id="backing4">
                    <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                    </div>
                    <a href="javascript:;">7 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:;">Write a review</a>
                  </div>
                  <ul class="social-icons">
                    <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
                    <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
                    <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
                    <li><a class="evernote" data-original-title="evernote" href="javascript:;"></a></li>
                    <li><a class="tumblr" data-original-title="tumblr" href="javascript:;"></a></li>
                  </ul>
                </div>

                <div class="product-page-content">
                  <ul id="myTab" class="nav nav-tabs">
                    <li><a href="#Description" data-toggle="tab">Description</a></li>
                    <li><a href="#Information" data-toggle="tab">Information</a></li>
                    <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade" id="Description">
                      <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. </p>
                    </div>
                    <div class="tab-pane fade" id="Information">
                      <table class="datasheet">
                        <tr>
                          <th colspan="2">Additional features</th>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 1</td>
                          <td>21 cm</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 2</td>
                          <td>700 gr.</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 3</td>
                          <td>10 person</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 4</td>
                          <td>14 cm</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 5</td>
                          <td>plastic</td>
                        </tr>
                      </table>
                    </div>
                    <div class="tab-pane fade in active" id="Reviews">
                        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"></div>
                      <!--<p>There are no reviews for this product.</p>-->
                      <!--
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong>Bob</strong>
                          <em>30/12/2013 - 07:37</em>
                          <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                        </div>                                              
                        <div class="review-item-content">
                            <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                        </div>
                      </div>
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong>Mary</strong>
                          <em>13/12/2013 - 17:49</em>
                          <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                        </div>                                              
                        <div class="review-item-content">
                            <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                        </div>
                      </div>

                    
                      <form action="#" class="reviews-form" role="form">
                        <h2>Write a review</h2>
                        <div class="form-group">
                          <label for="name">Name <span class="require">*</span></label>
                          <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                          <label for="review">Review <span class="require">*</span></label>
                          <textarea class="form-control" rows="8" id="review"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="email">Rating</label>
                          <input type="range" value="4" step="0.25" id="backing5">
                          <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                          </div>
                        </div>
                        <div class="padding-top-20">                  
                          <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                      </form>
                      -->
                    </div>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN SIMILAR PRODUCTS -->
        <div class="row margin-bottom-40">
          <div class="col-md-12 col-sm-12">
            <h2>Sản phẩm khác từ chuyên mục <a href="<?php echo BASE_URL.'chuyen-muc/'.$dataCate['category_id'].'/'.$dataCate['slug'].'.html';?>"><?php echo $dataCate['name'];?></a></h2>
            <div class="owl-carousel owl-carousel4">
            <?php
                
                if($totalProductCate > 0):
                    foreach($product_category as $data):
                        $id = $data['product_id'];
            ?>
                   <div>
                    <div class="product-item">
                      <div class="pi-img-wrapper">
                        <img src="<?php echo URL_UPLOAD;?><?php echo $data['images'];?>" class="img-responsive" alt="<?php echo $data['title'];?>" style="min-height: 200px;"/>
                        <div>
                          <a href="<?php echo URL_UPLOAD;?><?php echo $data['images'];?>" class="btn btn-default fancybox-button">Zoom</a>
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
        </div>
        <!-- END SIMILAR PRODUCTS -->
      </div>
    </div>
   
<?php
    require "templates/frontend/version1/footer.php";
?>
