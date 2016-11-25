<?php
    require "templates/frontend/version3/blog-header.php";
 ?>
  <div class="main">
      <div class="container">
      
        <ul class="breadcrumb">
            <li><a href="<?php echo BASE_URL;?>">Home</a></li>
            <li class="active">Cập nhật thông tin cá nhân</li>
        </ul>
      
            <h1>Thông tin của bạn</h1>
            
         
            <div class="row" style="margin-bottom: 20px ;">
                <div class="col-md-9">
                    <form  role="form" action="" method="POST">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="txtEmail" />
                            </div>
                              <div class="form-group">
                                <label for="lastname">Họ và tên đệm</label>
                                <input type="text" class="form-control" name="txtLastName" />
                              </div>
                            <div class="form-group">
                                <label for="firstname">Tên:</label>
                                <input type="text" class="form-control" name="txtFirstName" />
                            </div>
                              <div class="form-group">
                                <label for="avatar">Ảnh đại diện:</label>
                                <input type="file" class="form-control" name="txtAvatar" />
                              </div>
                              <div class="form-group">
                                <label for="address">Địa chỉ liên hệ:</label>
                                <textarea  class="form-control" rows="3" name="txtAddress"></textarea>
                            </div>
                              <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" name="txtPhone" />
                              </div>
                        </div>
                        <div class="col-md-6">
                                 <div class="form-group">
                                <label for="nickname">Nick name</label>
                                <input type="text" class="form-control" name="nickname" />
                            </div>
                              <div class="form-group">
                                <label for="instruction">Mô tả ngắn về bạn</label>
                                 <textarea  class="form-control" rows="3" name="txtInstruction"></textarea> 
                              </div>
                            <div class="form-group">
                                <label for="facebook">Địa chỉ facebook:</label>
                                <input type="text" class="form-control" name="facebook" />
                            </div>
                              <div class="form-group">
                                <label for="google">Địa chỉ google plus</label>
                                <input type="text" class="form-control" name="google" />
                              </div>
                              <div class="form-group">
                                <label for="twitter">Địa chỉ twitter: </label>
                                <input type="text" class="form-control" name="twitter" />
                            </div>
                              <div class="form-group">
                                <label for="password">Mật khẩu mới:</label>
                                <input type="password" class="form-control" name="txtPassword">
                              </div>
                        </div>
                         <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" name="btnUpdate">Cập nhật</button>
                         </div>
                    </form>
            
                </div>
                <div class="col-md-3">
                    <h2>Danh mục</h2>
                </div>
            </div>
            
        </div>
    </div>
 <?php
    require "templates/frontend/version3/blog-footer.php";
?>