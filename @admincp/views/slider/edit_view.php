<?php
    require "../templates/backend/green/left.php";
?>  
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Cập nhật slider</h3>
				</div> <!-- End .content-box-header -->
				<?php 
                    if($mslider->num_rows($resultData) == 1):
                    
                ?>
				<div class="content-box-content">
			   
                    <div>
						<form action="<?php echo BASE_ADMIN.'/index.php?controller=slider&action=edit&sid='.$resultData['slider_id'];?>" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							 <p>
									<label>Trang hiển thị slider</label>
									<select id="txtType" name="txtType" class="small-input">
                                    <option value="blog" <?php if($resultData['type'] == "blog") echo "selected='selected'";?> >Blog</option>
                                    <option value="shop" <?php if($resultData['type'] == "shop") echo "selected='selected'";?>>Shop online</option>
                                    </select>
								</p>
								<p>
									<label>Tiêu đề</label>
									<input value="<?php echo $resultData['title'];?>" class="text-input medium-input" type="text" id="txtTitle" name="txtTitle" /> 
								</p>
                                <p>
                                    <label>Hình ảnh</label>
                                    <img src="<?php echo URL_UPLOAD.trim($resultData['image']);?>" width="100" height="100"/>
                                </p>
								<p>
									<label>Ảnh mới</label>
										<input type="file" class="text-input small-input"  id="txtImage" name="txtImage" /> <!-- Classes for input-notification: success, error, information, attention -->
									
								</p>
								<p>
									<label>Alt</label>
									<input value="<?php echo $resultData['alt'];?>" class="text-input medium-input" type="text" id="txtAlt" name="txtAlt" /> 
								</p>
									<p>
									<label>Thứ tự</label>
									<input value="<?php echo $resultData['position'];?>" class="text-input small-input" type="number" id="txtPosition" name="txtPosition" /> 
								</p>
                                
								<p>
									<label>Link liên kết</label>
									<input value="<?php echo $resultData['link'];?>"  type="text" class="text-input medium-input" name="txtLink" />
								</p>
								
								<p>
									<label>Target</label>
									<select id="txtTarget" name="txtTarget" class="small-input">
                                    <option value="_blank" <?php if($resultData['target'] == '_blank') echo "selected='selected'"; ?> >Mở ra trang mới</option>
                                    <option value="_self" <?php if($resultData['target'] == '_self') echo "selected='selected'"; ?>>Mở ra trang hiện tại</option>
                                    </select>
								</p>
								
								<p>
									<label>Trạng thái</label>              
									<label class="label-none">Ẩn <input type="radio" name="txtStatus" value="0"  <?php if($resultData['status'] == 0) echo "checked='checked'"; ?>/></label>
                                    <label class="label-none">Hiện <input type="radio" name="txtStatus" value="1" <?php if($resultData['status'] == 1) echo "checked='checked'"; ?> /></label>
								</p>
								
								<p>
									<label>Nội dung trên slider</label>
									<textarea class="text-input textarea wysiwyg" id="txtContent" name="txtContent" cols="79" rows="15">
                                    <?php
                                        echo $resultData['content'];
                                    ?>
                                    </textarea>
								</p>
								
								<p>
									<input class="button" type="submit" name="btnUpdate" value="Cập nhật" />
								</p>
								
							</fieldset>
							<div class="clear"></div><!-- End .clear -->					
						</form>		
                </div> <!-- End #tab2 -->     
        </div>
        <?php
            endif;
        ?>
</div>   
<?php
    require "../templates/backend/green/bottom.php"
?>

