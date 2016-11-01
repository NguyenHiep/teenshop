<?php
/*
       
        if(isset($_GET['q'])){
           
            
            $data = $mblog->findBlog($keyword,$position,$totalItemsPage);
        }else{
            $count = $mblog->totalBlog();
            $totalItems     = $count['count'];
            $totalItemsPage = 15; // Số bài viết trên một trang
            $pageRage       = 7; // Số trang hiển thị trên pagination
            $currentPage    = (isset($_GET['page']))? $_GET['page'] : 1;
            $paginator      = new PaginationAdmin($totalItems, $totalItemsPage, $pageRage, $currentPage);
            $paginationHTML = $paginator->showPaginationAdmin($link);
            $position       = ($currentPage - 1)* $totalItemsPage;
            if(isset($_GET['sort'])){
                $sort = $_GET['sort'];
                    switch($sort){
                        case "id":      $column = "blog_id";
                                break;
                        case "title":   $column = "blog_name";
                                break;
                        case "poston":  $column = "post_on";
                                break;
                        case "hightlight": $column = "hightlight";
                                break;
                    }
            }else{
                $column = "blog_id";
            }
            $data = $mblog->listBlog($position, $totalItemsPage,$column);
        }
   
    
*/
 if(author_admin() == true){
    $muser = new Model_User();
    $link = BASE_ADMIN.'/user/list';
    $count = $muser->totalUser();
    $totalItems     = $count['count'];
    $totalItemsPage = 10; // Số bài viết trên một trang
    $pageRage       = 7; // Số trang hiển thị trên pagination
    $currentPage    = (isset($_GET['page']))? $_GET['page'] : 1;
    $paginator      = new PaginationAdmin($totalItems, $totalItemsPage, $pageRage, $currentPage);
    $paginationHTML = $paginator->showPaginationAdmin($link);
    $position       = ($currentPage - 1)* $totalItemsPage;
    if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
            switch($sort){
                case "id":      $column = "user_id";
                        break;
                case "name":   $column = "firstname";
                        break;
                case "level":  $column = "group_id";
                        break;
            }
    }else{
        $column = "user_id";
    }
    $data = $muser->listUser($position,$totalItemsPage, $column);
                                
    $title = "Quản lý thành viên";
    require "views/user/list_view.php";
 }
?>