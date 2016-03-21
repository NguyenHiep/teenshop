<?php
if(isset($_GET['prid']) && validate_int($_GET['prid']) == true && $_GET['prid'] >0){
    $prid = intval($_GET['prid']);
    $mproduct = new Model_Product();
    //Begin update
        if(isset($_POST['btnOK'])){
            $error = array();

            if(isset($_POST['cbbCateId'])){
                if($_POST['cbbCateId'] == 0){
                    $error[]    		= "Vui lòng chọn danh mục";
                }else{
                    $cate_id   			= intval($_POST['cbbCateId']);
                }
            }
    		if(!empty($_POST['txtTitle'])){
                $title  				= fix_str($_POST['txtTitle']);
            }else{
                $error[]     			= "Vui lòng nhập tên sản phẩm";
            }
    		
            if(!empty($_POST['txtProductSlug'])){
                $slug   				= unicode_str_filter($_POST['txtProductSlug']);
            }else{
                $slug     				= "none";
            }
    
            if(!empty($_POST['txtDesscription'])){
                $description   			= fix_content($_POST['txtDesscription']);
            }else{
                $error[]    			= "Vui lòng nhập mô tả cho sản phẩm";
            }
    		
            if(isset($_POST['txtPrice'])){
                if(validate_int($_POST['txtPrice']) && $_POST['txtPrice'] > 0){
    				$price 				= $_POST['txtPrice'];
    			}else{
    				$price 				= 0;
    			}
            }else{
                $error[]    			= "Vui lòng nhập giá sản phẩm";
            }
    		if(isset($_POST['txtSalePrice'])){
                if(validate_int($_POST['txtSalePrice']) && $_POST['txtSalePrice'] > 0){
    				$saleprice 			= $_POST['txtSalePrice'];
    			}else{
    				$saleprice 			= 0;
    			}
            }else{
                $saleprice 				= 0;
            }
    		
             if(!empty($_POST['txtColor'])){
                $color  				= fix_str($_POST['txtColor']);
            }else{
                $color 					= "";
            }
    		if(!empty($_POST['txtSize'])){
                $size  					= fix_str($_POST['txtSize']);
            }else{
                $size 					= "";
            }
    		if(isset($_POST['txtQtyProduct'])){
                if(validate_int($_POST['txtQtyProduct']) && $_POST['txtQtyProduct'] > 0){
    				$qty 				= $_POST['txtQtyProduct'];
    			}else{
    				$qty 				= 0;
    			}
            }else{
                $qty 					= 0;
            }
    		if(!empty($_POST['txtMetaTile'])){
                $metatitle   			= fix_content($_POST['txtMetaTile']);
            }else{
                $metatitle 				= "";
            }
    		if(!empty($_POST['txtMetaKeyWord'])){
                $metakeyword  			= fix_content($_POST['txtMetaKeyWord']);
            }else{
                $metakeyword 			= "";
            }
    		if(!empty($_POST['txtMetaDiscription'])){
                $metadiscription  		= fix_content($_POST['txtMetaDiscription']);
            }else{
                $metadiscription 		= "";
            }
    		if(isset($_POST['radPublic']) && validate_int($_POST['radPublic'])){
    			$public 				= $_POST['radPublic'];
    		}else{
    			$public 				= 0;
    		}
            
            //Begin edit product
            if(empty($error)){
                //Upload image product
               if($_FILES['txtImageProduct']['name'] !=NULL){
                     $uimage = new Upload($_FILES['txtImageProduct']);
                     $uimage->setPath('../uploads/');
                    if($uimage->do_upload() == true){
                        $imageproduct = $uimage->getPath().$uimage->getName();
                    }else{
                        $error[] = $uimage->error;
                    }
               }else{
                    $imageproduct = "none";
               }
               $mproduct = new Model_Product();
               $mproduct->setCatId($cate_id);
               $mproduct->setTitle($title);
               if($slug != "none"){
                    $mproduct->setSlug($slug);
               }else{
                    $mproduct->setSlug(unicode_str_filter($title));
               }

               $mproduct->setImage($imageproduct);
               $mproduct->setInfo($description);
               $mproduct->setPrice($price);
               $mproduct->setSalePrice($saleprice);
               $mproduct->setColor($color);
               $mproduct->setSize($size);
               $mproduct->setQty($qty);
               $mproduct->setMetaTile($metatitle);
               $mproduct->setMetaKeyWord($metakeyword);
               $mproduct->setMetaDescription($metadiscription);
               $mproduct->setPublic($public);
               $mproduct->setModified(date('Y-m-d H:i:s'));
               if($mproduct->checkProduct($prid) == true){
                  $mproduct->updateProduct($prid);
                  redirect(BASE_ADMIN.'/product/list');
               }else{
                    $error[] = "Tên sản phẩm đã tồn tại, vui lòng chọn tên khác.";
                }
                
            }
        }//End if(isset($_POST['btnOK']))
    
    $data = $mproduct->getProductById($prid);
    $mcate = new Model_Cate();
    $listCate = $mcate->listCate();
    $title = "Cập nhật sản phẩm";
    require "views/product/edit_view.php";

}else{
    redirect(BASE_ADMIN.'/product/list');
}

