<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Ver las guías</title>

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
      <form id="filtrosBusqueda" name="filtrosBusqueda" action="listaGuias.php" method="get">
        <div class="container-fluid contenedor">
          <h3 class="text-center">Filtros</h3>
          <div class="row">
            <div class="col-xs-12 col-md-4 form-group" id="filtroNombre">
              <label for="nombre">Nombre de la guía</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la guía">
            </div> <!-- Fin del div filtroNombre -->

            <div class="col-xs-12 col-md-4 form-group" id="filtroAutor">
              <label for="autorGuia">Autor de la guía</label>
              <input type="text" class="form-control" id="autorGuia" name="autorGuia" placeholder="Autor de la guía">
            </div> <!-- Fin del div filtroAutor -->

            <div class="col-xs-12 col-md-4 form-group" id="filtroClase">
              <label for="clase">Clase de la guía</label>
              <select class="form-control" name="clase" id="clase">
                  <option>Elige una clase</option>
                  <option value="1">Clase 1</option>
              </select>
            </div> <!-- Fin del div filtroClase -->

            <div class="col-xs-12 col-md-4 form-group" id="filtroFecha">
              <label for="clase">Posterior a fecha:</label>
              <input type="date" class="form-control datepicker" id="fechaGuia" name="fechaGuia">
            </div> <!-- Fin del div filtroClase -->

          </div> <!-- Fin del div row -->

        </div> <!-- Fin del div container-fluid contenedor -->
      </form>

    </div> <!-- Fin del div main -->

    <?php
    // Inserción del footer
    include "footer.php";
    ?>
  </div>
</body>
</html>
