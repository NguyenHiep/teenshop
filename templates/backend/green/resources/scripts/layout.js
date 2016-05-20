jQuery(document).ready(function(){
   
    var unique = $('input.unique');
    
	unique.click(function() {
		if($(this).is(':checked')){
			switch($(this).attr('class')){
			    case 'unique facebook':
			    	$('input#facebook').attr('type','text');
			    break;
			    case 'unique twitter':
			    	$('input#twitter').attr('type','text');
			    break;
			    case 'unique skype':
			    	$('input#skype').attr('type','text');
			    break;
			    case 'unique google':
			    	$('input#google').attr('type','text');

			    default:
				    break;
		    }
		}else{
			switch($(this).attr('class')){
			    case 'unique facebook':
			    	$('input#facebook').attr('type','hidden');
			    break;
			    case 'unique twitter':
			    	$('input#twitter').attr('type','hidden');
			    break;
			    case 'unique skype':
			    	$('input#skype').attr('type','hidden');
			    break;
			    case 'unique google':
			    	$('input#google').attr('type','hidden');
	
			    default:
				    break;
		    }
		}
		
	});
    
});