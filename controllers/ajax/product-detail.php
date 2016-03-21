<?php
/*
require_once "config.php";
require_once "libraries/class.php";

class Model_Ajax extends Database{
    public function listProductDetail($prid){
            $sql[] = "SELECT * FROM product";
            $sql[] = "WHERE publish = '1' WHERE `product_id` = '{$prid}'";
            $sql[] = "ORDER BY `create` DESC";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetch(); 
        }
}
*/
   
    if(isset($_POST['id'])){
        $id = intval($_POST['id']);
        $mproduct = new Model_Product();
        $data = $mproduct->listProductDetail($id);
        $html = '';
		$html.= '<div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="'.URL_UPLOAD.$data['images'].'" alt="'.$data['title'].'" class="img-responsive">
                  </div>
                  <div class="product-other-images">
                    <a href="'.URL_UPLOAD.$data['images'].'" class="fancybox-button" rel="photos-lib"><img alt="'.$data['title'].'" src="'.URL_UPLOAD.$data['images'].'" alt="'.$data['title'].'"></a>
                   
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h2>'.$data['title'].'</h2>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong>'.number_format($data['price'],0,0,',').'<span> VNĐ</span></strong>
                      <em><span>'.$data['sale_price'].'</span> VNĐ</em>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    '.$data['meta_description'].'
                  </div>
                  <div class="product-page-options">
                    <div class="pull-left">
                      <label class="control-label">Size:</label>
                      <select class="form-control input-sm">
                        <option>'.$data['size'].'</option>
                        
                      </select>
                    </div>
                    <div class="pull-left">
                      <label class="control-label">Color:</label>
                      <select class="form-control input-sm">
                        <option>'.$data['color'].'</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">Mua hàng</button>
                    <a href="'.BASE_URL.$data['product_id'].'/'.$data['slug'].'.html" class="btn btn-default">Chi tiết</a>
                  </div>
                </div>
				';
                /*
				if($array['type'] == "sale"){
					$html .= '<div class="sticker sticker-sale"></div>';
				}elseif($array['type'] == "new"){
					$html .= '<div class="sticker sticker-new"></div>';
				}else{
					$html .= '';
				}
               */
				$html .='
						</div>
						</div>';
echo $html;
}
?>