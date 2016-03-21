<?php
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
    $data = $muser->listUser($start,$limit);
                                
    $title = "Danh sách thành viên";
    require "views/user/list_view.php";
?>