<?php
    $id = $_POST['id'];
    $muser = new Model_User();
   
    if(isset($_GET['start']) && validate_int($_GET['start']) == true && $_GET['start'] > 0){
         $start = intval($_GET['start']);
     }else {
         $start = 0;
    }
    $limit = 8;
    $count = $muser->totalUser();
    $total_recore = $count['count'];
    $link = BASE_ADMIN.'/user/list';
     $datas = $muser->getUserByGroup($id);
    
?>
	<thead>
		<tr>
		   <th><input class="check-all" type="checkbox" /></th>
           <th>Chức vụ</th>
		   <th>Họ và tên</th>
		   <th>Email</th>
		  <!-- <th>Địa chỉ</th> -->
		   <th>Số điện thoại</th>
		   <th>Tác vụ</th>
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
    $stt = 0;
    foreach($datas as $data):
        $stt++;
        if($stt %2 != 0){
            $classTable = 'class="alt-row"';
        }else{
            $classTable = '';
        }
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
	<tr <?php echo $classTable;?>>
		<td><input type="checkbox" data-value="<?php echo $uid;?>"/></td>
        <td><?php echo $group;?></td>
		<td><?php echo $name;?></td>
		<td><a href="#" title="title"><?php echo $email;?></a></td>
	<!--	<td><?php //echo $address;?></td> -->
		<td><?php echo $phone;?></td>
		<td>
			<!-- Icons -->
			 <a href="<?php echo BASE_ADMIN;?>/user/edit/uid/<?php echo $uid; ?>" title="Edit"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/pencil.png" alt="Edit" /></a>
			 <a href="<?php echo BASE_ADMIN;?>/user/del/uid/<?php echo $uid;?>" title="Delete"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/cross.png" alt="Delete" onclick="return validate_del();"/></a> 
			 <a href="#" title="Edit Meta"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
		</td>
	</tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="7">Dữ liệu rỗng</td>
    </tr>
<?php endif; ?>