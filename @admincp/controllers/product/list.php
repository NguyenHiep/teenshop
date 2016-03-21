<?php
    $mproduct = new Model_Product();
    if(isset($_GET['start']) && validate_int($_GET['start']) == true && $_GET['start'] > 0){
         $start = intval($_GET['start']);
     }else {
         $start = 0;
    }
    $limit = 5;
    $count = $mproduct->totalProduct();
    $total_recore = $count['count'];
    $link = BASE_ADMIN.'/product/list';
    $data = $mproduct->listProduct($start,$limit);
                                
    $title = "Danh sách sản phẩm";
    require "views/product/list_view.php";
?>