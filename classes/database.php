<?php

 class Database
{
    private $imagen;

    public function __construct($imagen)
    {
        $this->imagen = $imagen;
    }

public function crearAvatar($imagen)
  {
    $nombre = $imagen["avatar"]["name"];
    $ext = pathinfo($nombre,PATHINFO_EXTENSION);
    $archivoOrigen = $imagen["avatar"]["tmp_name"];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino."/imagenesUsuarios/";
    $avatarUsuario = uniqid();
    $archivoDestino = $archivoDestino.$avatarUsuario;
    $archivoDestino = $archivoDestino.".".$ext;
    move_uploaded_file($archivoOrigen,$archivoDestino);
    $avatarUsuario = $avatarUsuario.".".$ext;
    return $avatarUsuario;
    }


public function guardar($usuario)
 {
    $jsonUsuario = json_encode($usuario);
    file_put_contents('usuarios.json', $jsonUsuario. PHP_EOL, FILE_APPEND);
 }



public function buscaBase()
{
    $datosjson = file_get_contents("usuarios.json");
    $datosjson = explode(PHP_EOL,$datosjson);
    array_pop($datosjson);
    foreach ($datosjson as  $usuario) {
    $baseDatosUsuarios[]= json_decode($usuario,true);
        }
    return $baseDatosUsuarios;
}


public function emailExiste($email)
{
    $baseDatosUsuarios = buscaBase();
    
    foreach ($baseDatosUsuarios as $usuario){
    if($usuario["email"] === $email){
    return $usuario;
        }
            }
    return null;
}

public function estaRegistrado($name){
    $baseDatosUsuarios = buscaBase();
   
    foreach ($baseDatosUsuarios as $usuario){
        if($usuario["name"] === $name){
            return $usuario;
        }
    }
    return null;
}


    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

    }
}