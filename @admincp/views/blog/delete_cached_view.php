<?php
    require "../templates/backend/blue/left.php";
 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left"> Quản lý cached </h1>
      <div class="pull-right">
            <a href="<?php echo BASE_ADMIN.'/blog/deletecached'?>" class="btn btn-sm  btn-warning">
            <span class="glyphicon glyphicon-trash"></span> Xóa cached post</a>
      </div>
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
                <div class="row">
                      <div class="col-xs-12 text-center hidden">
                          <button type="button" class="btn btn-default btn-lrg ajax" title="Ajax Request">
                            <i class="fa fa-spin fa-refresh"></i>&nbsp; Get External Content
                          </button>
                           <div class="ajax-content text-center"></div>
                        </div>
                          <div class="col-md-6">
                            <form action="" method="post" role="form">
                            
                                <div class="box box-primary">
                                    <div class="box-header">
                                      <h3 class="box-title">Danh sách cached bài viết</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="checkbox cached-checkbox"><label>
                                                <input type="checkbox" value="" name="checkall" id="check-all-cached" />
                                                Chọn tất cả 
                                            </label> </div>  
                                            <?php
                                                $option = '';
                                                if(!empty($filedelBlogDetail)){
                                                    foreach($filedelBlogDetail as $file)
                                                   $option .= '<div class="checkbox cached-checkbox"><label>
                                                    <input type="checkbox" value="'.$file.'" name="filedel_blogdetail[]" />
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
                              
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="" method="post" role="form">
                               
                                <div class="box box-primary">
                                    <div class="box-header">
                                      <h3 class="box-title">Danh sách cached trang hiển thị</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="checkbox cached-checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" name="checkall" id="check-all-cached" />
                                                        Chọn tất cả 
                                                    </label> 
                                            </div> 
                                              <?php
                                                $option = '';
                                                if(!empty($filedelPage)){
                                                    foreach($filedelPage as $file)
                                                   $option .= '<div class="checkbox cached-checkbox"><label>
                                                    <input type="checkbox" value="'.$file.'" name="filedel_page[]"/>
                                                    '.$file.'
                                            </label> <a href="#" class="pull-right"><i class="fa fa-trash-o"></i></a></div>'; 
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
                            </form>
                        </div>
                </div>
           
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