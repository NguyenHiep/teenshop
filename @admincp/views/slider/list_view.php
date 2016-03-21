<?php
    require "../templates/backend/green/left.php";
?>  
    <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					<h3>Quản lý slider || <a href="<?php echo BASE_ADMIN;?>/slider/add">Thêm slider </a></h3>
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
			   
					<div> 
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
                                    <th>STT</th>
								   <th>Hình ảnh</th>
								   <th>Tiêu đề</th>
								   <th>Trạng thái</th>
								   <th>Sửa</th>
								    <th>Xóa</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="7">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
                            <?php
                                if($mslider->num_rows($listSlider) > 0):
                                    $stt = 0;
                                    foreach($listSlider as $data):
                                    $stt++;
                                    $status = "";
                                    if($data['status'] == 1){
                                        $status = "active.png";
                                    }else{
                                        $status = "noactive.png";
                                    }
                            ?>
								<tr>
									<td><input type="checkbox" /></td>
									<td><?php echo $stt;?></td>
									<td><img src="<?php echo URL_UPLOAD.trim($data['image']);?>" width="100" height="100"/></td>
									<td><?php echo $data['title'];?></td>
									<td><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/<?php echo $status;?>" alt="status" /></td>
									<td>
										 <a href="<?php echo BASE_ADMIN.'/index.php?controller=slider&action=edit&sid='.$data['slider_id'];?>" title="Edit"><img src="<?php echo TEMPLATE_AMIN;?>resources/images/icons/pencil.png" alt="Edit" /></a>
									</td>
                                    <td>
                                        <a href="<?php echo BASE_ADMIN.'/index.php?controller=slider&action=del&sid='.$data['slider_id']?>" title="Delete"><img src="<?php echo TEMPLATE_AMIN; ?>resources/images/icons/trash.png" alt="Delete" onclick="return validate_del();"/></a> 
							
                                    </td>
								</tr>
						<?php
                                endforeach;
                            endif;
                        ?>		
							
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
<?php
    require "../templates/backend/green/bottom.php"
?>

