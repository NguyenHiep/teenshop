<?php
    require "../templates/backend/blue/left.php";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left"> Thêm mới bài viết </h1>
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
                <li class="active">Thêm mới bài viết</li>
            </ol>
			
			  <!-- Main content -->
    
    <section class="content">
           <div class="row">
         <form role="form" action="" method="post" enctype="multipart/form-data" id="add-blog">
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
                          <label for="cat_id">Chọn chuyên mục</label>
                              <select id="txtcatId" name="txtcatId"  class="form-control select2" style="width: 100%;">
                                  
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
                            
                        </div>
                        
                        <div class="form-group">
                          <label for="txtTitle">Tiêu đề bài viết</label>
                          <input type="text" class="form-control" id="txtTitle" name="txtTitle" placeholder="Nhập tiêu đề cho bài viết" value="<?php echo @$_POST['txtTitle']; ?>"/>
                        </div>
                        <div class="form-group">
                          <label for="txtSlug">Tên không dấu bài viết</label>
                          <input type="text" class="form-control" id="txtSlug" name="txtSlug" placeholder="Tên mặc định là tên bài viết không dấu" value="<?php echo @$_POST['txtSlug']; ?>"/>
                        </div>
                        <div class="form-group">
                          <label for="txtImage"> Ảnh bài viết</label>
                            <input class="form-control" type="text" name="txtImage" id="txtImage" readonly="readonly" value="<?php echo @$_POST['txtImage']; ?>"/>
                            <input class="form-control btn btn-primary" type="button" value="Chọn Ảnh ..." onclick="BrowseServer();"/>
                        </div>
                        
                      </div>
        
                  
                  <!-- /.box -->
        
                </div>
                <div class="col-md-6">
                       <div class="box-body">
                        <div class="form-group">
                         	<label for="txtKeyword">Từ khóa SEO</label>
    						<input class="form-control" type="text" id="txtKeyword" name="txtKeyword" placeholder="Từ khóa SEO" value="<?php echo @$_POST['txtKeyword']; ?>"/>  
    				
                        </div>
                        <div class="form-group">
                          	<label for="txtDescription">Mô tả ngắn SEO</label>  
    						<textarea class="form-control" id="txtDescription" name="txtDescription" rows="3" placeholder="Nội dung SEO"><?php echo @$_POST['txtDescription']; ?></textarea>
                        </div>
                        
                         <div class="form-group">
                          	<label for="txtShortContent">Mô tả ngắn bài viết</label>  
    						<textarea class="form-control" id="txtShortContent" name="txtShortContent" rows="5" placeholder="Mô tả ngắn"><?php echo @$_POST['txtShortContent']; ?></textarea>
                        </div>
                      </div>
                </div>
              </div>
              <div class="col-md-12 form-group">
                <div class="box-body">
                  <div class="form-group">
                      	<label for="txtShortContent">Nội dung bài viết</label>  
        				<textarea class="form-control ckeditor"  id="txtContent" name="txtContent" rows="4" placeholder="Mô tả ngắn"><?php echo @$_POST['txtContent']; ?></textarea>
                    </div>
                    <!-- radio -->
                  <div class="form-group">
                    <label>
                        Hiển thị 
                        <input type="radio" name="status" value="1" class="minimal" checked="checked" />
                    </label>
                    <label>
                        Không hiển thị
                      <input type="radio" name="status" value="0"  class="minimal" />
                    </label>
                   
                  </div>
                    <?php
                        if(author_admin() == true){ //Phan quyen
                        ?>
                         <div class="form-group">
                            <label>
                                Bài viết nổi bật
                                <input type="checkbox" class="minimal" name="txtHightlight" value="1"/>
                            </label>
                        </div>
                         <div class="form-group">
                            <label>
                                Lượt xem
                                <input type="number" class="minimal" name="txtViewPost"/>
                            </label>
                        </div>
                        
                       <?php
                       } //End phan quyen
                       ?>
                               
                  
              </div> <!-- End .body-->
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