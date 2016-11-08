$(document).ready(function(){
	//Begin Show tab
     $(".posts-taps a").click(function(e){
        e.preventDefault();
        $(this).tab('show');
    });

    //Begin back to top
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('#backtotop').fadeIn();
		} else {
			$('#backtotop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('#backtotop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
    $(".pagination li a").click(function(){
        $('body,html').animate({
            scrollTop: 0
        }, 1200);
        return false;
    });
	//Begin code javascript for tabs blog sidebar 
    $("#preloader").hide();				
	jQuery("[id^=tab]").click(function(){	
		// get tab id and tab url
		tabId = $(this).attr("id");										
		tabUrl = jQuery("#"+tabId).attr("href");
		
		jQuery("[id^=tab]").removeClass("current");
		jQuery("#"+tabId).addClass("current");
		
		// load tab content
		loadTabContent(tabUrl);
		return false;
	});
	//End code javascript for tabs blog sidebar 
});
function loadTabContent(tabUrl){
			$("#preloader").show();
			jQuery.ajax({
				url: tabUrl, 
				cache: false,
				success: function(message) {
					jQuery(".tab-content").empty().append(message);
					$("#preloader").hide();
				}
			});
		}
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
$body = $("body");
// Show loading overlay when ajax request starts
$( document ).ajaxStart(function() {
    //$('.loading-overlay').show();
    $body.addClass("loading"); 
});
// Hide loading overlay when ajax request completes
$( document ).ajaxStop(function() {
    //$('.loading-overlay').hide();
    $body.removeClass("loading");
});