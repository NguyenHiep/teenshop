<?php
$data = array();
/*$data['status'] = '200';
$data['message'] = "Success";
$data['price'] = 100;
if(isset($_GET['name'])){
    $data['name'] = $_GET['name'];
}
if(isset($_GET['sort'])){
    $data['sort'] = $_GET['sort'];
}

 $count          = $mblog->totalBlog();
    $totalItems     = $count['count'];
    $totalItemsPage = 4; // Số bài viết trên một trang
    $pageRage       = 3; // Số trang hiển thị trên pagination
    $currentPage    = (isset($_GET['page']))? $_GET['page'] : 1
*/

if(!isset($_GET['id'])){
    $mblog          = new Model_Blog();
    $count          = $mblog->totalBlog();
    $offset = 0; $limit = 15;
    $data['metadata']['resultset']['count']     = $count['count'];
    $data['metadata']['resultset']['offset']    = $offset;
    $data['metadata']['resultset']['limit']     = $limit;
    $datas = $mblog->listBlogAPI($offset,$limit);
    foreach($datas as $item){
        $data['results'][] =  $item;
        
    }
}else{

    $pid = intval($_GET['id']);
    $mblog          = new Model_Blog();
    $data = $mblog->getBlogDetailAPI($pid);
}

echo json_encode($data);
/*
if(isset($_GET['process'])){
        switch($_GET['process']){
            case "add":
                require_once "controllers/api/v1/blog/add.php";
                break;
           case "edit":
                require_once "controllers/api/v1/blog/edit.php";
                break;
          case "list":
                require_once "controllers/api/v1/blog/list.php";
                break;
          case "delete":
                require_once "controllers/api/v1/blog/delete.php";
                break;         
        }
}
*/