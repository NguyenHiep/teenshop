jQuery(document).ready(function(){
    var pos = jQuery('.pre-header').position();

    jQuery(window).scroll(function(){
       var posScroll = jQuery(document).scrollTop();
       if(parseInt(posScroll) > parseInt(pos.top)){
            jQuery('.pre-header').addClass('fixed');
       }else{
             jQuery('.pre-header').removeClass('fixed');
       } 
    });
    
});

function inProcess(){
    alert("Cảm ơn bạn đã quan tâm đến chuyên mục này, tôi sẽ update chúng sớm nhất có thể!");
    return false;
}
function loadMoreBlog(ID){
    $.ajax({
        url:'ajax/more',
		type:'POST',
		data:'id='+ID,
        beforeSend: function(){
            $('.ajax-load-qa').show();
        },
        complete: function(){
             setTimeout(function () {
                 $('.ajax-load-qa').hide();
              }, 1000);
        },
		success:function(html){
			$('#show_more_main'+ID).remove();
			$('.blog-list').append(html);
        
		}
    });
}
function loginAction() {
    var fd = new FormData(document.getElementById("loginForm"));
    //fd.append("label", "WEBUPLOAD");
    $.ajax({
        url: "/login",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        beforeSend: function(){
            $('.ajax-load-qa').show();
        },
        complete: function(){
             setTimeout(function () {
                 $('.ajax-load-qa').hide();
              }, 1000);
        }
    }).done(function( msg ) {
       var data = JSON.parse(msg);
            if( parseInt(data.response) == 1){
                 $("#msg_login").html('<div class="text-success"><i class="fa fa-check-circle"></i> Đăng nhập thành công</div>');
                 $('.modal-body').hide();
                 $('.modal-header h3').hide();
                //Sau 1s moi chuyen huong
                setTimeout(function(){
                    window.location.replace(data.redirecturl);
                },3000);
                
            }else{
                //Display error message
                $("#msg_login").html('<div class="text-danger"><i class="fa fa-times"></i> '+data.error+"</div>");
            }
    });
    return false;
}