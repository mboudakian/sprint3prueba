<?php
require 'loader.php';

$database = new Database('usuarios.json');
$pepito = new User("sarasa", "sarasa@sarasa.com", "asd123", 25, 'pepito.jpg');
$validator = new Validator();
/*$validate->validate($pepito);
dd($validate->validate($pepito, 'asd123'));*/
$pruebas = [
    'hola',
    'chau',
    'soy un array',
    'coso'
];

Session::set('sadjas', $pepito);

dd($_SESSION);