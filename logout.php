<?php
session_start();
session_destroy();
setcookie("pass", "", time()- 1);
header("location: login.php");
?>