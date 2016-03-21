<?php
    $mhome = new Model_Home();
    //Hiển thị sản phẩm mới nhất
    $datas = $mhome->listproductNew();
    
    //Hiển thị menu trái
    $mcategory = new Model_Cate();
    $catedata = $mcategory->listCategory();
    
    //Hiển thị sản phẩm bán chạy
    $productbestsellings = $mhome->listproductBestelling();
    
    //Hiển thị danh sách các slider
    $listSlider = $mhome->getSliderHomepage();
    $totalSlider = $mhome->num_rows($listSlider);
    
    
    $title = "Trang chủ | Sản phẩm giá rẻ, chất lượng";
    require_once "views/home/home_view.php";
?>