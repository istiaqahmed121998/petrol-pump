<?php
require_once "config.php";
session_destroy();
setcookie('login', '', time()-1);
redirect("login.php");
?>