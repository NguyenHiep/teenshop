<?php

if(isset($_GET['catid']) && validate_int($_GET['catid']) == true && $_GET['catid'] >0){
    $catid = intval($_GET['catid']);
    $mcate = new Model_CateBlog();
    $catedata = $mcate->getCategoryById($catid);
    
    $mblog = new Model_Blog();
    //on-tap/nhap-mon-lap-trinh-1/trang/3
    $link = "/on-tap/{$catedata['slug']}-{$catid}";
    //Update
    $count          = $mblog->totalCateBlog($catid);
    $totalItems     = $count['count'];
    $totalItemsPage = 4; // Số bài viết trên một trang
    $pageRage       = 1; // Số trang hiển thị trên pagination
    $currentPage    = (isset($_GET['page']))? $_GET['page'] : 1;
    $paginator      = new PaginationHome($totalItems, $totalItemsPage, $pageRage, $currentPage);
    $paginationHTML = $paginator->showPagination($link);
    $position       = ($currentPage - 1)* $totalItemsPage;
    //End update
    
    $datas = $mblog->listBlogCate($catid, "", $position, $totalItemsPage);
    $numrow = $mblog->num_rows($datas);
    if($numrow > 0){
        $dom            = new DOMDocument("1.0", "utf-8");
    $cate           = $dom->createElement("Category");
    $dom->appendChild($cate);
    foreach($datas as $data){
     
        $news       = $dom->createElement("news");
        $cate->appendChild($news);
        $newsid     = $dom->createAttribute("newsid");
        $news->appendChild($newsid);
        $vnewsid    = $dom->createTextNode($data['blog_id']);
        $newsid->appendChild($vnewsid);
        $title      = $dom->createElement("title",$data['blog_name']);
        $news->appendChild($title);
        $full       = $dom->createElement("full");
        $news->appendChild($full);
        $content    = $dom->createCDATASection($data['content']);
        $full->appendChild($content);
        $image      = $dom->createElement("image", $data['image']);
        $news->appendChild($image); 
        $author     = $dom->createElement("author", $data['author']);
        $news->appendChild($author);
        $poston     = $dom->createElement("poston", $data['post_on']);
        $news->appendChild($poston);
        $comment    = $dom->createElement("comment", "10");
        $news->appendChild($comment);
        $tag        = $dom->createElement("tag", "PHP");
        $news->appendChild($tag);
        $slug       = $dom->createElement("slug", $data['slug']);
        $news->appendChild($slug);
        $slugcate   = $dom->createElement("slugcate", $data['slugcate']);
        $news->appendChild($slugcate);
        $catename   = $dom->createElement("catename", $data['cat_name']);
        $news->appendChild($catename);
        $viewpost   = $dom->createElement("viewpost", $data['view_post']);
        $news->appendChild($viewpost);
    }
    $name =  md5(md5("catelistblog"));
    $dom->save("cached/$name.xhtml");
    }
    
    $title          = $catedata['cat_name'];
    $keyword        = $catedata['meta_keyword'];
    $description    = $catedata['meta_description'];
    
 require_once "views/cateblog/cateblog_view.php";
}
    