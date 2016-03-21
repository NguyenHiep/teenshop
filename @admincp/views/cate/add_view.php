<?php
    require "../templates/backend/green/left.php";
?>
 <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Thêm mới chuyên mục</h3>
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
                <?php
                    if(!empty($error)):
                        echo ' <div class="notification error png_bg">
				<a href="#" class="close"><img src="templates/backend/green/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close"/></a>
				        <div>
					       <ul>';
                        foreach($error as $err):
                            echo "<li>{$err}</li>";
                        endforeach;    
                    echo '</ul></div></div>';
                    endif;
                ?>
			
				<div class="content-box-content">

					<div class="tab-content default-tab" id="tab1">
					
						<form action="" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->      	
								<p>
									<label>Tên chuyên mục</label>
										<input class="text-input small-input" type="text" id="txtCate" name="txtCate" placeholder="Vui lòng nhập tên chuyên mục" required="required"/>  
								</p>
                                <p>
                                    <label class="label-none">Hiển thị: </label>
									<label class="label-none">Yes <input type="radio" name="status" value="1" checked="checked"/></label>
                                    <label class="label-none">No <input type="radio" name="status" value="0"/></label>
									
								</p>
                                <p>
                                    <label>Sắp xếp: <input type="number" class="text-input small-input" id="position" name="position" style="width:  50px !important;"/></label>
      
                                </p>
                                 <p>
                                    <label>Parent id: <input type="number" class="text-input small-input" id="parentid" name="parentid" style="width:  50px !important;"/></label>
                                    
                                </p>
                                <p>
                                    <label>Ảnh category: <input class="text-input small-input" type="file" name="txtImage" id="txtImage"/></label>
                                </p>
                                <p>
									<label>Slug chuyên mục</label>
										<input class="text-input medium-input" type="text" id="txtCateSlug" name="txtCateSlug" placeholder="Tên không dấu chuyên mục, mặc định sẽ lấy tên chuyên mục"/>  
								</p>
                                
								<p>
									<label>Mô tả chuyên mục</label>
									<textarea class="text-input textarea wysiwyg" id="txtDesscription" name="txtDesscription" cols="79" rows="5"></textarea>
								</p>
								
								
								<p>
									<input class="button" type="submit" name="btnOK" value="Thêm mới" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->     
<?php
    require "../templates/backend/green/bottom.php"
?>