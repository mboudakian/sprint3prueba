<?php
require 'helpers.php';
require 'classes/auth.php';
require 'classes/cookie.php';
require 'classes/session.php';
require 'classes/product.php';
require 'classes/profile.php';
require 'classes/user.php';
require 'classes/validator.php';
require 'classes/database.php';

Session::start();

$validator = new Validator();
$db = new Database('usuarios.json');
$auth = new Auth();
