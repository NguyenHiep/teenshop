<?php
session_start();
require "../libraries/config.php";
session_destroy();
header("location:".BASE_URL);
exit();
