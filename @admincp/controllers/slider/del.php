<?php

if(isset($_GET['sid']) && validate_int($_GET['sid']) == true && $_GET['sid'] >0){
    $sid = $_GET['sid'];
    //
    $mslider = new Model_Slider();
    $data    = $mslider->getSliderById($sid);
    if($data['image'] != ""){
        //Xem lại hàm này
        if(file_exists($data['image'])){
            unlink('../uploads/'.$data['image']);
        }
    }
    $mslider->deleteSlider($sid);
    redirect(BASE_ADMIN.'/slider/list');
    
}else{
     redirect(BASE_ADMIN.'/slider/list');
}