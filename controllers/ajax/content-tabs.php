<?php
if(!isset($_GET['id']) || validate_int($_GET['id']) == false){
    redirect(BASE_URL);
}
$p = intval($_GET['id']);
switch($p) {
		case "1":
		echo getpopularpost();
		break;		  
		case "2":
		echo getlatestpost();
		break;
        default:
            echo getpopularpost();
        break;      
}

function getpopularpost(){
    $mblog = new Model_Blog();
    $listMostView = $mblog->listMostView(3);
          $html = '';            
          $html .='<div id="popular-post" class="tabs-wrap tab-pane fade in active">
                <ul class="list-unstyled">';
                      if($mblog->num_rows($listMostView) > 0){      
                        foreach($listMostView as $data):
                                if($data['image'] == 'none'){
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
          </div>';
    return $html;
}
function getlatestpost(){
     $mblog = new Model_Blog();
     $listHightLight = $mblog->getBlogLightHight(3);
          $html = '';            
          $html .='<div id="latest-post" class="tabs-wrap tab-pane fade in active">
                <ul class="list-unstyled">';
                      if($mblog->num_rows($listHightLight) > 0){      
                        foreach($listHightLight as $data):
                                if($data['image'] == 'none'){
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
          </div>';
    return $html;
}