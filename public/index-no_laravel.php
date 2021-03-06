<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bienvenido a [Nombre en trámite]</title>

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
      <h2 class="text-center">TOP GUÍAS POR CLASE</h2>

      <div class="container-fluid contenedor-top-guia">
        <h3 class="text-center">Bárbaro</h3>
        <div class="row">
          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

        </div> <!-- Fin del div row -->
      </div> <!-- Fin del div contenedor-top-guia -->

      <div class="container-fluid contenedor-top-guia">
        <h3 class="text-center">Cazador de demonios</h3>
        <div class="row">
          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

        </div> <!-- Fin del div row -->
      </div> <!-- Fin del div contenedor-top-guia -->

      <div class="container-fluid contenedor-top-guia">
        <h3 class="text-center">Cruzado</h3>
        <div class="row">
          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

        </div> <!-- Fin del div row -->
      </div> <!-- Fin del div contenedor-top-guia -->

      <div class="container-fluid contenedor-top-guia">
        <h3 class="text-center">Mago</h3>
        <div class="row">
          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

        </div> <!-- Fin del div row -->
      </div> <!-- Fin del div contenedor-top-guia -->

      <div class="container-fluid contenedor-top-guia">
        <h3 class="text-center">Médico brujo</h3>
        <div class="row">
          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

        </div> <!-- Fin del div row -->
      </div> <!-- Fin del div contenedor-top-guia -->

      <div class="container-fluid contenedor-top-guia">
        <h3 class="text-center">Monje</h3>
        <div class="row">
          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

          <div class="resumen-guia col-xs-12 col-md-4">
            <div class="row">
              <div class="col-xs-3">
                <img src="img/default_img.png" class="img-clase-resumen" alt="img-clase">
              </div>

              <div class="col-xs-9">
                <h4><a href="verGuia.php?cod_guia=" class="enlace-guia">Título de la guía</a></h4>
                <p>de: <a class="enlace-usuario">Creador</a></p>
              </div>

              <div class="col-xs-12">
                <div class="row resumen-habilidades">
                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad1">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad2">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad3">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad4">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad5">
                  </div>

                  <div class="col-xs-4 col-sm-2">
                    <img src="img/default_img.png" class="img-habilidad-resumen img-responsive" alt="habilidad6">
                  </div>
                </div> <!-- Fin del div row resumen-habilidades -->
              </div> <!-- Fin del div col -->

              <div class="col-xs-12 resumen-guia-info">
                <p><span class="glyphicon glyphicon-thumbs-up likes">80</span> Última edición: <span>24/05/2017</span></p>
              </div> <!-- Fin del div resumen-guia-info -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div resumen-guia -->

        </div> <!-- Fin del div row -->
      </div> <!-- Fin del div contenedor-top-guia -->
    </div> <!-- Fin del div main -->

    <?php
    // Inserción del footer
    include "footer.php";
    ?>
  </div>
</body>
</html>
