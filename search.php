<?php

ob_start(); // Start the output buffer
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once "config.php";
require_once "libraries/class.php";
require_once "libraries/functions.php";
require_once "libraries/pagination-cate.php";
if(isset($_GET['q'])){
        $keyword    = htmlentities(fix_str($_GET['q']));
        $mblog      = new Model_Blog();
        $link = "search?q={$_GET['q']}";
        //Update
        $count          = $mblog->totalResultSearch($keyword);
        $totalItems     = $count['count'];
        $totalItemsPage = 4; // Số bài viết trên một trang
        $pageRage       = 3; // Số trang hiển thị trên pagination
        $currentPage    = (isset($_GET['page']))? $_GET['page'] : 1;
        $paginator      = new PaginationHome($totalItems, $totalItemsPage, $pageRage, $currentPage);
        $paginationHTML = $paginator->showPaginationSearch($link);
        $position       = ($currentPage - 1)* $totalItemsPage;
        $resuls     = $mblog->getSearchResult($keyword, $position, $totalItemsPage);
       
        require_once "views/search/result_search_view.php";   

}else{
    redirect(BASE_URL);
}
ob_end_flush(); // Send the output to the browser
?>
