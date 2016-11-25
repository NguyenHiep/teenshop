<?php
    require "../templates/backend/blue/left.php";
 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left"> Danh sách bài viết </h1>
      <div class="pull-right">
            <a href="<?php echo BASE_ADMIN.'/blog/add'?>" class="btn btn-sm  btn-primary">
            <span class="glyphicon glyphicon-plus-sign"></span> Thêm mới</a>
      </div>
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Danh sách bài viết</li>
            </ol>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="" method="GET">
                <div class="input-group input-group-md">
                    <input name="q" type="text" class="form-control"  placeholder="Nhập nội dung muốn tìm"/>
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat">Tìm kiếm</button>
                    </span>
                </div>
              </form>  
                
              <p></p>
                <div class="row">
                  <div class="col-xs-12 text-center hidden">
                      <button type="button" class="btn btn-default btn-lrg ajax" title="Ajax Request">
                        <i class="fa fa-spin fa-refresh"></i>&nbsp; Get External Content
                      </button>
                       <div class="ajax-content text-center">
                  </div>
           </div>
           
            </div>
              <table id="list-blog" class="table table-hover table-bordered">
                <thead>
                <tr class="info">
                  <th><a href="?sort=id">ID </a></th>
                  <th><a href="?sort=cate">Chuyên mục</a></th>
                  <th><a href="?sort=title">Tiêu đề </a></th>
                  <th class="text-center">Share post</th>
                  <th><a href="?sort=poston">Ngày cập nhật </a></th>
                  <th class="text-center"><a href="?sort=hightlight">Nổi bật </a></th>
                  
                  <th class="text-center">Thao tác</th>
                </tr>
                </thead>
                <tbody>
          <?php
            if($totalItems > 0){
            foreach($data as $item):
          ?>    
                <tr>
                  <td><?php echo $item['blog_id'];?></td>
                  <td><?php echo $item['cat_name']; ?></td>  
                  <td><a href="<?php echo BASE_URL.'danh-muc/'.trim($item['slugcat']).'/'.trim($item['slug']).'-'.$item['blog_id'].'.html'; ?>" target="_blank"><?php echo $item['blog_name'];?></a></td>
                  <td><a href="#">Share  <i class="fa fa-share" aria-hidden="true"></i></a></td>
                  <td><?php echo $item['post_on']; ?></td>
                  <td class="icheck text-center"> <input data-id="<?php echo $item['blog_id']; ?>" class="minimal ckhHightLight" type="checkbox" name="ckhHightLight" <?php if($item['hightlight'] == 1) echo "checked='checked'"; ?>/> </td>
                  
                  <td>
                    <a href="<?php echo BASE_ADMIN;?>/blog/edit/catid/<?php echo  $item['blog_id']; ?>" class="btn btn-primary btn-sm btn_edit col-md-3">
                    <span class="glyphicon glyphicon-pencil"></span> Sửa</a>
                    <button  <?php if($item['status'] == 0) echo "disabled = 'disabled'"; ?>  data-id="<?php echo $item['blog_id'];?>" class="btn btn-info btn-sm btn_an <?php echo "btn_an".$item['blog_id']; ?> col-md-3">
                                <span class="fa fa-times-circle"></span> Ẩn
                    </button>
                    <button <?php if($item['status'] == 1) echo "disabled = 'disabled'"; ?> data-id="<?php echo $item['blog_id'];?>" class="btn btn-info btn-sm btn_hien <?php echo "btn_hien".$item['blog_id']; ?>  col-md-3">
                                <span class="fa fa-times-circle"></span> Hiện
                     </button>
                     <a onclick="return validate_del();" href="<?php echo BASE_ADMIN;?>/blog/del/catid/<?php echo  $item['blog_id'];?>" class="btn btn-sm btn-danger btn_delete col-md-3" data-id="<?php echo $item['blog_id'];?>">
                     <span class="glyphicon glyphicon-trash"></span> Xóa</a>
                  </td>
                </tr>
          <?php
            endforeach;
          }else{
            echo "<tr>";
            echo "<td colspan='6' class='text-center'>Dữ liệu rỗng</td>";
            echo "</tr>";
          }
          ?>      
                </tbody>
               
              </table>
              <div class="row">
                <?php
                    if($totalItems >1){
                        $start = $position + 1;
                        $limit = $totalItemsPage*$currentPage;
                        if($limit > $totalItems){
                            $limit = $totalItems;
                        }
                   ?>
                <div class="col-md-5 col-sm-12">
                    <p style="margin-top:  20px;">Bài viết từ <?php echo $start; ?> đến <?php echo $limit; ?> trên tổng cộng <?php echo $totalItems;?></p>
                </div>
                  <div class="col-md-7 col-sm-12 text-right">
                       <?php 
                                echo $paginationHTML;
                        ?>
                  </div>
               <?php }//End if ?>
              
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