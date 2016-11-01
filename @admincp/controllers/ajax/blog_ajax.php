<?php
    if(isset($_REQUEST['type']) && $_REQUEST['type'] != ""){
        $mblog = new Model_Blog();
        
        $type = $_REQUEST['type'];
        // Ajax nổi bật
        if($type == "hightlight"){
            $id         = $_REQUEST['id'];
            $isCheck    = $_REQUEST['value'];
            $val = 0;
            if($isCheck == "true"){
                $val = 1;    
            }
            //echo $val;
            $mblog->setBlogId($id);
            $mblog->setHightLight($val);     
            $mblog->ajaxBlog($type);
        }elseif($type = "status"){
            $id        = $_REQUEST['id'];
            $status    = $_REQUEST['status'];
            $mblog->setBlogId($id);
            $mblog->setStatus($status);     
            $mblog->ajaxBlog($type);  
        }
        
    }else{
        return 0;
    }
?>