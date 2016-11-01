<?php
    require "../templates/backend/blue/left.php";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left"> Bạn đang sửa chuyên mục - <?php echo $data['cat_name'];?> </h1>
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
                <li class="active"><?php echo $data['cat_name'];?> </li>
            </ol>
			
		 	 <!-- Main content -->
                <section class="content">
                       <div class="row">
                      <form class="form-horizontal" role="form" action="<?php echo BASE_ADMIN;?>/cateblog/edit/catid/<?php echo $data['cat_id'];?>" method="post" enctype="multipart/form-data">
							
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
                                  <!--
                                    <div class="form-group">
                                      <label for="txtImage"> Cập nhật ảnh</label>
                                        <input class="form-control" type="text" name="txtImage" id="txtImage" readonly="readonly" value="<?php echo isset($_POST['txtImage']); ?>"/>
                                        <input class="form-control btn btn-primary" type="button" value="Chọn Ảnh ..." onclick="BrowseServer();"/>
                                    </div>
                                    -->
                                    <!-- BEGIN -->
                         	
                                <div class="form-group">
									<label for="txtCate">Tên chuyên mục</label>
									<input  class="form-control" value="<?php echo $data['cat_name'];?>"  type="text" id="txtCate" name="txtCate" placeholder="Vui lòng nhập tên chuyên mục" required="required"/>  
                                </div>
                                 <div class="form-group">
									<label for="txtCateSlug">Slug chuyên mục</label>
									<input value="<?php echo $data['slug'];?>" class="form-control" type="text" id="txtCateSlug" name="txtCateSlug" placeholder="Tên không dấu chuyên mục, mặc định sẽ lấy tên chuyên mục"/>  
								</div>
                                <div class="form-group">
									<label for="txtParent">Parent</label>
								    <select id="txtParent" name="txtParent" class="form-control select2" style="width: 100%;">
                                        <option value="0">Không</option>
                                        <?php
                                            if(count($listCate > 0)){
                                                echo recursiveMenu($listCate,$parent = 0, $text="", $data['parentid']);
                                               
                                            }
                                        ?>
                                    </select>
                                 </div>
                                 
                                <div class="form-group">
                                    <label class="label-none">Hiển thị:  </label>
									<label class="label-none"> Yes <input class="minimal"  type="radio" name="status" value="1" <?php if($data['status'] == 1) echo "checked='checked'";?>/></label>
                                    <label class="label-none"> No <input class="minimal" type="radio" name="status" value="0" <?php if($data['status'] == 0) echo "checked='checked'";?> /></label>
									
								</div>
                                <div class="form-group">
                                    <label for="position">Sắp xếp: <input value="<?php echo $data['position'];?>" type="number" class="form-control" id="position" name="position" style="width:  100px !important;"/></label>
      
                                </div>
                                <?php
                                    if($data['image'] !="none"){
                                ?>
                                <div class="form-group">
                                    <label for="img-old">Ảnh chuyên mục:</label>
                                    <img src="<?php echo URL_UPLOAD.'category/'.$data['image'];?>" width="100" height="100" class="img-responsive"/> 
                                    
                                </div>
                                <?php        
                                    } //End image
                                ?>
                                <div class="form-group">
                                    <label>Cập nhật ảnh: </label>
                                        <input class="form-control" type="file" name="txtImage" id="txtImage"/>
                                </div>
                               
                                <div class="form-group">
									<label for="txtMetakeyword">Meta keyword</label>
									<textarea class="form-control textarea wysiwyg" id="txtMetakeyword" name="txtMetakeyword" cols="79" rows="3"><?php echo $data['meta_keyword'];?></textarea>
								</div>
								<div class="form-group">
									<label for="txtMetadescription">Meta description</label>
									<textarea class="form-control textarea wysiwyg" id="txtMetadescription" name="txtMetadescription" cols="79" rows="3"><?php echo $data['meta_description'];?></textarea>
								</div>
							
                            </div> <!-- End box-body -->
                         
                            
                            </div>
                          </div>
                          <div class="clearfix"></div>
                           <div class="box-footer">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button type="submit" class="btn btn-primary" name="btnSave">Lưu</button>
                                <button type="submit" class="btn btn-primary" name="btnOK" >Lưu và đóng lại</button>
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