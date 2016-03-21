<?php
      if(isset($_GET['cid']) && validate_int($_GET['cid']) == true){
            $cid            = intval($_GET['cid']);
            $mcategory      = new Model_Cate();
            $mproduct       = new Model_Home();
            
            $datas          = $mproduct->getProductByCate($cid);
            $totalProduct   = $mproduct->num_rows($datas);
            
            $productBests   = $mproduct->listproductBestelling();
            $totalProductBest = $mproduct->num_rows($productBests);
            //Hiển thị thông tin chi tiết một category
            $dataCate       = $mcategory->getCategoryById($cid);
            //Danh sách category siderbar
            $catedata       = $mcategory->listCategory();
            
            $title          = 'Chuyên mục | '.$dataCate['name'];
            require "views/product/cate_view.php";
            
      }
?>