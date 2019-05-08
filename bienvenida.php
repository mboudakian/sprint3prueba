<?php
include_once("controladores/funciones.php");
if(!isset($_SESSION["name"])){
    header("location:login.php");
}
?>

<?php include_once 'includes/__head.php'; ?>

<body>
  <!-- AQUI EMPIEZA EL NAV -->

  <?php if (count($_SESSION) != 0)
{
    include 'includes/__nav_logged.php';
} else {
    include 'includes/__nav.php';
}
 ?>

<!-- AQUI TERMINA EL NAV -->

<!--CUERPO DE BIENVENIDA-->
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="imagenesUsuarios/<?=$_SESSION["avatar"];?>" alt="foto usuario"> <!--aca embebo la foto de perfil del usuario en la carta-->
  <div class="card-body">
    <p class="card-text">Bienvenid@ <?=$_SESSION["name"];?></p>
    <h6><a href = "logout.php">Cerrar sesion</a></h6> <!-- aca es el link de cerrar sesion -->
  </div>
</div>
<!--FIN CUERPO BIENVENIDA-->

<!-- AQUI EMPIEZA EL FOOTER -->

<?php include_once 'includes/__footer.php'; ?>

  <!-- AQUI TERMINA EL FOOTER -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>