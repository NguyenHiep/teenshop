<?php
    require "../templates/backend/green/left.php";
?>  
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Thêm mới slider</h3>
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
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
                    <div>
						<form action="" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Tiêu đề</label>
									<input class="text-input medium-input" type="text" id="txtTitle" name="txtTitle" /> 
								</p>
								<p>
									<label>Hình ảnh</label>
										<input type="file" class="text-input small-input"  id="txtImage" name="txtImage" /> <!-- Classes for input-notification: success, error, information, attention -->
									
								</p>
								<p>
									<label>Alt</label>
									<input class="text-input medium-input" type="text" id="txtAlt" name="txtAlt" /> 
								</p>
									<p>
									<label>Thứ tự</label>
									<input class="text-input small-input" type="number" id="txtPosition" name="txtPosition" /> 
								</p>
                                
								<p>
									<label>Link liên kết</label>
									<input type="text" class="text-input medium-input" name="txtLink" />
								</p>
								
								<p>
									<label>Target</label>
									<select id="txtTarget" name="txtTarget" class="small-input">
                                    <option value="_blank" selected="selected">Mở ra trang mới</option>
                                    <option value="_self">Mở ra trang hiện tại</option>
                                    </select>
								</p>
								
								<p>
									<label>Trạng thái</label>              
									<label class="label-none">Ẩn <input type="radio" name="txtStatus" value="0" checked="checked"/></label>
                                    <label class="label-none">Hiện <input type="radio" name="txtStatus" value="1"/></label>
								</p>
								
								<p>
									<label>Nội dung trên slider</label>
									<textarea class="text-input textarea wysiwyg" id="txtContent" name="txtContent" cols="79" rows="15"></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" name="btnAdd" value="Thêm mới" />
								</p>
								
							</fieldset>
							<div class="clear"></div><!-- End .clear -->					
						</form>		
                </div> <!-- End #tab2 -->     
        </div>
</div>   
<?php
    require "../templates/backend/green/bottom.php"
?>

