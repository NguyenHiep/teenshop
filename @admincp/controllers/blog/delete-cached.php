<?php
    //Get list file cached
    $dir = '../cached'; //Folder chua code
    $files1 = scandir($dir); // Hien thi list file bao gom thu muc goc
    $filedelBlogDetail = array();
    $filedelPage = array();
    foreach($files1 as $file){
        $ext = pathinfo($file); //Lay thong tin fodler
        if($ext['extension'] != 'xhtml'){
            continue;
       }
       $strArr = explode('_',$file);
       if($strArr[0] == "BlogDetail"){
            $filedelBlogDetail[] =  $dir.'/'.$file;
       }else{
            $filedelPage[] = $dir.'/'.$file;
       }

    }
   
    //Begin delete file cached
    $message = '';
    if(isset($_POST['submit'])){
        if(isset($_POST['filedel_blogdetail'])){
             $link_blogdetail = $_POST['filedel_blogdetail'];
             foreach($link_blogdetail as $item){
                $message .= '<p>Cached file '.$item.' đã xóa thành công! </p>';
                unlink($item);
            }
        }
       
         if(isset($_POST['filedel_page'])){
            $link_page = $_POST['filedel_page'];
            foreach($link_page as $itempage){
                 $message .= '<p>Cached file '.$itempage.' đã xóa thành công! </p>';
                unlink($itempage);
            }
        }
         header('Location: '.$_SERVER['REQUEST_URI']);
    }
    $title = "Xóa cached website";
    require_once "views/blog/delete_cached_view.php";
?>
