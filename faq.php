<?php
/* include_once("controladores/funciones.php");
if(!isset($_SESSION["name"])){
    header("location:login.php");
} */

include_once("controladores/funciones.php");

?>

<?php include_once 'includes/__head.php'; ?>

    <body>

      <!-- AQUI EMPIEZA EL NAV -->

<?php 
if (count($_SESSION) != 0)
{
    include 'includes/__nav_logged.php';
} else {
    include 'includes/__nav.php';
}

 ?>

      <!-- AQUI TERMINA EL NAV -->

        <main class="faq">
          <div class="cajita3">
          </div>

           <h1>Preguntas Frecuentes</h1>

            <div class="boxes">
                <div class="left">
                    <h3>¿Qué servicios ofrece el sito web y cuánto cuestan?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                        ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
                        nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                        Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim
                        justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu
                        pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum
                        semper nisi. Aenean vulputate eleifend tellus.</p>

                    <h3>¿Cómo funciona el intercambio de objetos?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                    dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
                    nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                    Donec pede justo, fringilla vel, aliquet nec.</p>

                        <h3>¿Puedo realizar una compra en vez de un trueque?</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                        ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
                        nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                        Donec pede justo, fringilla vel, aliquet nec. Aenean leo ligula, porttitor eu,
                        consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra
                        quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas
                        tempus, tellus eget</p>

                    <h3>¿Cómo realizar una denuncia?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                        ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                        dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
                        nec, pellentesque eu, pretium quis, sem.</p>
                </div>
                <div class="right">
                    <h3>¿Cómo reconocer a un usuario destacado?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                    dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
                    nec, pellentesque eu, pretium quis, sem.</p>

                    <h3>Penalidades</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                    dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
                    nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                    Donec pede justo, fringilla vel, aliquet nec. Cum sociis natoque penatibus
                    et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                    ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                    quis enim. Donec pede justo, fringilla vel, aliquet nec. Aenean leo ligula,
                    porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in,
                    viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                    laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue.
                    Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus,
                    tellus eget</p>

                    <h3>Restricciones</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                    dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
                    nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                    Donec pede justo, fringilla vel, aliquet nec. Aenean leo ligula, porttitor eu,
                    consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra
                    quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.
                    Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas
                    tempus, tellus eget </p>
                </div>
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
