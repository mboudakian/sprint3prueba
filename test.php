<?php
require 'loader.php';


$pepito = new User("sarasa", "sarasa@sarasa.com", "asd123", 25, 'pepito.jpg');
$validate = new Validator();
$validate->validate($pepito);
dd($validate);
