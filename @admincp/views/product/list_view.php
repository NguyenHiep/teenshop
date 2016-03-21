<?php
    require "../templates/backend/green/left.php";
?>
		 <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Danh sách sản phẩm</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
			   
					<div class="tab-content default-tab" id="tab1">
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
                                   <th>Ảnh sản phẩm</th>
								   <th>Tên sản phẩm</th>
                                   <th>Mã sku</th>
                                   <th>Trạng thái</th>
                                   <th>Giá</th>
                                   <th>Số lượng</th>
								   <th>Xem chi tiết</th>
                                   <th>Sửa</th>
								   <th>Xóa</th>
								</tr>
								
							</thead>
							<tfoot>
								<tr>
									<td colspan="10">
										<div class="pagination">
                                        <?php
                                            if($mproduct->num_rows()>0){
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
                                if($mproduct->num_rows() > 0):
                                
                                foreach($data as $data):
                                    $prid           = $data['product_id'];
                                    $category       = $data['name'];
                                    $linkimage      = $data['images'];
                                    $productname    = $data['title'];
                                    
                                    if($data['publish'] == 1){
                                        $status = "active.png";
                                    }else{
                                        $status = "noactive.png";
                                    }
                                    $urlimage       = "";
                                    if($data['images'] != "none"){
                                         $urlimage =    URL_UPLOAD.$linkimage;
                                         $image = "<img src='".URL_UPLOAD."{$linkimage}' width='50' height='51' alt='{$productname}'/>";
                                    }else{
                                        $image = "";
                                    }
                                    $price          = number_format($data['price'],0,0,'.').'<span class="vnd">đ</span>';
                                    $qty            = $data['qty'];                           
                            ?>
								<tr>
									<td><input type="checkbox" data-value="<?php echo $prid;?>"/></td>
                                   
									<td>
                                        <?php
                                            if(!empty($urlimage)){
                                        ?>
                                        <a href="<?php echo $urlimage;?>" class="fancybox" data-id="<?php echo $prid;?>"><?php echo $image;?></td></a>
                                        <?php
                                            }
                                        ?>
                                    
                                    <td><?php echo $productname;?></td>
                                    <td>Mã sku chưa có</td>
                                    <td class="center-block"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/<?php echo $status;?>" alt="status" /></td>
                                          
								    <td class="center-block"><?php echo $price; ?></td>
                                    <td class="center-block"><?php echo $qty; ?></td>
                                  
                                    <td><a class="detail-product" href="#prohiep" rel="modal" data-value=""> Xem chi tiết</a></td>
									 <td class="center-block">
										 <a href="<?php echo BASE_ADMIN;?>/product/edit/prid/<?php echo $prid; ?>" title="Edit"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/pencil.png" alt="Edit" /></a>
                                    </td>
                                    <td class="center-block">
										<a href="<?php echo BASE_ADMIN;?>/product/del/prid/<?php echo $prid;?>" title="Delete"><img src="<?php echo BASE_URL;?>/templates/backend/green/resources/images/icons/trash.png" alt="Delete" onclick="return validate_del();"/></a> 
									</td>
                                   
								</tr>
                                <?php endforeach; ?>
							<?php else: ?>
                                <tr>
                                    <td colspan="10">Dữ liệu rỗng</td>
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