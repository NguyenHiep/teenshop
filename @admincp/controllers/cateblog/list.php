<?php
    $mcateblog = new Model_CateBlog();
    //====================== Thông số phân trang ====================
    $link           = BASE_ADMIN.'/cateblog/list';
    $count          = $mcateblog->totalCateBlog();
    $totalItems     = $count['count'];
    $totalItemsPage = 15; // Số bài viết trên một trang
    $pageRage       = 7; // Số trang hiển thị trên pagination
    $currentPage    = (isset($_GET['page']))? $_GET['page'] : 1;
    $paginator      = new PaginationAdmin($totalItems, $totalItemsPage, $pageRage, $currentPage);
    $paginationHTML = $paginator->showPaginationAdmin($link);
    $position       = ($currentPage - 1)* $totalItemsPage;
    
            
    
    //======================End thông số phân trang ================
    if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
            switch($sort){
                case "id":      $column = "cat_id";
                        break;
                case "title":   $column = "cat_name";
                        break;
            }
    }else{
        $column = "cat_id";
    }
    
    $data           = $mcateblog->listCateBlog($position, $totalItemsPage, $column);        
  
    $title          = "Quản lý chuyên mục";
    require_once "views/cateblog/list_view.php";