<?php
    require "../templates/backend/green/left.php";
?>
 <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Cập nhật bài viết - <?php echo $data['blog_name'];?> </h3>
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
					
						<form action="<?php ?>" method="post" enctype="multipart/form-data">
							
							<div class="col-left">
                                <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->      	
								<p>
									<label>Chọn chuyên mục: 
                                    </label>
                                    	<select name="txtcatId" class="medium-input">
                                                <option value="0">--Chọn chuyên mục --</option>
                                                
                                                <?php
                                                    if($mcateblog->num_rows($cat_id) >0){
                                                        recursiveMenu($cat_id,0,"",$data['cat_id']);
                                                        /*$html = '';
                                                        foreach($cat_id as $cate):
                                                            $html .= "<option value='{$cate["cat_id"]}'";
                                                                if($data['cat_id'] == $cate['cat_id']){
                                                                    $html.= "selected='selected'";
                                                                }
                                                            $html .= ">{$cate["cat_name"]}</option>";
                                                        endforeach;
                                                        echo $html;
                                                        */
                                                    }
                                                ?>
                                             </select>
								
								</p>
                                <p>
                                    <label>Tiêu đề bài viết: </label>
                                     <input value="<?php echo $data['blog_name'];?>" class="text-input large-input" type="text" id="txtTitle" name="txtTitle" placeholder="Nhập tiêu đề cho bài viết"/>  

                               	</p>
                                
                                 <p>
                                    <label>Slug  </label>
                                    <input value="<?php echo $data['slug'];?>" class="text-input large-input" type="text" id="txtSlug" name="txtSlug" placeholder="Nhập tiêu đề cho bài viết"/>  
                                 
                               	</p>
                                <?php
                                    if(trim($data['image']) != "none"){
                                ?>
                                <p>
                                    <label>Ảnh bài viết: </label>
                                    <img src="<?php echo trim($data['image']);?>" height="150" width="150"/>
                                </p>
                                <?php
                                  } //End if
                                ?>
                                  <p>
                                    <label> Ảnh mới</label>
                                    <input class="text-input" type="text" name="txtImage" id="txtImage" readonly="readonly"/>
                                    <input class="button" type="button" value="Chọn Ảnh ..." onclick="BrowseServer();"/>
                                </p>
                             
							</fieldset>
							
                            </div>
                            <div class="col-right">
                                <fieldset>
                                    <p>
    									<label>Meta Keyword</label>
    										<input value="<?php echo $data['meta_keyword']; ?>" class="text-input large-input" type="text" id="txtKeyword" name="txtKeyword" placeholder="Từ khóa SEO"/>  
    								</p>
                                     <p>
    									<label>Meta Description</label>
    										<input value="<?php echo $data['meta_description']; ?>" class="text-input large-input" type="text" id="txtDescription" name="txtDescription" placeholder="Nội dung SEO"/>  
    								</p>
                                     <p>
    									<label>Mô tả ngắn bài viết</label>
    									<textarea class="text-input textarea" id="txtShortContent" name="txtShortContent" cols="79" rows="4"><?php echo $data['short_content']?></textarea>
    								</p>
                                
                                </fieldset>
                            </div>
							<div class="clear">
                                <p>
									<label>Nội dung bài viết</label>
									<textarea class="text-input textarea ckeditor" id="txtContent" name="txtContent" cols="79" rows="5"><?php echo $data['content']; ?></textarea>
								</p>
								
								<p>
                                    <label class="label-none">Hiển thị: </label>
									<label class="label-none">Yes <input type="radio" name="status" value="1" <?php if($data['status'] == 1) echo "checked='checked'";?>/></label>
                                    <label class="label-none">No <input type="radio" name="status" value="0" <?php if($data['status'] == 0) echo "checked='checked'";?> /></label>
									
								</p>
                                 <?php
                                    if(author_admin() == true){ //Phan quyen user
                                ?>
                                <p>
                                    <label>Bài viết nổi bật: <input type="checkbox" name="txtHightlight" <?php if($data['hightlight'] == 1) echo "checked='checked'";?>/></label>
                                </p>
                                <p>
                                    <label>Lượt xem: <input class="text-input" type="number" name="txtViewPost" value="<?php echo $data['view_post'];?>"/></label>
                                </p>
                             <?php
                                }
                             ?>
								<p>
									<input class="button" type="submit" name="btnOK" value="Cập nhật" />
								</p>
                            </div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->     
<?php
    require "../templates/backend/green/bottom.php"
?>