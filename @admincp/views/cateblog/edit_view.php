<?php
    require "../templates/backend/green/left.php";
?>
 <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Bạn đang sửa chuyên mục - <?php echo $data['cat_name'];?></h3>
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
					
						<form action="<?php echo BASE_ADMIN;?>/cateblog/edit/catid/<?php echo $data['cat_id'];?>" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->      	
								<p>
									<label>Tên chuyên mục</label>
										<input value="<?php echo $data['cat_name'];?>" class="text-input small-input" type="text" id="txtCate" name="txtCate" placeholder="Vui lòng nhập tên chuyên mục" required="required"/>  
								</p>
                                 <p>
									<label>Slug chuyên mục</label>
										<input value="<?php echo $data['slug'];?>" class="text-input medium-input" type="text" id="txtCateSlug" name="txtCateSlug" placeholder="Tên không dấu chuyên mục, mặc định sẽ lấy tên chuyên mục"/>  
								</p>
                                <p>
									<label>Parent</label>
								    <select id="txtParent" name="txtParent">
                                        <option value="0">Không</option>
                                        <?php
                                            if(count($listCate > 0)){
                                                echo recursiveMenu($listCate,$parent = 0, $text="", $data['parentid']);
                                                /*
                                                foreach($listCate as $item):
                                                    echo '<option value='.$item['cat_id'].' ';
                                                        if($data['parentid'] === $item['cat_id'])
                                                            echo ' selected="selected"';
                                                    echo '>'.$item['cat_name'].'</option>';
                                                endforeach;
                                                */
                                            }
                                        ?>
                                    </select>
                                 </p>
                                 
                                <p>
                                    <label class="label-none">Hiển thị: </label>
									<label class="label-none">Yes <input type="radio" name="status" value="1" <?php if($data['status'] == 1) echo "checked='checked'";?>/></label>
                                    <label class="label-none">No <input type="radio" name="status" value="0" <?php if($data['status'] == 0) echo "checked='checked'";?> /></label>
									
								</p>
                                <p>
                                    <label>Sắp xếp: <input value="<?php echo $data['position'];?>" type="number" class="text-input small-input" id="position" name="position" style="width:  50px !important;"/></label>
      
                                </p>
                                <?php
                                    if($data['image'] !="none"){
                                ?>
                                <p>
                                    <label>Ảnh chuyên mục:</label>
                                    <img src="<?php echo URL_UPLOAD.'category/'.$data['image'];?>" width="100" height="100"/> 
                                    
                                </p>
                                <?php        
                                    } //End image
                                ?>
                                <p>
                                    <label>Cập nhật ảnh: <input class="text-input small-input" type="file" name="txtImage" id="txtImage"/></label>
                                </p>
                               
                                <p>
									<label>Meta keyword</label>
									<textarea class="text-input textarea wysiwyg" id="txtMetakeyword" name="txtMetakeyword" cols="79" rows="3"><?php echo $data['meta_keyword'];?></textarea>
								</p>
								<p>
									<label>Meta description</label>
									<textarea class="text-input textarea wysiwyg" id="txtMetadescription" name="txtMetadescription" cols="79" rows="3"><?php echo $data['meta_description'];?></textarea>
								</p>
								
								
								<p>
									<input class="button" type="submit" name="btnOK" value="Cập nhật" />
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