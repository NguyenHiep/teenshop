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
function the_excerpt($text){
    return substr($text,0,strrpos($text, ' '));
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
    if (!$_SESSION['ses_username'] || $_SESSION['ses_group'] != 1) {
        redirect($baseurl.'login.html');
    }
}
//Kiem tra login hay chua
function check_login(){
    if(isset($_SESSION['ses_username']) && $_SESSION['ses_group'] == 1){
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