<?php
if(isset($_POST['page'])){
    
     $mblog = new Model_Blog();
   //Begin update pagination ajax
   
    $start          = !empty($_POST['page'])?$_POST['page']:0;
    $count          = $mblog->totalBlog();
    $totalItems     = $count['count'];
    $totalItemsPage = 5; // Số bài viết trên một trang
    $currentPage    = (isset($_GET['page']))? $_GET['page'] : 1;
   
    //$totalItemsPage = 4; // Số bài viết trên một trang
    //$pageRage       = 3; // Số trang hiển thị trên pagination
  
    //$paginator      = new Pagination($totalItems, $totalItemsPage, $pageRage, $currentPage);
    //$paginationHTML = $paginator->showPagination();
    
   $pagConfig = array(
        'baseURL'=>'index.php?controller=ajax&action=listpagehome', 
        'totalRows'=>$totalItems,
        'currentPage'=>$start,  
        'perPage'=>$totalItemsPage, 
        'contentDiv'=>'post-content-list'
        );
    $pagination =  new PaginationHomeBlog($pagConfig);
    
  
    //$position       = ($currentPage - 1)* $totalItemsPage;
    $datas          = $mblog->listBlog($start, $totalItemsPage);
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
        
        $xml = simplexml_load_file("cached/$name.xhtml");
        $data = $xml->news;

        foreach($data as $item):
 ?>
                <article class="post blog-item blog-item-special col-md-12">
                            <div class="post-content">
                                <figure class="post-media">
                                    <a href="<?php echo BASE_URL.'danh-muc/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>" title="<?php echo $item->title; ?>">
                                    <img src="<?php echo BASE_URL.trim(ltrim($item->image,'/'));?>" class="img-responsive" alt="<?php echo $item->slug;?>" title="<?php echo $item->title; ?>" /> 
                                    </a>
                                </figure>
                                <div class="post-content-info"> 
                                    <h2 class="post-category"><?php echo $item->catename; ?></h2>
                                    <h3 class="post-title"><?php echo $item->title; ?> </h3>
                                    <div class="blog-short-description">
                                       <?php
                                            echo $item->short;
                                       ?>
                                    </div>
                                    <div class="post-permalink text-center">
                                        <ul class="breadcrumb">
                                        <li><?php echo $item->author; ?></li>
                                        <li><?php echo date('d m Y', strtotime($item->poston));?></li>
                                        <li><?php echo $item->comment; ?> Bình luận </li>
                                        </ul>
                                    </div>
                                    <div class="post-morelink">
                                        <a href="<?php echo BASE_URL.'danh-muc/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>" class="btn btn-success">Đọc tiếp</a>
                                    </div>
                                </div>
                                    
                            </div>
                        </article>
 <?php       
        endforeach;
?>
                <div class=" text-center col-md-12 post-pagination">
                      <?php
                        echo $pagination->createLinks();
                      ?>  
                      
                  </div>
                  <script>
                    $(document).ready(function(){
                        //Call back when load ajax
                         $(".pagination li a").click(function(){
                            $('body,html').animate({
                                scrollTop: 0
                            }, 1200);
                        });
                    });
                  </script>
<?php
    } //End if($number > 0)
}else{
    redirect(BASE_URL);
}
?>