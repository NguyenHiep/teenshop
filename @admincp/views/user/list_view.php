<?php
    require "../templates/backend/green/left.php";
?>
		 <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Danh sách thành viên</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
                   
					<div class="tab-content default-tab" id="tab1">
                         <div class="filter-name" style="margin-bottom: 10px;">
                            <label>Hiển thị danh sách theo chức vụ</label>
                            <select id="selectlv" style="border-radius: 4px; padding:  5px; border:  1px solid #d5d5d5; color: #333; width: 25%;">
                                <option value="0">List All</option>
                                <option value="1">Quản trị</option>
                                <option value="2">Thành viên</option>
                                <option value="3">Khách hàng</option>
                            </select>
                        </div>
                        
						<table id="level">
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
                                   <th>Chức vụ</th>
								   <th>Họ và tên</th>
                                   <th>Avatar</th>
								   <th>Email</th>
								  <!-- <th>Địa chỉ</th> -->
								   <th>Số điện thoại</th>
								   <th>Cập nhật</th>
                                    <th>Xóa</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="8">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Chọn một tác vụ ...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Thực hiện tác vụ</a>
										</div>
										
										<div class="pagination">
                                        <?php
                                            if($muser->num_rows()>0){
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
                                if($muser->num_rows() > 0):
                                foreach($data as $data):
                                    $uid        = $data['user_id'];
                                   
                                    if($data['group_id'] == 1){
                                        $group = "<span style='color: #f96a01'>Quản trị viên</span>";
                                    }elseif($data['group_id'] == 2){
                                        $group = "<span style='color: #008bba'>Thành viên</span>";
                                    }else{
                                        $group = "<span>Khách hàng</span>";
                                    }
                                    $name       = $data['fullname'];
                                    $email      = $data['email'];
                                   // $address    = $data['adddress'];
                                    $phone      = $data['phone_number'];
                                    
                            ?>
								<tr>
									<td><input type="checkbox" data-value="<?php echo $uid;?>"/></td>
                                    <td><?php echo $group;?></td>
									<td><?php echo $name;?></td>
                                    <td>Chưa xác định</td>
									<td><a href="#" title="title"><?php echo $email;?></a></td>
								<!--	<td><?php //echo $address;?></td> -->
									<td><?php echo $phone;?></td>
									<td class="center-block">	 <a class="block" href="<?php echo BASE_ADMIN;?>/user/edit/uid/<?php echo $uid; ?>" title="Edit"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/pencil.png" alt="Edit" /></a></td>
                                    <td class="center-block">
										<!-- Icons -->
										 <a href="<?php echo BASE_ADMIN;?>/user/del/uid/<?php echo $uid;?>" title="Delete"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/cross.png" alt="Delete" onclick="return validate_del();"/></a> 
										 <a href="#" title="Edit Meta"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
                                <?php endforeach; ?>
							<?php else: ?>
                                <tr>
                                    <td colspan="8">Dữ liệu rỗng</td>
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