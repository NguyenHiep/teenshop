<?php
    require "../templates/backend/blue/left.php";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left"> Cập nhật bài viết - <?php echo $data['blog_name']; ?> </h1>
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
                <li class="active"><?php echo $data['blog_name']; ?></li>
            </ol>
			
			  <!-- Main content -->
    
    <section class="content">
           <div class="row">
         <form role="form" action="<?php ?>" method="post" enctype="multipart/form-data" id="add-blog">
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
                                   <option value="0"> Vui lòng chọn chuyên mục </option>
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
                            
                        </div>
                        
                        <div class="form-group">
                          <label for="txtTitle">Tiêu đề bài viết</label>
                          <input type="text" class="form-control" id="txtTitle" name="txtTitle" placeholder="Nhập tiêu đề cho bài viết" value="<?php echo isset($_POST['txtTitle']) ? $_POST['txtTitle'] :  $data['blog_name']; ?>"/>
                        </div>
                        <div class="form-group">
                          <label for="txtSlug">Tên không dấu bài viết</label>
                          <input type="text" class="form-control" id="txtSlug" name="txtSlug" placeholder="Tên mặc định là tên bài viết không dấu" value="<?php echo isset($_POST['txtSlug']) ? $_POST['txtSlug'] : $data['slug'] ; ?>"/>
                        </div>
                         <?php
                            if(trim($data['image']) != "none"){
                         ?>
                            <div class="form-group">
                              <label for="txtImage"> Ảnh bài viết</label>
                              <img src="<?php echo trim($data['image']);?>" height="170" width="200" class="img-responsive"/>
                            </div>
                        <?php
                            }//End if
                        ?>
                        <div class="form-group">
                          <label for="txtImage"> Cập nhật ảnh</label>
                            <input class="form-control" type="text" name="txtImage" id="txtImage" readonly="readonly" value="<?php echo isset($_POST['txtImage']); ?>"/>
                            <input class="form-control btn btn-primary" type="button" value="Chọn Ảnh ..." onclick="BrowseServer();"/>
                        </div>
                        
                      </div>
        
                  
                  <!-- /.box -->
        
                </div>
                <div class="col-md-6">
                       <div class="box-body">
                        <div class="form-group">
                         	<label for="txtKeyword">Từ khóa SEO</label>
    						<input class="form-control" type="text" id="txtKeyword" name="txtKeyword" placeholder="Từ khóa SEO" value="<?php echo isset($_POST['txtKeyword'])? $_POST['txtKeyword'] : $data['meta_keyword']; ?>"/>  
    				
                        </div>
                        <div class="form-group">
                          	<label for="txtDescription">Mô tả ngắn SEO</label>  
    						<textarea class="form-control" id="txtDescription" name="txtDescription" rows="3" placeholder="Nội dung SEO"><?php echo isset($_POST['txtDescription'])? $_POST['txtDescription'] : $data['meta_description']; ?></textarea>
                        </div>
                        
                         <div class="form-group">
                          	<label for="txtShortContent">Mô tả ngắn bài viết</label>  
    						<textarea class="form-control" id="txtShortContent" name="txtShortContent" rows="5" placeholder="Mô tả ngắn"><?php echo isset($_POST['txtShortContent'])? $_POST['txtShortContent'] : $data['short_content']; ?></textarea>
                        </div>
                      </div>
                </div>
              </div>
              <div class="col-md-12 form-group">
                <div class="box-body">
                  <div class="form-group">
                      	<label for="txtShortContent">Nội dung bài viết</label>  
        				<textarea class="form-control ckeditor"  id="txtContent" name="txtContent" rows="4" placeholder="Mội dung bài viết"><?php echo   isset($_POST['txtContent'])? $_POST['txtContent'] : $data['content']; ?></textarea>
                    </div>
                    <!-- radio -->
                  <div class="form-group">
                    <label>
                        Hiển thị 
                        <input type="radio" name="status" value="1" class="minimal" <?php if($data['status'] == 1) echo "checked='checked'";?> />
                    </label>
                    <label>
                        Không hiển thị
                      <input type="radio" name="status" value="0"  class="minimal" <?php if($data['status'] == 0) echo "checked='checked'";?> />
                    </label>
                   
                  </div>
                    <?php
                        if(author_admin() == true){ //Phan quyen
                        ?>
                         <div class="form-group">
                            <label>
                                Bài viết nổi bật
                                <input type="checkbox" class="minimal" name="txtHightlight"  <?php if($data['hightlight'] == 1) echo "checked='checked'";?>/>
                            </label>
                        </div>
                         <div class="form-group">
                            <label>
                                Lượt xem bài viết
                                <input type="number" class="minimal" name="txtViewPost" value="<?php echo $data['view_post'];?>" />
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