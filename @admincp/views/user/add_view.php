<?php
    require "../templates/backend/blue/left.php";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left"> Thêm mới thành viên </h1>
      <div class="pull-right">
            <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-sm  btn-primary">
            <span class="glyphicon glyphicon-arrow-left"></span> Quay về</a>
      </div>
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <ol class="breadcrumb">
                <li><a href="<?php echo BASE_ADMIN;?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Thêm mới thành viên</li>
            </ol>
			
			  <!-- Main content -->
    
    <section class="content">
           <div class="row">
         <form role="form" action="" method="post" enctype="multipart/form-data" id="add-user">
             <div class="col-md-12">
                 <div class="form-group has-error">
                      <?php
                        if(!empty($error)):
                            
                            foreach($error as $err):
                                echo '<label class="control-label" for="inputError">
                                        <i class="fa fa-times-circle-o"></i> '.$err.'
                                        </label> <br/>';
                            endforeach;    
                       
                        endif;
                        if(isset($msgsuccess)){
                            echo '<p class="text-success">'.$msgsuccess.'</p>';
                        }
                     ?> 
                </div>
               
             </div>
              <div class="clearfix"></div>
              <div class="box box-primary">
                <div class="col-md-6">
                      <div class="box-body">
                            <div class="form-group">
    							<label>Chức vụ</label>              
    							<select name="cbbGroup" class="form-control">
    								<option value="0">-- Vui lòng chọn cấp bậc --</option>
    								<option value="1">Quản trị viên</option>
    								<option value="2">Thành viên</option>
    								<option value="3">Khách hàng</option>
    							</select> 
  							</div>
                                       
       	                        <div class="form-group">
									<label>Ảnh đại diện</label>
									<input class="form-control" type="file" id="txtAvatart" name="txtAvatart"/>
								</div>
                                 <div class="form-group">
									<label>Biệt danh</label>
									<input class="text-input form-control" type="text" id="txtNickname" name="txtNickname"/>
								</div>
                                <div class="form-group">
                                    <label>Mô tả ngắn về bạn</label>
                                    <textarea name="txtInstruction" rows="3" cols="72" class="form-control" placeholder="Nhập mô tả ngắn"></textarea>
                                </div>
                                
                                
								<div class="form-group">
									<label>Tên tài khoản</label>
										<input class="text-input form-control" type="text" id="txtUsername" name="username" placeholder="Vui lòng nhập tên tài khoản" required="required"/>  
								</div>
								<div class="form-group">
									<label>Mật khẩu</label>
										<input class="text-input form-control" type="password" id="txtPassword" name="txtPassword" placeholder="Vui lòng nhập mật khẩu" required="required"/>  

								</div>
								
								<div class="form-group">
									<label>Email</label>
									<input class="text-input form-control" type="email" id="txtEmail" name="txtEmail" placeholder="Vui lòng nhập email" required="required"/>
								</div>
                                 <div class="form-group">
									<label>Số điện thoại</label>
										<input class="text-input form-control" type="tel" id="txtPhone" name="txtPhone" placeholder="Số điện thoại" />  
								
								</div>
                  
                  <!-- /.box -->
        
                </div>
                </div>
                <div class="col-md-6">
                       <div class="box-body">
                            <div class="form-group">
								<label>Họ và tên đệm</label>
								<input class="text-input form-control" type="text" id="txtFirstName" name="txtFirstName" placeholder="Họ và tên đệm"/>
							</div>
							
      	                     <div class="form-group">
								<label>Tên của bạn</label>
								<input class="text-input form-control" type="text" id="txtLastName" name="txtLastName" placeholder="Tên của bạn"/>
							</div>                              
							
							<div class="form-group">
								<label>Địa chỉ liên hệ</label>
								<textarea class="text-input textarea wysiwyg" id="txtAddress" name="txtAddress" cols="79" rows="5"></textarea>
							</div>
                             <div class="form-group">
					           <label>Link facebook<span class="glyphicon icon-facebook"></span> <input class="unique facebook minimal" type="checkbox" value="" /></label>
					            <input id="facebook" class="text-input form-control" type="text"  title="Link share facebook" name="txtFacebook" value="" />
                              </div>
                            <div class="form-group">
					            <label>Link google<span class="glyphicon icon-google"></span> <input class="unique google minimal" type="checkbox" value="" /></label>
					            <input id="google" class="text-input form-control" type="text"  title="Link share google" name="txtGoogle" value="" />
                              </div>
                              <div class="form-group">
					           <label>Link twitter<span class="glyphicon icon-twitter"></span> <input class="unique  minimal" type="checkbox" value="" /></label>
					            <input id="twitter" class="text-input form-control" type="text"  title="Link share twitter" name="txtTwitter" value="" />
                              </div>
                              <div class="form-group">
                                    <label>Trạng thái</label>
                                    Ẩn <input class="minimal" type="radio" name="status" value="0" />
                                    Hiện <input class="minimal" type="radio" name="status" value="1" checked="checked"/>
                              </div>
                      </div>
                </div>
              </div>
              
               <div class="clearfix"></div>
               <div class="box-footer">
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-primary" name="btnSave">Lưu</button>
                    <button type="submit" class="btn btn-primary" name="btnOK" >Lưu và đóng lại</button>
               </div>
              <!-- /.box -->
       </form>
          
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
    require "../templates/backend/blue/bottom.php"
?>