<?php 
include_once("controladores/funciones.php");
if($_POST){
    $usuario = estaRegistrado($_POST["name"]);
  
    if($usuario == null){
      $errores["name"]="Alguno de los datos no es correcto"; //les meti el mismo mensaje para que no comprometer los datos del usuario
    } 
      if(password_verify($_POST["pass"], $usuario["pass"])===false){
        $errores["pass"]= "Alguno de los datos no es correcto";
      }
      
      if(!isset($errores)){ //si NO esta seteado $errores va a ir a tu perfil
    iniciarSesion($usuario, $_POST);
    header("location: bienvenida.php");
  }
  }


?> 

<?php include_once 'includes/__head.php'; ?>

    <body>

      <!-- AQUI EMPIEZA EL NAV -->

<?php include_once 'includes/__nav.php'; ?>

      <!-- AQUI TERMINA EL NAV -->

        <main class="login">
          <div class="cajita">
         
            <h1>Inicio sesion!</h1>
            <?php
      if(isset($errores)):?>
        <ul class="alert alert-danger">
          <?php
          foreach ($errores as $key => $value) :?>
            <li> <?=$value;?> </li>
            <?php endforeach;?>
        </ul>
      <?php endif;?>
            <form action="" method="POST">
                <input class="inputLogin" type="text" name="name" placeholder="Usuario" value="<?=(isset($errores["name"])) ?  "" : inputUser("name");?>" placeholder="Nombre de usuario...">
                <a href="#">Olvidó su nombre de usuario?</a>
                <input class="inputLogin" type="password" name="pass" placeholder="Contraseña">
                <a href="#">Olvidó su contraseña?</a>
                <p>Recordarme<input class="inputLogin" class="check" type="checkbox" name="remember"></p>
                <button class="submitLogin" type="submit">Enviar</button>
            </form>
            </div>
        </main>

      <!-- AQUI EMPIEZA EL FOOTER -->

<?php include_once 'includes/__footer.php'; ?>

      <!-- AQUI TERMINA EL FOOTER -->

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>
