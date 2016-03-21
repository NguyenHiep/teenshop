<?php
$mcate = new Model_Cate();
    if(isset($_GET['start']) && validate_int($_GET['start']) == true && $_GET['start'] > 0){
         $start = intval($_GET['start']);
     }else {
         $start = 0;
    }
    $limit = 4;
    $count = $mcate->totalCate();
    $total_recore = $count['count'];
    $link = BASE_ADMIN.'/cate/list';
    $data = $mcate->listCate($start,$limit);
    
$title = "Danh sách chuyên mục";
require "views/cate/list_view.php";