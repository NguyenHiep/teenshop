<?php
    $mblog = new Model_Blog();
    if(isset($_GET['start']) && validate_int($_GET['start']) == true && $_GET['start'] >0){
        $start = intval($_GET['start']);
    }else{
        $start = 0;
    }
    if(author_admin() == true){
        $limit = 10;
        $count = $mblog->totalBlog();
        $total_recore = $count['count'];
        $link = BASE_ADMIN.'/blog/list';
        $data = $mblog->listBlog($start,$limit);  
    }else{
        $limit = 10;
        $count = $mblog->totalBlog($_SESSION['ses_userid']);
        $total_recore = $count['count'];
        $link = BASE_ADMIN.'/blog/list';
        $data = $mblog->listBlog($start,$limit, $_SESSION['ses_userid']); 
    }
    //Khong thi hien thi danh sach
    $title = "Danh sách blog";
    require_once "views/blog/list_view.php";