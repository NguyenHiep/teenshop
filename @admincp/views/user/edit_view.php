<?php
    require "../templates/backend/green/left.php";
?>
		 <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Cập nhật thành viên</h3>
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
					
						<form action="<?php echo BASE_ADMIN;?>/user/edit/uid/<?php echo $data['user_id'];?>" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							     <p>
									<label>Chức vụ</label>              
									<select name="cbbGroup" class="small-input">
										<option value="0" >-- Vui lòng chọn cấp bậc --</option>
										<option value="1" <?php if($data['group_id'] == '1') echo "selected='selected'";?>>Quản trị viên</option>
										<option value="2" <?php if($data['group_id'] == '2') echo "selected='selected'";?>>Thành viên</option>
										<option value="3" <?php if($data['group_id'] == '3') echo "selected='selected'";?>>Khách hàng</option>
									</select> 
								</p>
                                	
								<p>
									<label>Tên tài khoản</label>
										<input class="text-input small-input" type="text" id="txtUsername" name="username" placeholder="Vui lòng nhập tên tài khoản" required="required" value="<?php echo $data['username'];?>"/>  
								</p>
								<p>
									<label>Mật khẩu mới</label>
										<input class="text-input small-input" type="password" id="txtPassword" name="txtPassword" placeholder="Vui lòng nhập mật khẩu"/>  

								</p>
								<p>
									<label>Email</label>
									<input class="text-input medium-input" type="email" id="txtEmail" name="txtEmail" placeholder="Vui lòng nhập email" required="required" value="<?php echo $data['email'];?>"/>
								</p>
								<p>
									<label>Họ và tên đệm</label>
									<input class="text-input medium-input" type="text" id="txtFirstName" name="txtFirstName" placeholder="Họ và tên đệm" value="<?php echo $data['firstname'];?>"/>
								</p>
								
                                	<p>
									<label>Tên của bạn</label>
									<input class="text-input medium-input" type="text" id="txtLastName" name="txtLastName" placeholder="Tên của bạn" value="<?php echo $data['lastname'];?>"/>
								</p>
                                <p>
									<label>Số điện thoại</label>
										<input class="text-input small-input" type="tel" id="txtPhone" name="txtPhone" placeholder="Số điện thoại" value="<?php echo $data['phone_number'];?>"/>  
								
								</p>
                                
								
								<p>
									<label>Địa chỉ liên hệ</label>
									<textarea class="text-input textarea wysiwyg" id="txtAddress" name="txtAddress" cols="79" rows="5"><?php echo $data['address'];?></textarea>
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