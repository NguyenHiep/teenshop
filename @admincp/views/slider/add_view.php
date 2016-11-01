<?php
    require "../templates/backend/blue/left.php";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left"> Thêm mới slider </h1>
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
                <li class="active"> Thêm mới slider </li>
            </ol>
			
		 	 <!-- Main content -->
                <section class="content">
                       <div class="row">
                      <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
							
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
                            <div class="col-md-12">
                                  <div class="box-body">
                                   
                                    <div class="form-group">
    									<label for="txtType">Trang hiển thị slider</label>
    									<select id="txtType" name="txtType" class="form-control select2">
                                            <option value="blog" selected="selected">Blog</option>
                                            <option value="shop">Shop online</option>
                                        </select>
    								</div>
    								<div class="form-group">
    									<label for="txtTitle">Tiêu đề</label>
    									<input class="form-control" type="text" id="txtTitle" name="txtTitle" placeholder="Nhập tiêu đề slider" /> 
    								</div>
    								<div class="form-group">
    									<label for="txtImage">Hình ảnh</label>
    									<input type="file" class="form-control"  id="txtImage" name="txtImage" /> 
    									
    								</div>
    								<div class="form-group">
    									<label for="txtAlt">Alt</label>
    									<input class="form-control" type="text" id="txtAlt" name="txtAlt" placeholder="Alt" /> 
    								</div>
    								<div class="form-group">
    									<label for="txtPosition">Thứ tự</label>
    									<input class="form-control" type="number" id="txtPosition" name="txtPosition" placeholder="Thứ tự" /> 
    								</div>
                                    
    								<div class="form-group">
    									<label>Link liên kết</label>
    									<input type="text" class="form-control" name="txtLink" placeholder="Nhập link liên kết" />
    								</div>
    								
    								<div class="form-group">
    									<label for="txtTarget">Target</label>
    									<select id="txtTarget" name="txtTarget" class="form-control select2">
                                            <option value="_blank" selected="selected">Mở ra trang mới</option>
                                            <option value="_self">Mở ra trang hiện tại</option>
                                        </select>
    								</div>
    								
    								<div class="form-group">
    									<label for="txtStatus">Trạng thái</label>              
    									<label class="label-none">Ẩn <input class="minimal" type="radio" name="txtStatus" value="0" checked="checked"/></label>
                                        <label class="label-none">Hiện <input class="minimal" type="radio" name="txtStatus" value="1"/></label>
    								</div>
    								
    								<div class="form-group">
    									<label>Nội dung trên slider</label>
    									<textarea class="form-control textarea wysiwyg" id="txtContent" name="txtContent" cols="79" rows="7" placeholder="Nhập nội dung"></textarea>
    								</div>
							
                            </div> <!-- End box-body -->
                         
                            
                            </div>
                          </div>
                          <div class="clearfix"></div>
                           <div class="box-footer">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button type="submit" class="btn btn-primary" name="btnSave">Lưu</button>
                                <button type="submit" class="btn btn-primary" name="btnAdd" >Lưu và đóng lại</button>
                            </div>
                     </form>
                     </div>
                </section><!-- /.content -->
		</div>
        <!-- /.content-wrapper -->
        </div>
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