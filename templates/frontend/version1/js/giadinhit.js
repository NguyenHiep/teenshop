jQuery(document).ready(function(){
    var pos = jQuery('.header').position();

    jQuery(window).scroll(function(){
       var posScroll = jQuery(document).scrollTop();
       if(parseInt(posScroll) > parseInt(pos.top)){
            jQuery('.header').addClass('fixed');
       }else{
             jQuery('.header').removeClass('fixed');
       } 
    });    
});

function inProcess(){
    alert("Cảm ơn bạn đã quan tâm đến chuyên mục này, tôi sẽ update chúng sớm nhất có thể!");
    return false;
}
