<?php
session_start();
    unset($_SESSION["ses_username"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
redirect(BASE_URL);