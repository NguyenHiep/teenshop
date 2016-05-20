<?php
//Auto loading
function __autoload($url){
    
    $name = str_replace("_",'/',$url);
    $name = str_replace("Model","Models",$name);
    $real_url = strtolower($name);
    
    require "$real_url.php";
}

function redirect($url){
    header("location: $url");
    exit();
}

//Hàm chống sql join
function fix_str($str) {
    return addslashes(strip_tags(trim($str)));
}
//Hàm dùng cho nội dung bài viết

function fix_content($str){
    return addslashes(stripcslashes(trim($str)));
}
//In ra nội dung là html
function fix_htmlentities($str){
    return htmlentities($str, ENT_COMPAT, 'UTF-8');
}
//Cắt chuỗi cho đẹp
function the_excerpt($text, $number = 400){
    $sanitized = htmlentities($text, ENT_COMPAT, 'UTF-8');
    if(strlen($sanitized) > $number){
            $cutString  = substr($sanitized, 0, $number);
            $words      = substr($sanitized, 0, strrpos($cutString, ' '));
         return $words;
    }else{
         return $text;
    }
   
   
}
//Kiểm tra thông tin dạng số
function validate_int($value){
    if(isset($value) && filter_var($value, FILTER_VALIDATE_INT, array('min_range' =>1))){
        return true;
    }
    return false;
}
//Kiểm tra định dạng email
function validate_email($value){
    if(isset($value) && filter_var($value, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}
//Kiểm tra định dạng url
function validate_url($value){
    if(isset($value) && filter_var($value, FILTER_VALIDATE_URL)){
        return true;
    }
    return false;
}
//Dequy menu for admin
function recursiveMenu($data, $parent = 0, $text="", $select = 0){
    foreach($data as $key => $value){
        if($value['parentid'] == $parent){
            $id = $value['cat_id'];
            if($select != 0 && $id == $select){ //Truong hop nay de de edit :)
                echo "<option value='{$value["cat_id"]}' selected='selected'>".$text.$value['cat_name']."</option>";
            }else{
                echo "<option value='{$value["cat_id"]}'>".$text.$value['cat_name']."</option>";
            }
            unset($data[$key]);
            recursiveMenu($data, $id, $text."---| ", $select);
        }
        
    }
}
function MenuTop($data){
    $mcateblog = new Model_CateBlog();
    $html = '';
    foreach($data as $level1){
     
        if($level1['parentid'] == 0){
        //Neu so phan tu con cap 1 lon hon 0 thi thuc hien
         $count = $mcateblog->countLevelSub($level1['cat_id']);
            if($count['number'] > 0){
                $html .= '<li class="dropdown">';
                
                $html .= '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/on-tap/'.trim($level1['slug']).'-'.$level1['cat_id'].'.html">'.$level1['cat_name'].'</a>';  
                    $html .='<ul class="dropdown-menu">';
                        foreach($data as $level2){
                                if($level2['parentid'] == $level1['cat_id']){
                                    $count2 = $mcateblog->countLevelSub($level2['cat_id']);
                                        if($count2['number'] > 0){
                                             $html .= '<li class="dropdown-submenu">';
                                             $html .= '<a href="/on-tap/'.trim($level2['slug']).'-'.$level2['cat_id'].'.html">'.$level2['cat_name'].' <i class="fa fa-angle-right"></i></a>';
                                                $html .= '<ul class="dropdown-menu">';
                                                    foreach($data as $level3){
            											if($level3['parentid'] == $level2['cat_id']){
            												$html .='<li><a href="/on-tap/'.trim($level3['slug']).'-'.$level3['cat_id'].'.html">'.$level3['cat_name'].'</a></li>';
            											}
            										}
                                                $html .= '</ul>'; //End ul cap 3
                                            $html .= '</li>';
                                        }else{
                                            $html .= '<li><a href="/on-tap/'.trim($level2['slug']).'-'.$level2['cat_id'].'.html">'.$level2['cat_name'].'</a></li>';
                                        }
                                } //End if($level2)
                        } //End loop level 2
                    $html .= '</ul>'; //End ul cap 2
                $html .= '</li>';
            }else{
                switch($level1['slug']){
                    case 'lien-he':
                        $html .= '<li><a href="lien-he.html">'.$level1['cat_name'].'</a></li>';
                    break;
                    case 'huong-dan':
                        $html .= '<li><a href="huong-dan.html">'.$level1['cat_name'].'</a></li>';
                    break;
                    default:   $html .= '<li><a href="/on-tap/'.trim($level1['slug']).'-'.$level1['cat_id'].'.html">'.$level1['cat_name'].'</a></li>';
          
                }
                }
            
        }    
    }
    return $html;
}
//De quy menu frontend
/*
function recursiveMenuTop($array, $parent){
    
   $has_children = false;
    foreach($array as $key => $value) {
        if ($value['parentid'] == $parent) {       
            if ($has_children === false && $parent) {
                $has_children = true;
                echo '<ul>' ."\n";
            }
            echo '<li>' . "\n";
                echo '<a href="/page.php?id=' . $value['cat_id'] . '">' . $value['cat_name'] . '</a>' . " \n";
            echo "\n";
                recursiveMenuTop($array, $key);
            echo "</li>\n";
        }
    }
    if ($has_children === true && $parent) echo "</ul>\n";
   /* 
    $html = '';
    if(isset($data[$parent])){
        $html .= '<ul>'; 
            foreach($data as $value ){
                $html .= '<li>';
                $id = $value['cat_id'];
               // echo $data[$id];
               // die();
                if(isset($data[$id])){
                    $html .= '<a href="#">'.$value['cat_name'].'</a>';
                }else{
                    $html .= '<a href="#view/">'.$value['cat_name'].'</a>';
                }
              
                recursiveMenuTop($data, $id);    
                $html .= '</li>';
            }
        $html .= '</ul>';
        return $html;
    }
    */
//}


/* End menu */
/********* Kiem tra phan quyen va bao mat *******/

//Phan quyen chung
function author() {
    if (!isset($_SESSION['level']) == 1 || !isset($_SESSION['level']) == 2 || !isset($_SESSION['level']) == 3) {
        redirect(BASE_URL.'@admincp/');
    }
}

function author_user() {
    if (!isset($_SESSION['level']) == 1 || !isset($_SESSION['level']) == 2 || !isset($_SESSION['level']) == 3) {
        redirect(BASE_URL.'@admincp/');
    }
}

//Phan quyen admin
function author_admin() {
    if(isset($_SESSION['ses_username']) && $_SESSION['ses_group'] == 1){
        return true;
    }
        return false;
   
    /*if (!$_SESSION['ses_username'] || $_SESSION['ses_group'] != 1) {
        redirect($baseurl.'login.html');
    }
    */
    //if (empty($_SESSION['ses_username'])) {
    //    redirect($baseurl.'login.html');
  //  }
}
//Kiem tra login hay chua
function check_login(){
    if(isset($_SESSION['ses_username']) && is_numeric($_SESSION['ses_userid'])){
        return true;
    }
    return false;
}
//Hàm convert utf-8 sang chuoi khong dau
function unicode_str_filter($str) {
    if (!$str)
        return false;
    $unicode = array(
        'a' => array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
        'A' => array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
        'd' => array('đ'),
        'D' => array('Đ'),
        'e' => array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
        'E' => array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'
        ),
        'i' => array('í','ì','ỉ','ĩ','ị'
        ),
        'I' => array('Í','Ì','Ỉ','Ĩ','Ị'),
        'o' => array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
        'O' => array(
            'Ó',
            'Ò',
            'Ỏ',
            'Õ',
            'Ọ',
            'Ô',
            'Ố',
            'Ồ',
            'Ổ',
            'Ỗ',
            'Ộ',
            'Ơ',
            'Ớ',
            'Ờ',
            'Ở',
            'Ỡ',
            'Ợ'
        ),
        'u' => array(
            'ú',
            'ù',
            'ủ',
            'ũ',
            'ụ',
            'ư',
            'ứ',
            'ừ',
            'ử',
            'ữ',
            'ự'
        ),
        'U' => array(
            'Ú',
            'Ù',
            'Ủ',
            'Ũ',
            'Ụ',
            'Ư',
            'Ứ',
            'Ừ',
            'Ử',
            'Ữ',
            'Ự'
        ),
        'y' => array(
            'ý',
            'ỳ',
            'ỷ',
            'ỹ',
            'ỵ'
        ),
        'Y' => array(
            'Ý',
            'Ỳ',
            'Ỷ',
            'Ỹ',
            'Ỵ'
        ),
        '-' => array(
            ' ',
            '&quot;',
            '.',
            '-–-'
        )
    );
    foreach ($unicode as $nonUnicode => $uni) {
        foreach ($uni as $value)
            $str = @str_replace($value, $nonUnicode, $str);
        $str = preg_replace("/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/", "-", $str);
        $str = preg_replace("/-+-/", "-", $str);
        $str = preg_replace("/^\-+|\-+$/", "", $str);
        $str = str_replace("\\", "-", $str);
    }
    return strtolower($str);
}

function page_navigation($start, $limit,$total_recode,$link){
   // global $start;
    if(isset($_GET['p'])){
        $total_page = intval($_GET['p']);
    } else {
        $total_page = ceil($total_recode/$limit);
    }
   
    if($total_page != 1) {
        $curent_page = $start/$limit + 1;
        if($curent_page !=1) {
            echo "<a href='{$link}/start/0/p/{$total_page}' class='link' title='Trang đầu'>&laquo; First</a>";
            $temp = $start - $limit;
            echo "<a href='{$link}/start/{$temp}/p/{$total_page}' class='link' title='Lùi lại'>&laquo; Previous</a>";
        }
        $begin = $curent_page - 2;
        if($begin <1){
            $begin =1;
        }
        
        $end = $curent_page +2;
        if($end > $total_page){
            $end = $total_page;
        }
        for($i=$begin;$i<=$end; $i++){
            if($curent_page == $i){
                echo "<a class='number current'>{$i}</a>";
            }else {
                $temp = ($i-1)*$limit;
                echo "<a href='{$link}/start/{$temp}/p/{$total_page}' class='number'>{$i}</a>";
            }
        }
        
        if($curent_page != $total_page) {
            $temp = $start + $limit;
            echo "<a href='{$link}/start/{$temp}/p/{$total_page}' class='link' title='Tiếp theo'>Next &raquo;</a>";
            $temp = ($total_page - 1)* $limit;
            echo "<a href='{$link}/start/{$temp}/p/{$total_page}' class='link' title='Trang cuối'>Last &raquo;</a>";
        }
    }
    
}
    function wordLimiter($text,$limit=100,$dots=''){
    			$explode=array();
    		    $explode = explode(' ',$text);
    		    $string  = '';
    		    $forcount=$limit;
    		    if($limit>=count($explode)){
    		    	$forcount=count($explode);
    		    }
    		    if(count($explode) <= $limit){
    		        $dots = '';
    		    }
    		    for($i=0;$i<$forcount;$i++){ 
    		        $string .= $explode[$i]." ";
    		    }
    		        
    		    return $string.$dots;
    }