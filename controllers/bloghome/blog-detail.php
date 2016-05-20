<?php
if(isset($_GET['pid']) && validate_int($_GET['pid']) == true && $_GET['pid'] > 0){
     $pid   = intval($_GET['pid']);
     $mblog = new Model_Blog();
     $data  = $mblog->getBlogDetail($pid);
     //Lấy ra danh sách các blog khác cùng category
     
     $relapost = $mblog->getBlogRelatedPost($data['cat_id'], $data['blog_id']);
     $count_relapost = $mblog->num_rows($relapost);
        $dom            = new DOMDocument("1.0", "utf-8");
        $cate           = $dom->createElement("Blogdetail");
        $dom->appendChild($cate);
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
        $avartar      = $dom->createElement("avartar", $data['avatart']);
        $news->appendChild($avartar); 
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
        $cateid     = $dom->createElement("cateid", $data['cat_id']);
        $news->appendChild($cateid);
        $viewpost   = $dom->createElement("viewpost", $data['view_post']);
        $news->appendChild($viewpost);
        //Begin update 01.05.2016
        $nickname   = $dom->createElement("nickname", $data['nickname']);
        $news->appendChild($nickname);
        $instruction   = $dom->createElement("instruction", $data['short_instruction']);
        $news->appendChild($instruction);
        $facebook   = $dom->createElement("facebook", $data['share_facebook']);
        $news->appendChild($facebook);
        $google     = $dom->createElement("google", $data['share_google']);
        $news->appendChild($google);
        $twitter    = $dom->createElement("twitter", $data['share_twitter']);
        $news->appendChild($twitter);
        
        //End updatae 01.05.2016
        
    $name =  md5(md5("Blogdetail"));
    $dom->save("cached/$name.xhtml");
    $title              = $data['blog_name'];
    $keyword            = $data['meta_keyword'];
    $description        = $data['meta_description'];
    require_once "views/bloghome/blogdetail_view.php";
 
}
