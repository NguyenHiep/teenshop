<?php
    require "libraries/upload.php";
    $error = array();
    if(isset($_POST['btnUpload'])){
        $upload = new Upload($_FILES['product_img']);
        if($upload->do_upload() == true){
            $image = $upload->getPath().$upload->getName();
        }else{
            $error[] = $upload->error;
        }     
    }
    // Lấy danh sách tất cả các ảnh có trong thư mục
    $handle = opendir(dirname(realpath(__FILE__)).'/uploads/');
        echo "<ul>";
        while($file = readdir($handle)){
            if($file !== '.' && $file !== '..'){
                echo '<li><img src="uploads/'.$file.'" border="0" data-action="zoom" width="200" height="200"/></li>';
            }
        }
        echo "</ul>";
   
?>
<?php
    if(!empty($error)){
         echo "<ul>";
        foreach($error as $loi):
            echo "<li>{$loi}</li>";
        endforeach;
        echo "</ul>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="zoom.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="zoom.js"></script>
    </head>
    <style>
        ul{
          list-style: none;     
        }
        ul > li {
            display: inline-block;
            padding-right: 10px;
           
            box-sizing: content-box;
            -moz-box-sizing: content-box;
            -webkit-box-sizing: content-box;
            }
        ul > li:hover{
            padding: 10px;
            background: #CCC;
        }
    </style>
    <body>
         <form action="upload.php" method="post" enctype="multipart/form-data">
            <label>Select image for upload</label>
               <p>
                     <input  size="30" type="file" name="product_img"/><br />
               </p>
                <input type="submit"name="btnUpload" value="Upload"/>
        </form>   
    </body>
</html>
