
<?php
    $title = "Quản lý slider";
    $mslider = new Model_Slider();
    $data = $mslider->listSlider();
    $count = $mslider->totalSlider();
    $totalItems = $count['count'];
    require_once "views/slider/list_view.php";
?>