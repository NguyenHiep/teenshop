
<?php
if(isset($_POST['btnRegister'])){   
        echo "<h1>User - register controller</h1>";
    $data = array(
       // "username" => $_POST[''];
    );
     require_once ("views/user/register_view.php");
}
