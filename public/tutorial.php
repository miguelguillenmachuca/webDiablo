<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>¿Cómo hacer uso de la página?</title>

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

    </div> <!-- Fin del div main -->

    <?php
    // Inserción del footer
    include "footer.php";
    ?>
  </div>
</body>
</html>
