<?php
    require "../templates/backend/green/left.php";
?>
 <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Thêm mới bài viết</h3>
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
							<div class="col-left">
                                <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->      	
								<p>
									<label>Chọn chuyên mục: 
                                    </label>
                                    	<select name="txtcatId" class="medium-input">
                                                <option value="0">--Chọn chuyên mục --</option>
                                                <?php
                                                    if($mcateblog->num_rows($cat_id) >0){
                                                        recursiveMenu($cat_id);
                                                        /*$html = '';
                                                        foreach($cat_id as $cate):
                                                            $html .= "<option value='{$cate["cat_id"]}'>{$cate["cat_name"]}</option>";
                                                        endforeach;
                                                        echo $html;
                                                        */
                                                    }
                                                ?>
                                             </select>
								
								</p>
                                <p>
                                    <label>Tiêu đề bài viết: </label>
                                     <input class="text-input medium-input" type="text" id="txtTitle" name="txtTitle" placeholder="Nhập tiêu đề cho bài viết"/>  

                               	</p>
                                
                                 <p>
                                    <label>Slug  </label>
                                    <input class="text-input medium-input" type="text" id="txtSlug" name="txtSlug" placeholder="Nhập tiêu đề cho bài viết"/>  
                                 
                               	</p>
                                <!--
                                <p>
                                    <label>Ảnh bài viết: <input class="text-input small-input" type="file" name="txtImage" id="txtImage"/></label>
                                </p>
                                -->
                                 <p>
                                    <label> Ảnh bài viết</label>
                                    <input class="text-input" type="text" name="txtImage" id="txtImage" readonly="readonly"/>
                                    <input class="button" type="button" value="Chọn Ảnh ..." onclick="BrowseServer();"/>
                                </p>
							</fieldset>
                            </div>
                            <div class="col-right">
                                 <p>
									<label>Meta Keyword</label>
										<input class="text-input large-input" type="text" id="txtKeyword" name="txtKeyword" placeholder="Từ khóa SEO"/>  
								</p>
                                 <p>
									<label>Meta Description</label>
										<input class="text-input large-input" type="text" id="txtDescription" name="txtDescription" placeholder="Nội dung SEO"/>  
								</p>
       	                        <p>
									<label>Mô tả ngắn bài viết</label>
									<textarea class="text-input textarea" id="txtShortContent" name="txtShortContent" cols="79" rows="4"></textarea>
								</p>
                                
                              
                            </div>
                            <div class="clear">
                             <p>
								<label>Nội dung bài viết</label>
								<textarea class="text-input textarea ckeditor" id="txtContent" name="txtContent" cols="79" rows="5"></textarea>
							   </p>
                            <p>
                                <label class="label-none">Hiển thị: </label>
								<label class="label-none">Yes <input type="radio" name="status" value="1" checked="checked"/></label>
                                <label class="label-none">No <input type="radio" name="status" value="0"/></label>
								
							</p>    
                                 <?php
                                if(author_admin() == true){ //Phan quyen
                                ?>
                                <p>
                                    <label>Bài viết nổi bật: <input type="checkbox" name="txtHightlight" value="1"/></label>
                                </p>
                                <p>
                                    <label>Lượt xem: <input class="text-input" type="number" name="txtViewPost"/></label>
                                </p>
                               <?php
                                    }
                               ?>
                              <p class="clear">
								<input class="button" type="submit" name="btnOK" value="Thêm mới" />
							</p>
                            </div>
                        	
								
							
								
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->     
<?php
    require "../templates/backend/green/bottom.php"
?>