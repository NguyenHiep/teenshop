<?php
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
       
       // unlink($filedel);
    }
   
   // print_r($files2);
    /*
    $name = md5(md5("listblog"));
    //$path = "../cached/$name.xhtml";
    $path = "../cached/nguyenhiep.xhtml";
    if(file_exists($path)){
        //unlink($path);
        //echo $path;
        unlink($path);
        echo $message = "Xóa cached thành công";
    }
    */
    if(isset($_POST['submit'])){
        
    }
    $title = "Xóa cached website";
    require_once "views/blog/delete_cached_view.php";
?>
