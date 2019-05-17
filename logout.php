<?php
/*session_start();
session_destroy();
setcookie("pass", "", time()- 1);
header("location: login.php");*/
require 'loader.php';
Session::destroy();
cookie::set('pass', '', time()-1);
redirect('login.php');
?>