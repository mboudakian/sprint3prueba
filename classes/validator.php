<?php

class Validator
{
    public function validate(User $user, $db , string $cpassword = "")
    {
        $errores = array();
        if($user->getUserName() !== ""){
            $nombre = trim($user->getUserName());//Trimeo el campo nombre.
         }
        if($user->getUserName() == ""){ 
        $errores['name'] = "El usuario es obligatorio";
        }
        if($user->getEmail() !== ""){
        $email = trim($user->getEmail());
        }
        if ($user->getEmail() === "" || !filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "El email no es valido";
          }
        $contraseña = trim($user->getPassword());
        if(empty($user->getPassword())){
            $errores['pass'] = "La contraseña es obligatoria.";
        }elseif (strlen($contraseña) < 6 || (strlen($contraseña) > 22)){
            $errores['pass'] = "La contraseña debe tener entre 6 y 22 caracteres.";
        }
        elseif (!preg_match('`[a-z]`',$contraseña) || !preg_match('`[A-Z]`',$contraseña)  || !preg_match('`[0-9]`', $user->getPassword())){ //Se pone || para que corra todas las condiciones y no solo una. Si pongo && y cumple la primera las otras no corren./
            $errores['pass'] = "La contraseña debe tener al menos una letra minúscula, una mayúscula y un número";
        }
        if(isset($cpassword)){
        $recontraseña = trim($cpassword);
        if($user->getPassword() != $cpassword){
            $errores['pass-ver'] = "Las contraseñas no coinciden.";
        }
    }
    
       
        
        if($_POST['DOBYear'] === 'Year'){
            $errores['DOBYear'] = "Ingrese su fecha de nacimiento por favor";
            
        }
        if(date('Y') - intval($_POST['DOBYear']) < 18){
            
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
    
        if($this->estaRegistrado($_POST["name"], $db) !== null){
            $errores["name"] = "El usuario ya se encuentra en uso";
        }
        if($this->emailExiste($_POST["email"], $db) !== null){
            $errores["email"] = "El email ya se encuentra en uso";
        } 
       
        return $errores;
}

public function emailExiste($email, $db)
{
    $baseDatosUsuarios = $db->buscaBase();
    
    foreach ($baseDatosUsuarios as $usuario) {
        if($usuario["email"] === $email) {
            return $usuario;
        }
    }
    
    return null;
}

public function estaRegistrado($name, Database $db){ //es de otro objeto el metodo buscabase() por eso le paso $db
    $baseDatosUsuarios = $db->buscaBase();
   
    foreach ($baseDatosUsuarios as $usuario){
        if($usuario["name"] === $name){
            return $usuario;
        }
    }
    return null;
}


//VALIDADOR DE LOGIN!

public function validateLogin(User $user, $db)
{
    $errores = array();

    if($this->estaRegistrado($_POST["name"], $db) == null){
        $errores['name'] = "Datos incorrectos";
    }
    if($_POST["name"] == null){
        $errores['pass'] = "No deje el campo vacio";
    }
    if($_POST["pass"] == null){
        $errores['pass'] = "No deje el campo vacio";
    }
    if(password_verify($_POST["pass"], $user->getPassword())===false){
        $errores["pass"]= "Alguno de los datos no es correcto";
      }


    return $errores;
}
}