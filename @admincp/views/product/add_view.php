<?php
    require "../templates/backend/green/left.php";
?>
 <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Thêm mới sản phẩm</h3>
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
			     <form action="<?php echo BASE_ADMIN;?>/product/add" method="post" enctype="multipart/form-data">
				<div class="content-box-content">
   	            
					<div class="tab-content default-tab" id="tab1">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->      	
								<p>
									<label>Tên chuyên mục</label>
									<select name="cbbCateId" class="small-input">
                                       <?php
                                            foreach($listCate as $cate){
                                                echo "<option value='{$cate['category_id']}'>
                                                {$cate['name']}
                                                </option>";
                                            }
                                       ?>
                                    </select> 
								</p>
                                <p>
									<label>Tên sản phẩm</label>
										<input class="text-input medium-input" type="text" id="txtTitle" name="txtTitle" placeholder="Nhập tên cho sản phẩm"/>  
								</p>
                                 <p>
									<label>Slug tên sản phẩm</label>
										<input class="text-input medium-input" type="text" id="txtProductSlug" name="txtProductSlug" placeholder="Tên không dấu sản phẩm, mặc định sẽ lấy tên sản phẩm"/>  
								</p>
                                <p>
                                    <label>Ảnh sản phẩm</label>
                                    	<input class="text-input medium-input" type="file" id="txtImageProduct" name="txtImageProduct" placeholder="Hình ảnh sản phẩm"/>  
                                </p>
								<p>
									<label>Mô tả sản phẩm</label>
									<textarea class="text-input textarea wysiwyg" id="txtDesscription" name="txtDesscription" cols="79" rows="5"></textarea>
								</p>	
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
					</div> <!-- End #tab1 -->     
                    <div class="tab-content" id="tab2">
                         <p>
                             <label>Giá bán</label>
                             <input class="text-input small-input" type="number" id="txtPrice" name="txtPrice" min="0" placeholder="Nhập giá bán cho sản phẩm"/> 
                         </p>
                          <p>
                             <label>Giá khuyến mãi</label>
                             <input class="text-input small-input" type="number" id="txtSalePrice" name="txtSalePrice" min="0" placeholder="Giá khuyến mãi"/>  
                         </p>
                         <p>
                            <label>Màu sắc</label>
                            <input class="text-input medium-input" type="text" id="txtColor" name="txtColor" placeholder="Nhập màu sắc của sản phẩm nếu có"/>  
                         </p>
                          <p>
                            <label>Kích thước (size) sản phẩm</label>
                            <input class="text-input medium-input" type="text" id="txtSize" name="txtSize" placeholder="Nhập kích thước của sản phẩm nếu có"/>  
                         </p>
                         <p>
                            <label>Số lượng sản phẩm trong kho</label>
                            <input class="text-input medium-input" type="number" id="txtQtyProduct" name="txtQtyProduct" placeholder="Nhập số lượng sản phẩm vào kho"/>  
                         </p>
                         
                           <p>
                                <label>Hiển thị sản phẩm lên website</label>
                                <label class="label-none">
                                    <input type="radio" name="radPublic" value="1"/> Hiển thị lên website
                                </label>
                                <label class="label-none">
                                    <input type="radio" name="radPublic" value="0" checked="checked"/> Không hiển thị
                                </label>
                                
                           </p>
                    </div>
                     <div class="tab-content" id="tab3">
                    	   <p>
									<label>Meta title</label>
									<textarea class="text-input textarea " id="txtMetaTile" name="txtMetaTile" cols="79" rows="3"></textarea>
					       </p>
                           	<p>
									<label>Meta KeyWord</label>
									<textarea class="text-input textarea " id="txtMetaKeyWord" name="txtMetaKeyWord" cols="79" rows="3"></textarea>
					       </p>
           	                <p>
									<label>Meta Description</label>
									<textarea class="text-input textarea " id="txtMetaDiscription" name="txtMetaDiscription" cols="79" rows="5"></textarea>
					       </p>
                     </div>	
	           
				</div> <!-- End .content-box-content -->
				    <p style="padding-left: 20px;">
						<input class="button" type="submit" name="btnOK" value="Thêm mới" />
			         </p>
                </form>  
			</div> <!-- End .content-box -->     
<?php
    require "../templates/backend/green/bottom.php"
?>