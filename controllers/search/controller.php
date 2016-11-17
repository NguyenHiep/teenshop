<?php
if(isset($_GET['q']) && $_GET['q'] != ""){
        $q = $_GET['q'];
        $keyword    = htmlentities(fix_str($_GET['q']));
        $mblog      = new Model_Blog();
        $link = BASE_URL."search?q={$_GET['q']}";
        //Update
        $count          = $mblog->totalResultSearch($keyword);
        $totalItems     = $count['count'];
        $totalItemsPage = 4; // Số bài viết trên một trang
        $pageRage       = 3; // Số trang hiển thị trên pagination
        $currentPage    = (isset($_GET['page']))? $_GET['page'] : 1;
        $paginator      = new PaginationHome($totalItems, $totalItemsPage, $pageRage, $currentPage);
        $paginationHTML = $paginator->showPaginationSearch($link);
        $position       = ($currentPage - 1)* $totalItemsPage;
        $resuls         = $mblog->getSearchResult($keyword, $position, $totalItemsPage);
     $title = "Kết quả tìm kiếm với từ khóa là ".$q;
     require_once "views/search/result_search_view.php";   
}else{
    redirect(BASE_URL);
}
?>
