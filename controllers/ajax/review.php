<?php
    if(isset($_POST['rateid'])){
        $id = intval($_POST['rateid']);
        echo json_encode($id);
    }
?>