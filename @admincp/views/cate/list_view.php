<?php
    require "../templates/backend/green/left.php";
?>
		 <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Danh sách chuyên mục</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
			   
					<div class="tab-content default-tab" id="tab1">
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
                                   <th>ID</th>
                                   <th>Level category</th>
                                   <th>Tên chuyên mục</th>
                                   <th>Hình ảnh</th>
								   <th>SL Sản phẩm</th>
                                   <th>Trạng thái</th>
                                   <th>Sửa</th>
                                   <th>Xóa</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
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
                                            if($mcate->num_rows()>0){
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
                                if($mcate->num_rows() > 0):
                                foreach($data as $data):
                                    $catid          = $data['category_id'];
                                    $catname        = $data['name'];
                                    
                                    if($data['status'] == 1){
                                        $status     = "active.png";
                                    }else{
                                         $status    = "noactive.png";
                                    }
                                    $parent         = $data['parent_id'];
                                    $image          = trim($data['bgimage']);                           
                            ?>
								<tr>
									<td><input type="checkbox" data-value="<?php echo $catid;?>"/></td>
                                    <td><?php echo $catid;?></td>
                                    <td><?php echo $parent;?></td>
                                    <td><?php echo $catname;?></td>
                                    <td><img src="<?php echo BASE_URL;?>uploads/category/<?php echo $image;?>" alt="<?php echo $catname;?>" width="100" height="100"/></td>
									<td>Update sau</td>
								     <td class="center-block"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/<?php echo $status;?>" alt="status" /></td>
									<td>
										 <a href="<?php echo BASE_ADMIN;?>/cate/edit/catid/<?php echo $catid; ?>" title="Edit"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/pencil.png" alt="Edit" /></a>
									</td>
                                    <td>
                                         <a href="<?php echo BASE_ADMIN;?>/cate/del/catid/<?php echo $catid;?>" title="Delete"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/trash.png" alt="Delete" onclick="return validate_del();"/></a> 
							
                                    </td>
								</tr>
                                <?php endforeach; ?>
							<?php else: ?>
                                <tr>
                                    <td colspan="5">Dữ liệu rỗng</td>
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