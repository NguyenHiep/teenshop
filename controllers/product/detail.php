<?php
    if(isset($_GET['id']) && validate_int($_GET['id'] == true)){
            $pid            = intval($_GET['id']);
            $mcategory      = new Model_Cate();
            $mproduct       = new Model_Home();
            //Luu ket qua san pham
            $dataDetail          = $mproduct->listProductDetail($pid);
            
            //Luu ket qua category    
            $catid = $dataDetail['category_id'];
            $dataCate = $mcategory->getCategoryById($catid);
            //Hiển thị danh sách sản phẩm bán chạy block left
            $productBests   = $mproduct->listproductBestelling();
            
            $totalProductBest = $mproduct->num_rows($productBests);
            
            //Hiển thị danh sách sản phẩm, cùng chuyên mục, không có sản phẩm detail
            $product_category = $mproduct->getProductCategoryInDetail($catid,$pid);
            $totalProductCate = $mproduct->num_rows($product_category);
            
            /*
            //Hiển thị thông tin chi tiết một category
            $dataCate       = $mcategory->getCategoryById($cid);
            */
            //Danh sách category siderbar
            $catedata       = $mcategory->listCategory();
            $totalCate = $mcategory->num_rows($catedata);
            
            $title          = $dataCate['name'].'| '.$dataDetail['title'];
    }
    require "views/product/detail_view.php";