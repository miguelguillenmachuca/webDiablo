<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Crear una guía</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Hoja de estilos personalizada -->
  <link href="css/estilos.less" rel="stylesheet/less" type="text/css" />
  <script src="css/less.min.js" type="text/javascript"></script>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>
</head>
<body>
  <div id="wrapper">
    <?php
    // Retomo la sesión
    session_start();
    // Inserción del header
    include "header.php"
    ?>

    <div id="main" class="container">
      <h3 class="text-center">Elige una clase</h3>

      <div class="row margen-inf">
        <div class="col-xs-6 col-sm-5 contenedor margen-sup">
          <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-2">
              <img src="img/default_img.png" alt="imagen" class="img-responsive">
            </div>
            <div class="col-xs-8 col-sm-9 col-md-10">
              <h4><a href="formularioCrearGuia.php?clase=1" class="enlace-guia">Clase</a></h4>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-5 col-sm-offset-2 contenedor margen-sup">
          <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-2">
              <img src="img/default_img.png" alt="imagen" class="img-responsive">
            </div>
            <div class="col-xs-8 col-sm-9 col-md-10">
              <h4><a href="formularioCrearGuia.php?clase=1" class="enlace-guia">Clase</a></h4>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-5 contenedor margen-sup">
          <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-2">
              <img src="img/default_img.png" alt="imagen" class="img-responsive">
            </div>
            <div class="col-xs-8 col-sm-9 col-md-10">
              <h4><a href="formularioCrearGuia.php?clase=1" class="enlace-guia">Clase</a></h4>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-5 col-sm-offset-2 contenedor margen-sup">
          <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-2">
              <img src="img/default_img.png" alt="imagen" class="img-responsive">
            </div>
            <div class="col-xs-8 col-sm-9 col-md-10">
              <h4><a href="formularioCrearGuia.php?clase=1" class="enlace-guia">Clase</a></h4>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-5 contenedor margen-sup">
          <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-2">
              <img src="img/default_img.png" alt="imagen" class="img-responsive">
            </div>
            <div class="col-xs-8 col-sm-9 col-md-10">
              <h4><a href="formularioCrearGuia.php?clase=1" class="enlace-guia">Clase</a></h4>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-5 col-sm-offset-2 contenedor margen-sup">
          <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-2">
              <img src="img/default_img.png" alt="imagen" class="img-responsive">
            </div>
            <div class="col-xs-8 col-sm-9 col-md-10">
              <h4><a href="formularioCrearGuia.php?clase=1" class="enlace-guia">Clase</a></h4>
            </div>
          </div>
        </div>


      </div>

    </div> <!-- Fin del div main -->

    <?php
    // Inserción del footer
    include "footer.php";
    ?>
  </div>
</body>
</html>
