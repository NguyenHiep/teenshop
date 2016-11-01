<?php
    require "../templates/backend/blue/left.php";
 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left"> Danh sách bình luận</h1>
      
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <ol class="breadcrumb">
                <li><a href="<?php echo BASE_ADMIN;?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Danh sách bình luận</li>
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
           
            <form action="<?php echo BASE_ADMIN?>/comment/edit" method="POST">
              <table id="list-comments" class="table table-hover table-bordered">
                <thead>
                <tr class="info">
                  <th><input class="check-all" type="checkbox"/></th>
                  <th><a href="?sort=id">ID </a></th>
                  <th><a href="?sort=title">Email </a></th>
                  <th class="text-center">Ngày bình luận</th>
                  <th class="text-center">Nội dung</th>
                  <th class="text-center">Bài viết</th>
                  <th class="text-center">Trạng thái</th>
                </tr>
                </thead>
                <tbody>
          <?php
            if($totalItems > 0){
            foreach($res as $item):
               
          ?>    
                <tr>
                  <td><input type="checkbox" name="comment[]" value="<?php echo $item['id'] ?>" /></td>  
                  <td><?php echo $item['id'];?></td>
                  <td><?php echo $item['author'];?></td>
                  <td><?php echo $item['created_at'];?></td>
                  <td><?php echo $item['comment']; ?></td>
                  <td><a href="#">Tiêu đề bài viết</a></td> 
                  <td class="text-center">
                  <?php
                    $icon_class = 'disable-icon';
                    if($item['accepted'] == 1){
                        $icon_class = 'enable-icon';
                    }
                  ?>
                  <span class="fa fa-smile-o <?php echo $icon_class;?>"></span>
                    <!--
                    <button  <?php if($item['accepted'] == 0) echo "disabled = 'disabled'"; ?>  data-id="<?php echo $item['id'];?>" class="btn btn-info btn-sm btn_an <?php echo "btn_an".$item['id']; ?> col-md-3">
                                <span class="fa fa-times-circle"></span> Ẩn
                    </button>
                    <button <?php if($item['accepted'] == 1) echo "disabled = 'disabled'"; ?> data-id="<?php echo $item['id'];?>" class="btn btn-info btn-sm btn_hien <?php echo "btn_hien".$item['id']; ?>  col-md-3">
                                <span class="fa fa-times-circle"></span> Hiện
                     </button>
                     <a onclick="return validate_del();" href="<?php echo BASE_ADMIN;?>/comment/del/catid/<?php echo  $item['id'];?>" class="btn btn-sm btn-danger btn_delete col-md-3" data-id="<?php echo $item['id'];?>">
                     <span class="glyphicon glyphicon-trash"></span> Xóa</a>
                     -->
                  </td>
                </tr>
          <?php
            endforeach;
          }else{
            echo "<tr>";
            echo "<td colspan='6' class='text-center'>Dữ liệu rỗng</td>";
            echo "</tr>";
          }
          ?>    <tr>
                    <td>
                        <select name="actionMethod" id="actionMethod" class="form-control">
                            <option value="show">Hiển thị</option>
                            <option value="hide">Không hiển thị</option>
                            <option value="del">Xóa bình luận</option>
                        </select>
                       
                    </td>
                    <td colspan="2">
                         <button  type="submit" name="btnAction" class="btn btn-info btn-sm">
                                <span class="fa fa-times-circle"></span> Thực thi
                        </button>
                    </td>
                </tr>  
                </tbody>
               
              </table>
              
              </form>
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