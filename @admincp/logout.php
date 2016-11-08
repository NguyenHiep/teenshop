<?php
session_start();
require "../libraries/functions.php";
require "../libraries/config.php";
session_destroy();
header("location:".BASE_URL);
exit();
