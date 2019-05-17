<?php

 class Database
{
    private $archivoJson;

    public function __construct($archivoJson)
    {
        $this->archivoJson = $archivoJson;
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
        $usuario=[
            "name"=>$usuario->getUserName(),
            "email"=>$usuario->getEmail(),
            "pass"=> password_hash($usuario->getPassword(),PASSWORD_DEFAULT),
            "avatar" => $usuario->getAvatar()
        ];
        $jsonUsuario = json_encode($usuario);
        file_put_contents($this->archivoJson, $jsonUsuario. PHP_EOL, FILE_APPEND);
    }



    public function buscaBase()
    {
        $baseDatosUsuarios = [];
        $datosjson = file_get_contents($this->archivoJson);
        $datosjson = explode(PHP_EOL,$datosjson);
        array_pop($datosjson);

        foreach ($datosjson as  $usuario) {
            $baseDatosUsuarios[]= json_decode($usuario,true);
        
        }

        return $baseDatosUsuarios;
    }


    public function search($name)
    {
        $database = $this->buscaBase();
        foreach($database as $user) {
            if($user['name'] == $name) {
                return $user;
            }
        }
  
        return false;
  
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