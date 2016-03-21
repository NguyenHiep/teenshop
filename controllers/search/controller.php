<?php
    if(isset($_POST['btnSearch'])){
        $q = fix_str($_GET['q']);
        
     require_once "views/search/result_search_view.php";   
    }
?>
