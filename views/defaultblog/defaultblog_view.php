 <?php
    require "templates/frontend/version1/blog-header.php";
 ?>
<script type="text/javascript" src="<?php echo TEMPLATE_FRONTEND;?>plugins/slider/js/jssor.slider.min.js"></script>
<!-- Begin slider -->
<script>
    <!--
     jssor_1_slider_init = function() {
            
            var jssor_1_options = {
              $AutoPlay: true,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 4,
                $SpacingX: 4,
                $SpacingY: 4,
                $Orientation: 2,
                $Align: 0
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 810);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    -->
</script>
  <style>
        
        /* jssor slider arrow navigator skin 02 css */
        /*
        .jssora02l                  (normal)
        .jssora02r                  (normal)
        .jssora02l:hover            (normal mouseover)
        .jssora02r:hover            (normal mouseover)
        .jssora02l.jssora02ldn      (mousedown)
        .jssora02r.jssora02rdn      (mousedown)
        */
        .jssora02l, .jssora02r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 55px;
            cursor: pointer;
            background: url('<?php echo TEMPLATE_FRONTEND;?>plugins/slider/img/a02.png') no-repeat;
            overflow: hidden;
        }
        .jssora02l { background-position: -3px -33px; }
        .jssora02r { background-position: -63px -33px; }
        .jssora02l:hover { background-position: -123px -33px; }
        .jssora02r:hover { background-position: -183px -33px; }
        .jssora02l.jssora02ldn { background-position: -3px -33px; }
        .jssora02r.jssora02rdn { background-position: -63px -33px; }
