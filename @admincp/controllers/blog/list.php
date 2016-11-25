<?php
    $mblog = new Model_Blog();
    /*if(isset($_GET['start']) && validate_int($_GET['start']) == true && $_GET['start'] >0){
        $start = intval($_GET['start']);
    }else{
        $start = 0;
    }
    */
    if(author_admin() == true){
        $link = BASE_ADMIN.'/blog/list';
        //Update
       
        if(isset($_GET['q'])){
            $keyword = fix_str($_GET['q']);
            $count = $mblog->totalFind($keyword);
            $totalItems     = $count['count'];
            
            $totalItemsPage = 15; // Số bài viết trên một trang
            $pageRage       = 7; // Số trang hiển thị trên pagination
            $currentPage    = (isset($_GET['page']))? $_GET['page'] : 1;
            $paginator      = new PaginationAdmin($totalItems, $totalItemsPage, $pageRage, $currentPage);
            $paginationHTML = $paginator->showPaginationAdmin($link);
            $position       = ($currentPage - 1)* $totalItemsPage;
            
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
                        case "cate": $column = "cat_id";
                            break;
                        default: $column = "blog_id";
                                break;
                    }
            }else{
                $column = "blog_id";
            }
            $data = $mblog->listBlog($position, $totalItemsPage,$column);
        }
   
    }else{
        //Hiển thị dành cho phân quyền thành viên
         $link = BASE_ADMIN.'/blog/list';
         $column = "blog_id";
         $count = $mblog->totalBlog($_SESSION['ses_userid']);
        $totalItems     = $count['count'];
        $totalItemsPage = 15; // Số bài viết trên một trang
        $pageRage       = 7; // Số trang hiển thị trên pagination
        $currentPage    = (isset($_GET['page']))? $_GET['page'] : 1;
        $paginator      = new PaginationAdmin($totalItems, $totalItemsPage, $pageRage, $currentPage);
        $paginationHTML = $paginator->showPaginationAdmin($link);
        $position       = ($currentPage - 1)* $totalItemsPage;
        $data = $mblog->listBlog($position, $totalItemsPage,$column,$_SESSION['ses_userid'] );
    }
    //Khong thi hien thi danh sach
    $title = "Quản lý blog";
    require_once "views/blog/list_view.php";