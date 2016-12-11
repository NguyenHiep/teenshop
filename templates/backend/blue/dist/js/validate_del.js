
$(document).ready(function(){
    $("#check-all-cached").change(function(){  //"select all" change 
        $(".cached-checkbox-detail").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
    });
     $("#check-all-cached-page").change(function(){  //"select all" change 
        $(".cached-checkbox-page").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
    });
    
    //".checkbox" change 
    $('.cached-checkbox-detail').change(function(){ 
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(false == $(this).prop("checked")){ //if this item is unchecked
            $("#check-all-cached").prop('checked', false); //change "select all" checked status to false
        }
        //check "select all" if all checkbox items are checked
        if ($('.cached-checkbox-detail:checked').length == $('.cached-checkbox-detail').length ){
            $("#check-all-cached").prop('checked', true);
        }
    });
    
    //".checkbox" change 
    $('.cached-checkbox-page').change(function(){ 
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(false == $(this).prop("checked")){ //if this item is unchecked
            $("#check-all-cached-page").prop('checked', false); //change "select all" checked status to false
        }
        //check "select all" if all checkbox items are checked
        if ($('.cached-checkbox-page:checked').length == $('.cached-checkbox-page').length ){
            $("#check-all-cached-page").prop('checked', true);
        }
    });
});

function validate_del(){
    var temp = confirm('Bạn muốn xoá phần tử này?');
    if(temp == true){
        return true;
    }
    return false;
}
