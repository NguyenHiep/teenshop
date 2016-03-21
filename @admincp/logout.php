<?php
session_start();
require "../config.php";
session_destroy();
header("location:".BASE_URL);
exit();
