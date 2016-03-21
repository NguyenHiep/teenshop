<?php
    $mcateblog = new Model_CateBlog();
    
    if(isset($_GET['start']) && validate_int($_GET['start']) == true && $_GET['start'] > 0){
         $start = intval($_GET['start']);
     }else {
         $start = 0;
    }
    $limit          = 4;
    $count          = $mcateblog->totalCateBlog();
    $total_recore   = $count['count'];
    $link           = BASE_ADMIN.'/cateblog/list';
    $data           = $mcateblog->listCateBlog($start,$limit);
    
    $title          = "Danh sách cateblog";
    require_once "views/cateblog/list_view.php";