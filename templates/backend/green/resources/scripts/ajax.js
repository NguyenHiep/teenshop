var baseurl = "http://teenshop.local/@admincp/";
function listUser(){
    $("#selectlv").change(function(){
       lvid = $("#selectlv").val();
       //alert(lvid);
       $.ajax({
        url:baseurl+"ajax/listuser",
        type: "post",
        data: "id="+lvid,
        async: true,
        beforeSend: function() { $('#wait').show(); },
        complete: function() { $('#wait').hide(); },
        success:function(kq){
            $("#level ").html(kq);
        }
       })  
    });
}