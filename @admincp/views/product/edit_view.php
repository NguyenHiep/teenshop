<?php
    require "../templates/backend/green/left.php";
?>
 <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Cập nhật sản phẩm</h3>
                    <ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Thông tin chung</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Thuộc tính sản phẩm</a></li>
                        <li><a href="#tab3">SEO</a></li>
					</ul>
                    
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
                <?php
                    if(!empty($error)):
                        echo ' <div class="notification error png_bg">
				<a href="#" class="close"><img src="'.BASE_URL.'/templates/backend/green/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close"/></a>
				        <div>
					       <ul>';
                        foreach($error as $err):
                            echo "<li>{$err}</li>";
                        endforeach;    
                    echo '</ul></div></div>';
                    endif;
                ?>
			     <form action="<?php echo BASE_ADMIN;?>/product/edit/prid/<?php echo $data['product_id']?>" method="post" enctype="multipart/form-data">
				<div class="content-box-content">
   	            
					<div class="tab-content default-tab" id="tab1">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->      	
								<p>
									<label>Tên chuyên mục</label>
									<select name="cbbCateId" class="small-input">
                                       <?php
                                            foreach($listCate as $cate){
                                                echo "<option value='{$cate['category_id']}'";
                                                if($data['category_id']== $cate['category_id']){
                                                    echo "selected = 'selected'";
                                                }
                                                echo ">{$cate['name']}</option>"; 
                                            }
                                       ?>
                                    </select> 
								</p>
                                <p>
									<label>Tên sản phẩm</label>
										<input class="text-input medium-input" type="text" id="txtTitle" name="txtTitle" placeholder="Nhập tên cho sản phẩm" value="<?php echo $data['title'];?>"/>  
								</p>
                                 <p>
									<label>Slug tên sản phẩm</label>
										<input class="text-input medium-input" type="text" id="txtProductSlug" name="txtProductSlug" placeholder="Tên không dấu sản phẩm, mặc định sẽ lấy tên sản phẩm" value="<?php echo $data['slug'];?>"/>  
								</p>
                                <?php
                                    if($data['images'] != ""):
                                ?>
                                <p>
                                    <label>Ảnh cũ</label>
                                     <img width="100" height="100" src="<?php echo URL_UPLOAD.$data['images'];?>" alt="<?php echo $data['title'];?>"/> 
                                </p>
                                <?php endif; ?>
                                 <p>
                                    <label>Ảnh mới</label>
                                    	<input class="text-input medium-input" type="file" id="txtImageProduct" name="txtImageProduct" placeholder="Hình ảnh sản phẩm"/>  
                                </p>
								<p>
									<label>Mô tả sản phẩm</label>
									<textarea class="text-input textarea wysiwyg" id="txtDesscription" name="txtDesscription" cols="79" rows="5"><?php echo $data['info'];?></textarea>
								</p>	
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
					</div> <!-- End #tab1 -->     
                    <div class="tab-content" id="tab2">
                         <p>
                             <label>Giá bán</label>
                             <input class="text-input small-input" type="number" id="txtPrice" name="txtPrice" min="0" placeholder="Nhập giá bán cho sản phẩm" value="<?php echo $data['price'];?>"/> 
                         </p>
                          <p>
                             <label>Giá khuyến mãi</label>
                             <input class="text-input small-input" type="number" id="txtSalePrice" name="txtSalePrice" min="0" placeholder="Giá khuyến mãi" value="<?php echo $data['sale_price'];?>"/>  
                         </p>
                         <p>
                            <label>Màu sắc</label>
                            <input class="text-input medium-input" type="text" id="txtColor" name="txtColor" placeholder="Nhập màu sắc của sản phẩm nếu có" value="<?php echo $data['color'];?>"/>  
                         </p>
                          <p>
                            <label>Kích thước (size) sản phẩm</label>
                            <input class="text-input medium-input" type="text" id="txtSize" name="txtSize" placeholder="Nhập kích thước của sản phẩm nếu có" value="<?php echo $data['size'];?>"/>  
                         </p>
                         <p>
                            <label>Số lượng sản phẩm trong kho</label>
                            <input class="text-input medium-input" type="number" id="txtQtyProduct" name="txtQtyProduct" placeholder="Nhập số lượng sản phẩm vào kho" value="<?php echo $data['qty'];?>"/>  
                         </p>
                         
                           <p>
                                <label>Hiển thị sản phẩm lên website</label>
                                <label class="label-none">
                                    <input type="radio" name="radPublic" value="1"
                                    <?php 
                                        if($data['publish'] == "1"){
                                            echo "checked = 'checked'";
                                        }
                                    ?>
                                    /> Hiển thị lên website
                                </label>
                                <label class="label-none">
                                     <input type="radio" name="radPublic" value="0" 
                                        <?php 
                                            if($data['publish'] == "0"){
                                                echo "checked = 'checked'";
                                            }
                                        ?>
                                    /> Không hiển thị
                                </label>
                                
                               
                           </p>
                    </div>
                     <div class="tab-content" id="tab3">
                            	<p>
									<label>Meta title</label>
									<textarea class="text-input textarea wysiwyg" id="txtMetaTile" name="txtMetaTile" cols="79" rows="5"><?php echo $data['meta_title'];?></textarea>
					       </p>
                           	<p>
									<label>Meta KeyWord</label>
									<textarea class="text-input textarea wysiwyg" id="txtMetaKeyWord" name="txtMetaKeyWord" cols="79" rows="5"><?php echo $data['meta_keyword'];?></textarea>
					       </p>
           	                <p>
									<label>Meta Description</label>
									<textarea class="text-input textarea wysiwyg" id="txtMetaDiscription" name="txtMetaDiscription" cols="79" rows="5"><?php echo $data['meta_description'];?></textarea>
					       </p>
                     </div>	
	           
				</div> <!-- End .content-box-content -->
				    <p style="padding-left: 20px;">
						<input class="button" type="submit" name="btnOK" value="Cập nhật" />
			         </p>
                </form>  
			</div> <!-- End .content-box -->     
<?php
    require "../templates/backend/green/bottom.php"
?>