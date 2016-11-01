<?php
           
    $mslider = new Model_Slider();
    $dataSlider = $mslider->getSliderBlog();
    $totalSlider = $mslider->num_rows($dataSlider);
    
    $mblog = new Model_Blog();
   
    $count          = $mblog->totalBlog();
    $totalItems     = $count['count'];
    $totalItemsPage = 9; // Số bài viết trên một trang
    $pageRage       = 3; // Số trang hiển thị trên pagination
    $currentPage    = (isset($_GET['page']))? $_GET['page'] : 1;
    $paginator      = new Pagination($totalItems, $totalItemsPage, $pageRage, $currentPage);
    $paginationHTML = $paginator->showPagination();
    $position       = ($currentPage - 1)* $totalItemsPage;
    $datas          = $mblog->listBlog($position, $totalItemsPage);
    //Begin update 02.05.2016
    $number = $mblog->num_rows($datas);
    
    if($number > 0){
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
        //Update
        $short      = $dom->createElement("short");
        $news->appendChild($short);
        $short_content      = $dom->createCDATASection($data['short_content']);
        $short->appendChild($short_content);
    }
        $name =  md5(md5("listblog"));
        $dom->save("cached/$name.xhtml");       
    }
    $title="Giadinhit.com, ôn thi liên thông đại học, chia sẻ kiến thức lập trình";
    $keyword = "Ôn thi liên thông, lập trình PHP, Lập trình magento";
    $description = "Giadinhit.com kênh chia sẻ kiến thức ôn thi liên thông đại học, kiến thức lập trình";
    require_once "views/defaultblog/defaultblog_view.php";
?>