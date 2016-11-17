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
function siteURL(){
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].'/';
    return $protocol.$domainName;
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
function MenuTop(){
    $mcateblog = new Model_CateBlog();
    $data = $mcateblog->listCategory();
    $html = '';
    $html .= '<ul>';
    if($data >0){
        foreach($data as $level1){
         
            if($level1['parentid'] == 0){
            //Neu so phan tu con cap 1 lon hon 0 thi thuc hien
             $count = $mcateblog->countLevelSub($level1['cat_id']);
                if($count['number'] > 0){
                    $html .= '<li class="dropdown">';
                    
                    $html .= '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/danh-muc/'.trim($level1['slug']).'-'.$level1['cat_id'].'.html">'.$level1['cat_name'].'</a>';  
                        $html .='<ul class="dropdown-menu">';
                            foreach($data as $level2){
                                    if($level2['parentid'] == $level1['cat_id']){
                                        $count2 = $mcateblog->countLevelSub($level2['cat_id']);
                                            if($count2['number'] > 0){
                                                 $html .= '<li class="dropdown-submenu">';
                                                 $html .= '<a href="/danh-muc/'.trim($level2['slug']).'-'.$level2['cat_id'].'.html">'.$level2['cat_name'].' <i class="fa fa-angle-right"></i></a>';
                                                    $html .= '<ul class="dropdown-menu">';
                                                        foreach($data as $level3){
                											if($level3['parentid'] == $level2['cat_id']){
                												$html .='<li><a href="/danh-muc/'.trim($level3['slug']).'-'.$level3['cat_id'].'.html">'.$level3['cat_name'].'</a></li>';
                											}
                										}
                                                    $html .= '</ul>'; //End ul cap 3
                                                $html .= '</li>';
                                            }else{
                                                $html .= '<li><a href="/danh-muc/'.trim($level2['slug']).'-'.$level2['cat_id'].'.html">'.$level2['cat_name'].'</a></li>';
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
                        default:   $html .= '<li><a href="/danh-muc/'.trim($level1['slug']).'-'.$level1['cat_id'].'.html">'.$level1['cat_name'].'</a></li>';
              
                    }
              }
                
            }    
        } //End foreach;
    }
    //Search
    $html.= '<!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="/search" method="get">
                  <div class="input-group">
                    <input type="text" name="q" placeholder="Từ khóa tìm kiếm" class="form-control" />
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->';
    $html .= '</ul>';
    return $html;
}
function MenuTopNew(){
     $mcateblog = new Model_CateBlog();
    $data = $mcateblog->listCategory();
    $html = '';
    $html .= '<ul>';
    if($data >0){
        foreach($data as $level1){
         
            if($level1['parentid'] == 0){
            //Neu so phan tu con cap 1 lon hon 0 thi thuc hien
             $count = $mcateblog->countLevelSub($level1['cat_id']);
                switch($level1['slug']){
                    case 'lien-he':
                        $html .= '<li><a href="'.BASE_URL.'lien-he.html" title="'.$level1['cat_name'].'">'.$level1['cat_name'].'</a></li>';
                    break;
                    case 'huong-dan':
                        $html .= '<li><a href="'.BASE_URL.'huong-dan.html" title="'.$level1['cat_name'].'">'.$level1['cat_name'].'</a></li>';
                    break;
                    default:   $html .= '<li><a href="'.BASE_URL.'danh-muc/'.trim($level1['slug']).'.html" title="'.$level1['cat_name'].'">'.$level1['cat_name'].'</a></li>';            
                }
                
            }    
        } //End foreach;
    }
    $html .= '</ul>';
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

function getBlogMostView(){
        $html ='';
        $mblog = new Model_Blog();
        $listMostView = $mblog->listMostView();
        $stt = 0;
        $html .='<h2 class="title-comment">
                <span class="fa fa-eye"></span>Bài viết xem nhiều</h2>
                <div id="most-view-blog">
                ';
        if($mblog->num_rows($listMostView) > 0)                
            foreach($listMostView as $list):
            $stt++;
                 $html .='
                    <article>
                     <div class="recent-news margin-bottom-10">
                        <div class="row margin-bottom-10">
                          <!--<div class="col-md-2">
                            <span class="display:block; background: #FFF; color: red !important;"><?php echo $stt; ?> </span>
                          </div>
                          -->
                          <div class="col-md-12 recent-news-inner">
                                <h3><a href="'.BASE_URL.'danh-muc/'.trim($list['slugcate']).'/'.trim($list['slug']).'-'.$list['blog_id'].'.html">'.$list['blog_name'].'</a></h3>
                                <div class="item-description">
                                '.wordLimiter($list['short_content'], 15, '...').'
                                <i class="fa fa-eye"></i>'.$list['view_post'].'views
                            </div>
                          </div>                        
                        </div>
                      </div>
                     </article>
                     <div class="clearfix"></div>
                 ';   
            endforeach;
        else
            $html .= 'Chưa có bài viết';
                    
         $html .= '</div>';
        return $html;
              
}
function getProfileHomePage(){
    $author = new Model_User();
    $data = $author->getUserPageHome();
    $html ='';
    $html.='<div class="block block-profile">
                        <div class="profile-sidebar">
                            <div class="profile_cover">
                                <h3 class="text-center">I am a developer</h3>
                                <div class="profile_avatar">
                                    <img src="'.URL_UPLOAD.trim($data['avatart']).'" alt="'.$data['nickname'].'" title="'.$data['nickname'].'" class="img-circle img-responsive center-block" />
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="profile-title">
                                    <h3 class="text-center"><a href="#">'.$data['nickname'].'</a> </h3>
                                </div>
                                <div class="profile_description text-center">
                                    '.$data['short_instruction'].'
                                </div>
                            </div>
                        </div>   
                
                  </div>';
    return $html;
}
function getPostTab(){
    
    /*
    $html ='';
        $mblog = new Model_Blog();
        $listMostView = $mblog->listMostView();
        $stt = 0;
        $html .='<h2 class="title-comment">
                <span class="fa fa-eye"></span>Bài viết xem nhiều</h2>
                <div id="most-view-blog">
                ';
        if($mblog->num_rows($listMostView) > 0)                
            foreach($listMostView as $list):
            $stt++;
                 $html .='
                    <article>
                     <div class="recent-news margin-bottom-10">
                        <div class="row margin-bottom-10">
                          <!--<div class="col-md-2">
                            <span class="display:block; background: #FFF; color: red !important;"><?php echo $stt; ?> </span>
                          </div>
                          -->
                          <div class="col-md-12 recent-news-inner">
                                <h3><a href="'.BASE_URL.'danh-muc/'.trim($list['slugcate']).'/'.trim($list['slug']).'-'.$list['blog_id'].'.html">'.$list['blog_name'].'</a></h3>
                                <div class="item-description">
                                '.wordLimiter($list['short_content'], 15, '...').'
                                <i class="fa fa-eye"></i>'.$list['view_post'].'views
                            </div>
                          </div>                        
                        </div>
                      </div>
                     </article>
                     <div class="clearfix"></div>
                 ';   
            endforeach;
        else
            $html .= 'Chưa có bài viết';
                    
         $html .= '</div>';
    */
    $mblog = new Model_Blog();
    $listMostView = $mblog->listMostView(3);
    
    $html ='';
    $html .= '<div class="block block-post-sidebar">
                      <div class="post-tabs-title">
                          <ul class="nav nav-tabs tabs posts-taps">
                            <li class="tabs active"><a class="current" id="tab1" data-toggle="tab" href="'.BASE_URL.'index.php?controller=ajax&action=contenttabs&id=1">Xem nhiều nhất</a></li>
                            <li class="tabs active"><a id="tab2" href="'.BASE_URL.'index.php?controller=ajax&action=contenttabs&id=2">Bài viết nổi bật</a></li>
                          </ul>
                      </div>
                        <div id="preloader">
            				<img src="'.TEMPLATE_FRONTEND.'img/loading.gif" alt="loader" title="loader"> Loading...				
            			</div>
                    
                      <div class="block-content tab-content">'; //Remove id="tabcontent""
                          $html .='<div id="popular-post" class="tabs-wrap tab-pane fade in active">
                                <ul class="list-unstyled">';
                          if($mblog->num_rows($listMostView) > 0){      
                            foreach($listMostView as $data):
                                    if(trim($data['image']) == 'none'){
                                        $data['image'] = 'uploads/default.jpg';
                                    }
                                    $html .= '<li class="post-item clearfix">
                                        <div class="post-thumbnail">
                                            <a href="'.BASE_URL.'danh-muc/'.trim($data['slugcate']).'/'.trim($data['slug']).'-'.$data['blog_id'].'.html" title="'.$data['blog_name'].'">
                                                <img src="'.BASE_URL.trim(ltrim($data['image'],'/')).'" class="img-responsive img-tabs" title="'.$data['blog_name'].'" alt="'.$data['slug'].'" />
                                            </a>
                                        </div>
                                        <h3><a href="'.BASE_URL.'danh-muc/'.trim($data['slugcate']).'/'.trim($data['slug']).'-'.$data['blog_id'].'.html">'.$data['blog_name'].'</a></h3>
                                        <p class="post-date">'.date('d F Y',strtotime($data['post_on'])).'</p>
                                        <div class="post-item-shortdescription">
                                            '.$data['short_content'].'
                                        </div>
    
                                    </li>';
                            endforeach;
                          }else{
                            $html .= '<li class="post-item clearfix">Đang cập nhật!</li>';
                          }          
                                $html .='</ul>
                            </div>
                        
                      </div> 
                  </div>';
    return $html;
}
function getFllowsocial(){
    $html = '';
    /*
    $html .='<div class="block block-followme">
                        <div class="followme-title">
                            <h2 class="title-block">Follow me</h2>
                        </div>
                        <div class="block-content">
                          <div class="follow-link">
                              <ul class="list-unstyled">
                                <li><a href="#" class="follow-facebook"><span><i class="fa fa-facebook"></i></span></a> 1000 Followers</li>
                                <li><a href="#" class="follow-twitter"><span><i class="fa fa-twitter"></i></span></a>  1400 Followers</li>
                                <li><a href="#" class="follow-google-plus"><span><i class="fa fa-google-plus"></i></span></a>  4356 Followers</li>
                                <li><a href="#" class="follow-youtube"><span><i class="fa fa-youtube"></i></span></a>1234 Followers</li>
                              </ul>
                          </div>
                        </div>
                  </div>';
                  */
    return $html;
}
function getTotalBlogByCate(){
   $htmlcate = '';
   $htmlcate .='<div class="block block-categories">
                <div class="category-title">
                    <h2 class="title-block">Danh mục</h2>
                </div>
                <div class="block-content">
                  <div class="list-categories">';
                          
                   $htmlcate .='<ul class="list-unstyled">';
                
                            $mcate = new Model_CateBlog();
                            $listCate = $mcate->listCategory();
                           
                            foreach($listCate as $list):
                            if($list['slug'] == 'lien-he')
                                continue;
                            $htmlcate.= '<li';
                            if(isset($_GET['slug']) && $_GET['slug'] == $list['slug']){
                                $htmlcate.= " class='active'";
                            }
                            // $html .= '<li><a href="'.BASE_URL.'danh-muc/'.trim($level1['slug']).'.html" title="'.$level1['cat_name'].'">'.$level1['cat_name'].'</a></li>';            
                            $htmlcate.= '><a href="'.BASE_URL.'danh-muc/'.trim($list['slug']).'.html'.'"><span><i class="fa fa-long-arrow-right"></i></span><span class="pull-right">'.$list['sumblog'].'</span>'.$list['cat_name'].'</a></li>';
                            endforeach;
                            $htmlcate;
                    $htmlcate .='</ul>';
        $htmlcate .= ' </div>
                </div>
                      
            </div>';
   return $htmlcate;
}

function getPostSlider(){
    //Display post random
    $mblog = new Model_Blog();
    $listRandom = $mblog->listRandom(3);
    
    $html = '';
    /*
    $html .= ' <div class="block block-post-slider">
                      <div class="block-content">';
                $html .='<div id="myCarouselBlog" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">';
                                $stt = 0; 
                                foreach($listRandom as $data):
                                ++$stt; $active = '';
                                if($stt ==1) $active = 'active';
                                    $html .='
                                        <div class="item '.$active.'">';
                                            if(trim($data['image']) != 'none'){
                                                $html .= '<a href="'.BASE_URL.'danh-muc/'.$data['slugcate'].'/'.$data['slug'].'-'.$data['blog_id'].'.html" title="'.$data['blog_name'].'">
                                                            <img src="'.BASE_URL.trim(ltrim($data['image'],'/')).'" class="img-responsive center-block" alt="'.$data['slug'].'" title="'.$data['blog_name'].'" />
                                                         </a>';
                                            }else{
                                                $html .= '<a href="'.BASE_URL.'danh-muc/'.$data['slugcate'].'/'.$data['slug'].'-'.$data['blog_id'].'.html" title="'.$data['blog_name'].'">
                                                            <img src="'.URL_UPLOAD.'default.jpg" class="img-responsive center-block" alt="'.$data['slug'].'" title="'.$data['blog_name'].'" />
                                                         </a>';
                                            }   
                
                                            $html .='<div class="carousel-caption">
                                                <h3>'.$data['blog_name'].'</h3>
                                            </div>
                                        </div>';
                                endforeach;    
    
                                $html .= '
                                </div>
                                <a class="left carousel-control" href="#myCarouselBlog" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarouselBlog" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                           </div>';
            $html .= '</div>
                </div>'; //End block
                */
    return $html;
}
function getPostVideo(){
    $html = '';
    /*
    $html .=' <div class="block block-post-video">
                      <div class="block-content">
                        <div class="post-video">
                            <!-- <img src="img/right-item03.jpg" alt="post video" title="post video" class="img-responsive" /> -->
                            <iframe src="https://www.youtube.com/embed/cp1lRkqRSps?theme=light&autoplay=0&vq=hd720&wmode=opaque&rel=0&showinfo=0&modestbranding=1&version=3&ps=docs&nologo=0&color=white&iv_load_policy=3&cc_load_policy=1&widgetid=1" allowfullscreen="" ></iframe>
                        </div>
                      </div>
                  </div>';
                  */
    return $html;
}
function getFlickrPhoto(){
    $html ='';
    /*
    $html .=' <div class="block block-flickr">
                        <div class="flickr-title">
                            <h2 class="title-block">Flickr photo</h2>
                        </div>
                        <div class="block-content">
                          <div class="list-flickr-photo">
                            <ul class="list-inline">';
                            
                                $listdata = file_get_contents('https://api.flickr.com/services/rest/?method=flickr.people.getPhotos&api_key=4029355a45f89590765e62223f94c7c1&user_id=139876265%40N08&format=json&nojsoncallback=1&auth_token=72157672292305234-5893414693d06b41&api_sig=9039f230b239a7e46a94af6f192a8b41');
                                $data = json_decode($listdata);
                               
                            
                              /*<li><a href="#"><img src="img/flick_01.jpg" alt="flick photo"  title="flick photo"></a></li>
                              <li><a href="#"><img src="img/flick_02.jpg" alt="flick photo"  title="flick photo"></a></li>
                              <li><a href="#"><img src="img/flick_03.jpg" alt="flick photo"  title="flick photo"></a></li>
                              <li><a href="#"><img src="img/flick_04.jpg" alt="flick photo"  title="flick photo"></a></li>
                              <li><a href="#"><img src="img/flick_05.jpg" alt="flick photo"  title="flick photo"></a></li>
                              <li><a href="#"><img src="img/flick_06.jpg" alt="flick photo"  title="flick photo"></a></li>
                              <li><a href="#"><img src="img/flick_07.jpg" alt="flick photo"  title="flick photo"></a></li>
                              <li><a href="#"><img src="img/flick_08.jpg" alt="flick photo"  title="flick photo"></a></li>
                            
                           
                    $html .= '</ul>
                          </div>
                         <div class="clearfix"></div>
                        </div>
                  </div>';
                  */
    return $html;
}
function getNewletter(){
    
    /*$data = [
        'email'     => 'johndoe@example.com',
        'status'    => 'subscribed',
        'firstname' => 'john',
        'lastname'  => 'doe'
    ];

    syncMailchimp($data);
    */
    $html = '';
    /*$html .=' <div class="block block-newsletter">
                      <div class="newsletter-title">
                          <h2 class="text-center"> Subscribe now </h2>
                      </div>
                      <div class="block-content">
                        <p>It is a long established fact that a reader will be distracted by the readable</p>
                        <form action="#" method="POST">
                          <div class="form-group">
                            <input type="email" placeholder="youremail@mail.com" class="form-control" required="required">
                          </div>
                          <div class="form-action text-center">
                                <button class="btn btn-success text-uppercase" type="submit">Subscribe now</button>
                          </div>
                        </form>
                      </div>
                  </div>';
                  */
    return $html;
}




function syncMailchimp($data) {
    /*
    $apiKey = 'your api key';
    $listId = 'your list id';

    $memberId = md5(strtolower($data['email']));
    $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

    $json = json_encode([
        'email_address' => $data['email'],
        'status'        => $data['status'], // "subscribed","unsubscribed","cleaned","pending"
        'merge_fields'  => [
            'FNAME'     => $data['firstname'],
            'LNAME'     => $data['lastname']
        ]
    ]);

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                                                                 

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $httpCode;
    */
}
function getAllTag(){
   $htmlcate = '';
   /*
   $htmlcate .='<div class="block block-categories">
                <div class="category-title">
                    <h2 class="title-block">Tag bài viết</h2>
                </div>
                <div class="block-content">
                  <div class="list-categories">';
                          
                   $htmlcate .='<ul class="list-unstyled">';
                
                            $mcate = new Model_CateBlog();
                            $listCate = $mcate->listCategory();
                           
                            foreach($listCate as $list):
                            if($list['slug'] == 'lien-he')
                                continue;
                            $htmlcate.= '<li';
                            if(isset($_GET['slug']) && $_GET['slug'] == $list['slug']){
                                $htmlcate.= " class='active'";
                            }
                            // $html .= '<li><a href="'.BASE_URL.'danh-muc/'.trim($level1['slug']).'.html" title="'.$level1['cat_name'].'">'.$level1['cat_name'].'</a></li>';            
                            $htmlcate.= '><a href="'.BASE_URL.'danh-muc/'.trim($list['slug']).'.html'.'"><span><i class="fa fa-long-arrow-right"></i></span><span class="pull-right">'.$list['sumblog'].'</span>'.$list['cat_name'].'</a></li>';
                            endforeach;
                            $htmlcate;
                    $htmlcate .='</ul>';
        $htmlcate .= ' </div>
                </div>
                      
            </div>';
            */
   return $htmlcate;
}

function getAdsSidbar(){
    $html ='';
    $html .='<h2 class="no-top-space title-comment"><span class="fa fa-th-list"></span>Quảng cáo</h2>   
                <div class="do-space">
					<a href="javascript:void(0)" target="_blank">
                    <img src="'.TEMPLATE_FRONTEND.'images/300x250.jpg" alt="" />
                    </a>
				</div>';
    return $html;
}

function createLinkPost($blog_id){
    $nextHtml   = ''; $preHtml = '';
    $mblog      = new Model_Blog();
    $next       = $mblog->getNextPostId($blog_id);
        
    $pre        = $mblog->getPrePostId($blog_id);
    if($next != false){
        $nextHtml   = '<a href="'.BASE_URL.'danh-muc/'.trim($next['slugcate']).'/'.trim($next['slug']).'-'.$next['blog_id'].'.html" class="pull-right" title="Bài viết tiếp theo">Bài viết tiếp theo</a>';
    }
    if($pre != false){
        $preHtml    = '<a href="'.BASE_URL.'danh-muc/'.trim($pre['slugcate']).'/'.trim($pre['slug']).'-'.$pre['blog_id'].'.html" class="" title="Bài viết cũ hơn">Bài viết cũ hơn</a>';
    }

    return $preHtml.$nextHtml;
}