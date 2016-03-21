
<?php
    $title = "Danh sách slider";
    $mslider = new Model_Slider();
    $listSlider = $mslider->listSlider();
    
    require_once "views/slider/list_view.php";
?>