/* jssor slider thumbnail navigator skin 11 css *//*.jssort11 .p            (normal).jssort11 .p:hover      (normal mouseover).jssort11 .pav          (active).jssort11 .pav:hover    (active mouseover).jssort11 .pdn          (mousedown)*/.jssort11 .p {    position: absolute;    top: 0;    left: 0;    width: 200px;    height: 69px;    background: #181818;}.jssort11 .tp {    position: absolute;    top: 0;    left: 0;    width: 100%;    height: 100%;    border: none;}.jssort11 .i, .jssort11 .pav:hover .i {    position: absolute;    top: 3px;    left: 3px;    width: 60px;    height: 30px;    border: white 1px dashed;}* html .jssort11 .i {    width /**/: 62px;    height /**/: 32px;}.jssort11 .pav .i {    border: white 1px solid;}.jssort11 .t, .jssort11 .pav:hover .t {    position: absolute;    top: 3px;    left: 68px;    width: 129px;    height: 32px;    line-height: 32px;    text-align: center;    color: #fc9835;    font-size: 13px;    font-weight: 700;}.jssort11 .pav .t, .jssort11 .p:hover .t {    color: #fff;}.jssort11 .c, .jssort11 .pav:hover .c {    position: absolute;    top: 38px;    left: 3px;    width: 197px;    height: 31px;    line-height: 31px;    color: #fff;    font-size: 11px;    font-weight: 400;    overflow: hidden;}.jssort11 .pav .c, .jssort11 .p:hover .c {    color: #fc9835;}.jssort11 .t, .jssort11 .c {    transition: color 2s;    -moz-transition: color 2s;    -webkit-transition: color 2s;    -o-transition: color 2s;}.jssort11 .p:hover .t, .jssort11 .pav:hover .t, .jssort11 .p:hover .c, .jssort11 .pav:hover .c {    transition: none;    -moz-transition: none;    -webkit-transition: none;    -o-transition: none;}.jssort11 .p:hover, .jssort11 .pav:hover {    background: #333;}.jssort11 .pav, .jssort11 .p.pdn {    background: #462300;}
        
    </style>
<!-- End script slider -->
<div class="main">
      <div class="container">
      <!--
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="javascript:;">Cate Blog</a></li>
            <li class="active">Blog detail</li>
        </ul>
      -->
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
           
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-posts">
                    <div class="row" id="slider-home" style="padding-top: 15px; padding-bottom: 15px;">
                     <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 810px; height: 300px; overflow: hidden; visibility: hidden; background-color: #000000;">
                <!-- Loading Screen -->
                <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                    <div style="position:absolute;display:block;background:url('<?php echo TEMPLATE_FRONTEND;?>plugins/slider/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                </div>
                <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
                    <?php
                    if(count($dataSlider > 0)){
                        foreach($dataSlider as $data):
                    ?>
                    <div data-p="112.50" style="display: none;">
                        <a href="<?php echo !empty($data['link'])? $data['link']: "";?>" target="<?php echo $data['target']; ?>">
                            <img data-u="image" src="<?php echo URL_UPLOAD.trim($data['image']);?>" alt="<?php echo empty($data['alt']) ? $data['title']: $data['alt'];?>" />
                        </a>
                        <div data-u="thumb">
                            <img class="i" src="<?php echo URL_UPLOAD.trim($data['image']);?>" alt="<?php echo empty($data['alt']) ? $data['title']: $data['alt'];?>"/>
                            <div class="t"><a href="<?php echo !empty($data['link'])? $data['link']: "";?>" target="<?php echo $data['target']; ?>" ><?php echo $data['title'];?> </a></div>
                            <div class="c"><?php echo $data['content']; ?></div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    } //End count($dataSlider)
                    ?>
                
                </div>
                <!-- Thumbnail Navigator -->
                <div data-u="thumbnavigator" class="jssort11" style="position:absolute;right:5px;top:0px;font-family:Arial, Helvetica, sans-serif;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;user-select:none;width:200px;height:300px;" data-autocenter="2">
                    <!-- Thumbnail Item Skin Begin -->
                    <div data-u="slides" style="cursor: default;">
                        <div data-u="prototype" class="p">
                            <div data-u="thumbnailtemplate" class="tp"></div>
                        </div>
                    </div>
                    <!-- Thumbnail Item Skin End -->
                </div>
                <!-- Arrow Navigator -->
                <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
                <span data-u="arrowright" class="jssora02r" style="top:0px;right:218px;width:55px;height:55px;" data-autocenter="2"></span>
            </div>
          
            <!-- #endregion Jssor Slider End -->
                    </div>  <!-- End #slider-home -->
                    <br />
                    
                    <div class="blog-list">
                    <?php
                        $name = md5(md5("listblog"));
                        $xml = simplexml_load_file("cached/$name.xhtml");
                        $data = $xml->news;
                        foreach($data as $item):
                    ?>
                      <div class="row">
                        <div class="col-md-4 col-sm-4 gallery-item">
                        <?php
                            if(trim($item->image) != "none"){
                                
                        ?>
                           <a data-rel="fancybox-button" title="<?php echo $item->title;?>" href="<?php echo trim($item->image); ?>" class="fancybox-button">
                                <img alt="" src="<?php echo trim($item->image); ?>" class="img-responsive" />
                                <div class="zoomix"><i class="fa fa-search"></i></div>
                           </a> 
                        <?php
                            }else{ //Neu khong co image
                        ?>
                             <a data-rel="fancybox-button" title="<?php echo $item->title;?>" rel="nofollow" href="<?php echo URL_UPLOAD.'blog/noneimage.png'; ?>" class="fancybox-button">
                                <img alt="" src="<?php echo "http://placehold.it/250x220"; ?>"  class="img-responsive" />
                                <div class="zoomix"><i class="fa fa-search"></i></div>
                           </a> 
                        <?php        
                            }
                        ?>
                        </div>
                        <div class="col-md-8 col-sm-8 detail-content-post">
                          <h2><a href="<?php echo BASE_URL.'on-tap/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>"><?php echo $item->title;?></a></h2>
                          <ul class="blog-info">
                            <li><i class="fa fa-user-secret"></i> <?php echo $item->author;?></li>
                            <li><i class="fa fa-calendar"></i> <?php echo date("d/m/Y",strtotime($item->poston)); ?></li>
                            <li><i class="fa fa-list"></i> <?php echo $item->catename;?></li>
                            <li><i class="fa fa-eye"></i> <?php echo $item->viewpost; ?> views</li>
                          </ul>
                          <section class="item">
                                <p><?php echo $item->short; ?></p>
                          <a href="<?php echo BASE_URL.'on-tap/'.trim($item->slugcate).'/'.trim($item->slug).'-'.$item['newsid'].'.html'; ?>" class="btn btn-primary pull-right more">Xem chi tiết <i class="icon-angle-right"></i></a>
                          </section>
                        </div>
                      </div>
                      <hr class="blog-post-sep" />
                  <?php    
                    endforeach;
                  ?> 
                 </div> <!-- End .blog-list -->
                <div class="row show_more_main" id="show_more_main<?php echo $item['newsid']; ?>">
                    <span id="<?php echo $item['newsid']; ?>" class="show_more" title="Hiển thị nhiều bài viết hơn nữa">Hiển thị nhiều hơn nữa</span>
                    <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
                </div>
                </div>
                <!-- END LEFT SIDEBAR -->
                <?php
                     require "templates/frontend/version1/blog-sidebar.php";
                ?>    
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

<?php
    require "templates/frontend/version1/blog-footer.php";
?>