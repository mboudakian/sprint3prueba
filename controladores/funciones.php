<?php
//Iniciar session.
session_start(); 

//Función DD (echo) 
function dd($valor){
    echo "<pre>";
        var_dump($valor);
        exit;
    echo "</pre>";
}

function validar($datos){
    $errores = [];               //Creo la variable errores.

    if(isset($datos["name"])){
        $nombre = trim($datos["name"]);//Trimeo el campo nombre.
    if($datos['name'] === ""){ 
        $errores['name'] = "El usuario es obligatorio";
    }
}
    if(isset($datos['email'])){
    $email = trim($datos['email']);
    if ($datos['email'] === "" || !filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = "El email no es valido";
      }
    }
    $contraseña = trim($datos['pass']);
    if(empty($datos['pass'])){
        $errores['pass'] = "La contraseña es obligatoria.";
    }elseif (strlen($contraseña) < 6 || (strlen($contraseña) > 22)){
        $errores['pass'] = "La contraseña debe tener entre 6 y 22 caracteres.";
    }
    elseif (!preg_match('`[a-z]`',$contraseña) || !preg_match('`[A-Z]`',$contraseña)  || !preg_match('`[0-9]`', $datos['pass'])){ /*Se pone || para que corra todas las condiciones y no solo una. Si pongo && y cumple la primera las otras no corren.*/
        $errores['pass'] = "La contraseña debe tener al menos una letra minúscula, una mayúscula y un número";
    }
    if(isset($datos['pass-ver'])){
    $recontraseña = trim($datos['pass-ver']);
    if($datos['pass'] != $datos['pass-ver']){
        $errores['pass-ver'] = "Las contraseñas no coinciden.";
    }
}

    $hoy = getdate();
    $hoyY=$hoy["year"];
    $mayor=$hoyY-18;
    if($datos['DOBYear'] === null){
        $errores['DOBYear'] = "Ingrese su fecha de nacimiento por favor";
    }
    elseif($datos['DOBYear'] > $mayor){
        $errores['DOBYear'] = "Por políticas de la empresa, sólo se habilitan usuarios mayores de edad";
    }
     //validacion de la edad.
    if(count($_FILES)!=0){
        if($_FILES["avatar"]["error"]!=0){
            $errores["avatar"]="Por favor seleccione una foto de perfil";
        }
        $nombre = $_FILES["avatar"]["name"];
        $ext = pathinfo($nombre,PATHINFO_EXTENSION);
        if($ext != "png" && $ext != "jpg"){
            $errores["avatar"]="La imagen seleccionada debe ser jpg o png";
        }
            
    }

    //validacion de registro con usuario existente

    if(estaRegistrado($_POST["name"]) !== null){
        $errores["name"] = "El usuario ya se encuentra en uso";
    }
    if(emailExiste($_POST["email"]) !== null){
        $errores["email"] = "El email ya se encuentra en uso";
    }
   
    return $errores;
}
//persistencia de datos
function inputUser($input){ 
    if(isset($_POST[$input])){
        return $_POST[$input];
    }
}
//guardar en la carpeta de imagenes de usuario
function crearAvatar($imagen){
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
//Armo el registo del Usuario en un array.
function nuevoRegistro($datos, $imagen){
    $usuario=[
        "name"=>$datos["name"],
        "email"=>$datos["email"],
        "pass"=> password_hash($datos["pass"],PASSWORD_DEFAULT),
        "avatar" => $imagen
    ];
    return $usuario;
}

function guardar($usuario){
    $jsonUsuario = json_encode($usuario);
    file_put_contents('usuarios.json', $jsonUsuario. PHP_EOL, FILE_APPEND);
}

//validacion de registro en el login
function estaRegistrado($name){
    $baseDatosUsuarios = buscaBase();
   
    foreach ($baseDatosUsuarios as $usuario){
        if($usuario["name"] === $name){
            return $usuario;
        }
    }
    return null;
}
//funcion para ver si el email existe no deje volver a registrarse con el mismo
function emailExiste($email){
    $baseDatosUsuarios = buscaBase();
   
    foreach ($baseDatosUsuarios as $usuario){
        if($usuario["email"] === $email){
            return $usuario;
        }
    }
    return null;
}



function buscaBase(){
    $datosjson = file_get_contents("usuarios.json");
    $datosjson = explode(PHP_EOL,$datosjson);
    array_pop($datosjson);
    foreach ($datosjson as  $usuario) {
        $baseDatosUsuarios[]= json_decode($usuario,true);
    }
    return $baseDatosUsuarios;
}


function iniciarSesion($usuario, $datos){
    $_SESSION["name"]=$usuario["name"];
    $_SESSION["email"]=$usuario["email"];
    $_SESSION["avatar"]=$usuario["avatar"];
    if(isset($datos["remember"])){
        setcookie("pass", $datos["pass"], time()+86400);
    } 
}