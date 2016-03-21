<?php
if(isset($_GET['uid']) && validate_int($_GET['uid']) == true && $_GET['uid'] >0){
    $uid = $_GET['uid'];
    if($uid == 1){
       echo "<script>alert('Cannot delete is a member!');window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
    }else{
        $muser = new Model_User();
        $muser->deleteUser($uid);
          redirect(BASE_ADMIN.'/user/list');
    }
   
}else{
     redirect(BASE_ADMIN.'/user/list');
}