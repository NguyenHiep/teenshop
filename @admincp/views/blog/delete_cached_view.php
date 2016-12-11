<?php
    require "../templates/backend/blue/left.php";
 
?>
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left"> Quản lý cached </h1>
      <!--<div class="pull-right">
            <a href="<?php echo BASE_ADMIN.'/blog/deletecached'?>" class="btn btn-sm  btn-warning">
            <span class="glyphicon glyphicon-trash"></span> Xóa cached post</a>
      </div>
      -->
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Quản lý cached</li>
            </ol>
            <!-- /.box-header -->
            <div class="box-body">
             <form action="" method="post" role="form" id="form-delcached">
                <div class="row margin-bottom-30">
                    <div class="col-md-12">
                         <button name="submit" type="submit"  class="pull-right btn btn-sm  btn-warning ">Xóa cached</button>
                        
                         <div class="text-center message-success">
                            <?php
                                if(isset($message)){
                                    echo $message;
                                }
                            ?>
                         </div>
                    </div>
                </div>
                <div class="row">
                      <div class="col-xs-12 text-center hidden">
                          <button type="button" class="btn btn-default btn-lrg ajax" title="Ajax Request">
                            <i class="fa fa-spin fa-refresh"></i>&nbsp; Get External Content
                          </button>
                           <div class="ajax-content text-center"></div>
                        </div>
                        
                          <div class="col-md-6">
                                <div class="box box-primary">
                                    <div class="box-header">
                                      <h3 class="box-title">Danh sách cached bài viết</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="checkbox cached-checkbox"><label>
                                                <input type="checkbox" value="" name="checkall" id="check-all-cached" />
                                                Xóa tất cả cached post detail 
                                            </label> </div>  
                                            <?php
                                                $option = '';
                                                if(!empty($filedelBlogDetail)){
                                                    foreach($filedelBlogDetail as $file)
                                                   $option .= '<div class="checkbox cached-checkbox"><label>
                                                    <input class="cached-checkbox-detail" type="checkbox" value="'.$file.'" name="filedel_blogdetail[]" />
                                                    '.$file.'
                                            </label> <a href="#test" class="pull-right" onclick="validate_del()"><i class="fa fa-trash-o"></i></a></div>'; 
                                                }
                                                echo $option;
                                            ?>
                                                
                                              
                                        </div>
                                        <div class="box-footer clearfix no-border">
                                             <div class="box-tools pull-right">
                                                <ul class="pagination pagination-sm inline">
                                                  <li><a href="#">&laquo;</a></li>
                                                  <li><a href="#">1</a></li>
                                                  <li><a href="#">2</a></li>
                                                  <li><a href="#">3</a></li>
                                                  <li><a href="#">&raquo;</a></li>
                                                </ul>
                                              </div>
                                        </div>
                                    </div>
                                   
                              </div>
                        </div>
                        <div class="col-md-6">
                               
                                <div class="box box-primary">
                                    <div class="box-header">
                                      <h3 class="box-title">Danh sách cached trang hiển thị</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="checkbox cached-checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" name="checkall" id="check-all-cached-page" />
                                                        Xóa tất cả cached page 
                                                    </label> 
                                            </div> 
                                              <?php
                                                $option = '';
                                                if(!empty($filedelPage)){
                                                    foreach($filedelPage as $file)
                                                   $option .= '<div class="checkbox cached-checkbox"><label>
                                                    <input class="cached-checkbox-page" type="checkbox" value="'.$file.'" name="filedel_page[]"/>
                                                    '.$file.'
                                            </label> <a href="#" class="pull-right" onclick="validate_del()"><i class="fa fa-trash-o"></i></a></div>'; 
                                                }
                                                echo $option;
                                            ?>
                                        </div>
                                        <div class="box-footer clearfix no-border">
                                             <div class="box-tools pull-right">
                                                <ul class="pagination pagination-sm inline">
                                                  <li><a href="#">&laquo;</a></li>
                                                  <li><a href="#">1</a></li>
                                                  <li><a href="#">2</a></li>
                                                  <li><a href="#">3</a></li>
                                                  <li><a href="#">&raquo;</a></li>
                                                </ul>
                                              </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                              </div>
                           
                        </div>
                
                </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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