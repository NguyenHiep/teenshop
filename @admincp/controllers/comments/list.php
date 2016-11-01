<?php
$data = new Model_Comments();
    $link           = BASE_ADMIN.'/comment/list';
    $count          = $data->getTotalComment();
    $totalItems     = $count['count'];
    $totalItemsPage = 10; // Số bài viết trên một trang
    $pageRage       = 7; // Số trang hiển thị trên pagination
    $currentPage    = (isset($_GET['page']))? $_GET['page'] : 1;
    $paginator      = new PaginationAdmin($totalItems, $totalItemsPage, $pageRage, $currentPage);
    $paginationHTML = $paginator->showPaginationAdmin($link);
    $position       = ($currentPage - 1)* $totalItemsPage;
    
$res = $data->getAllComments($position,$totalItemsPage);

require_once "views/comments/list_view.php";