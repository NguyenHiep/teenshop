<?php
    require "../templates/backend/green/left.php";
?>
		 <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Danh sách blog</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
			   
					<div class="tab-content default-tab" id="tab1">
						<table>
							
							<thead>
                                <tr>
                                    <td> Tìm kiếm</td>
                                    <td colspan="6">
                                        <form action="" method="GET" >
                                            <input class="text-input medium-input" type="text" name="txtSearch" id="txtSearch" placeholder="Nhập tên blog muốn tìm"/>
                                            <input  class="button" type="submit" name="btnSearch" value="Tìm kiếm"/>
                                        </form>
                                    </td>
                                </tr>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
                                   <th>ID</th>
                                   <th>Tên blog</th>
                                   <th>Hình ảnh</th>
                                   <th>Trạng thái</th>
                                   <th>Sửa</th>
                                   <th>Xóa</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="9">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">
                                        <?php
                                            if($total_recore >0){
                                                page_navigation($start,$limit,$total_recore,$link);
                                            }
                                        ?>
                                       
                                        </div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
                            <?php
                                if($total_recore  > 0):
                                foreach($data as $data):
                                    $blogid          = $data['blog_id'];
                                    $blogname        = $data['blog_name'];
                                    
                                    if($data['status'] == 1){
                                        $status     = "active.png";
                                    }else{
                                         $status    = "noactive.png";
                                    }
                                    if(trim($data['image']) == "none"){
                                         $image          = "";       
                                    }else{
                                         $image          = trim($data['image']);       
                                    }
                                                       
                            ?>
								<tr>
									<td><input type="checkbox" data-value="<?php echo $blogid;?>"/></td>
                                    <td><?php echo $blogid;?></td>
                                    <td><?php echo $blogname;?></td>
                                    <td><img src="<?php echo BASE_URL;?>uploads/blog/<?php echo $image;?>" alt="<?php echo $blogname;?>" width="100" height="100"/></td>
								     <td class="center-block"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/<?php echo $status;?>" alt="status" /></td>
									<td>
										 <a href="<?php echo BASE_ADMIN;?>/blog/edit/catid/<?php echo $blogid; ?>" title="Edit"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/pencil.png" alt="Edit" /></a>
									</td>
                                    <td>
                                         <a href="<?php echo BASE_ADMIN;?>/blog/del/catid/<?php echo $blogid;?>" title="Delete"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/trash.png" alt="Delete" onclick="return validate_del();"/></a> 
							
                                    </td>
								</tr>
                                <?php endforeach; ?>
							<?php else: ?>
                                <tr>
                                    <td colspan="9">Dữ liệu rỗng</td>
                                </tr>
                            <?php endif; ?>
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->    
<?php
    require "../templates/backend/green/bottom.php"
?>