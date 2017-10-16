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
      <h3 class="text-center">Introduzca los datos de la guía</h3>

      <form name="formGuia" id="formGuia" class="" action="formularioCrearGuia.php" method="post">
        <div class="container-fluid">
          <div class="form-group">
            <label for="nombreGuia" class="text-center"><h4>Nombre de la guía</h4></label>
            <input type="text" class="form-control" id="nombreGuia" name="nombreGuia" placeholder="Nombre de la guía">
          </div>

          <h4 class="text-center">Habilidades y runas</h4>
          <div id="seccionHabilidades" class="row">
            <div class="form-group col-xs-6 col-md-4" id="seccionHabilidad1">
              <div class="row">
                <div class="col-xs-12">
                  <select class="form-control" name="habilidad1" id="habilidad1">
                    <option>Elige una habilidad</option>
                    <option value="1">Habilidad 1</option>
                  </select>
                </div>

                <div class="margen-sup col-xs-offset-1 col-xs-10">
                  <select class="form-control" name="runa1" id="runa1">
                    <option>Elige una runa</option>
                    <option value="1">Runa 1</option>
                  </select>
                </div>
              </div>
            </div> <!-- Fin del div seccionHabilidad1 -->

            <div class="form-group col-xs-6 col-md-4" id="seccionHabilidad2">
              <div class="row">
                <div class="col-xs-12">
                  <select class="form-control" name="habilidad2" id="habilidad2">
                    <option>Elige una habilidad</option>
                    <option value="1">Habilidad 1</option>
                  </select>
                </div>

                <div class="margen-sup col-xs-offset-1 col-xs-10">
                  <select class="form-control" name="runa2" id="runa2">
                    <option>Elige una runa</option>
                    <option value="1">Runa 1</option>
                  </select>
                </div>
              </div>
            </div> <!-- Fin del div seccionHabilidad2 -->

            <div class="form-group col-xs-6 col-md-4" id="seccionHabilidad3">
              <div class="row">
                <div class="col-xs-12">
                  <select class="form-control" name="habilidad3" id="habilidad3">
                    <option>Elige una habilidad</option>
                    <option value="1">Habilidad 1</option>
                  </select>
                </div>

                <div class="margen-sup col-xs-offset-1 col-xs-10">
                  <select class="form-control" name="runa3" id="runa3">
                    <option>Elige una runa</option>
                    <option value="1">Runa 1</option>
                  </select>
                </div>
              </div>
            </div> <!-- Fin del div seccionHabilidad3 -->

            <div class="form-group col-xs-6 col-md-4" id="seccionHabilidad4">
              <div class="row">
                <div class="col-xs-12">
                  <select class="form-control" name="habilidad4" id="habilidad4">
                    <option>Elige una habilidad</option>
                    <option value="1">Habilidad 1</option>
                  </select>
                </div>

                <div class="margen-sup col-xs-offset-1 col-xs-10">
                  <select class="form-control" name="runa4" id="runa4">
                    <option>Elige una runa</option>
                    <option value="1">Runa 1</option>
                  </select>
                </div>
              </div>
            </div> <!-- Fin del div seccionHabilidad4 -->

            <div class="form-group col-xs-6 col-md-4" id="seccionHabilidad5">
              <div class="row">
                <div class="col-xs-12">
                  <select class="form-control" name="habilidad5" id="habilidad5">
                    <option>Elige una habilidad</option>
                    <option value="1">Habilidad 1</option>
                  </select>
                </div>

                <div class="margen-sup col-xs-offset-1 col-xs-10">
                  <select class="form-control" name="runa5" id="runa5">
                    <option>Elige una runa</option>
                    <option value="1">Runa 1</option>
                  </select>
                </div>
              </div>
            </div> <!-- Fin del div seccionHabilidad5 -->

            <div class="form-group col-xs-6 col-md-4" id="seccionHabilidad6">
              <div class="row">
                <div class="col-xs-12">
                  <select class="form-control" name="habilidad6" id="habilidad6">
                    <option>Elige una habilidad</option>
                    <option value="1">Habilidad 1</option>
                  </select>
                </div>

                <div class="margen-sup col-xs-offset-1 col-xs-10">
                  <select class="form-control" name="runa6" id="runa6">
                    <option>Elige una runa</option>
                    <option value="1">Runa 1</option>
                  </select>
                </div>
              </div> <!-- Fin del div row -->
            </div> <!-- Fin del div seccionHabilidad6 -->
          </div> <!-- Fin del div seccionHabilidades -->

          <h4 class="text-center">Pasivas</h4>
          <div class="row" id="seccionPasivas">
            <div class="form-group col-xs-6 col-md-3" id="seccionPasiva1">
              <select class="form-control" name="pasiva1" id="pasiva1">
                <option>Elige una pasiva</option>
                <option value="1">Pasiva 1</option>
              </select>
            </div> <!-- Fin del div seccionPasiva1 -->

            <div class="form-group col-xs-6 col-md-3" id="seccionPasiva2">
              <select class="form-control" name="pasiva2" id="pasiva2">
                <option>Elige una pasiva</option>
                <option value="1">Pasiva 1</option>
              </select>
            </div> <!-- Fin del div seccionPasiva2 -->

            <div class="form-group col-xs-6 col-md-3" id="seccionPasiva3">
              <select class="form-control" name="pasiva3" id="pasiva3">
                <option>Elige una pasiva</option>
                <option value="1">Pasiva 1</option>
              </select>
            </div> <!-- Fin del div seccionPasiva3 -->

            <div class="form-group col-xs-6 col-md-3" id="seccionPasiva4">
              <select class="form-control" name="pasiva4" id="pasiva4">
                <option>Elige una pasiva</option>
                <option value="1">Pasiva 1</option>
              </select>
            </div> <!-- Fin del div seccionPasiva4 -->
          </div> <!-- Fin del div seccionHabilidades -->

          <h4 class="text-center">Objetos</h4>
          <div class="row" id="seccionObjetos">
            <div class="form-group col-xs-6 col-md-2" id="seccionCabeza">
              <label for="cabeza">Cabeza</label>
              <select class="form-control" name="cabeza" id="cabeza">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>
            </div> <!-- Fin del div seccionCabeza -->

            <div class="form-group col-xs-6 col-md-2" id="seccionHombros">
              <label for="hombros">Hombros</label>
              <select class="form-control" name="hombros" id="hombros">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>
            </div> <!-- Fin del div seccionHombros -->

            <div class="form-group col-xs-6 col-md-2" id="seccionAmuleto">
              <label for="amuleto">Amuleto</label>
              <select class="form-control" name="amuleto" id="amuleto">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>
            </div> <!-- Fin del div seccionAmuleto -->

            <div class="form-group col-xs-6 col-md-2" id="seccionTorso">
              <label for="torso">Torso</label>
              <select class="form-control" name="torso" id="torso">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>
            </div> <!-- Fin del div seccionTorso -->

            <div class="form-group col-xs-6 col-md-2" id="seccionManos">
              <label for="manos">Manos</label>
              <select class="form-control" name="manos" id="manos">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>
            </div> <!-- Fin del div seccionManos -->

            <div class="form-group col-xs-6 col-md-2" id="seccionMunecas">
              <label for="munecas">Muñecas</label>
              <select class="form-control" name="munecas" id="munecas">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>
            </div> <!-- Fin del div seccionMunecas -->

            <div class="form-group col-xs-6 col-md-2" id="seccionAnillos">
              <label for="anillo1">Anillos</label>
              <select class="form-control" name="anillo1" id="anillo1">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>

              <br>

              <select class="form-control" name="anillo2" id="anillo2">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>
            </div> <!-- Fin del div seccionAnillos -->

            <div class="form-group col-xs-6 col-md-2" id="seccionCintura">
              <label for="cintura">Cintura</label>
              <select class="form-control" name="cintura" id="cintura">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>
            </div> <!-- Fin del div seccionCintura -->

            <div class="form-group col-xs-6 col-md-2" id="seccionPiernas">
              <label for="piernas">Piernas</label>
              <select class="form-control" name="piernas" id="piernas">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>
            </div> <!-- Fin del div seccionPiernas -->

            <div class="form-group col-xs-6 col-md-2" id="seccionPies">
              <label for="pies">Pies</label>
              <select class="form-control" name="pies" id="pies">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>
            </div> <!-- Fin del div seccionPies -->

            <div class="form-group col-xs-6 col-md-2" id="seccionArma">
              <label for="arma">Arma</label>
              <select class="form-control" name="arma" id="arma">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>
            </div> <!-- Fin del div seccionArma -->

            <div class="form-group col-xs-6 col-md-2" id="seccionManoIzquierda">
              <label for="Mano izquierda">Mano izquierda</label>
              <select class="form-control" name="Mano izquierda" id="Mano izquierda">
                <option>Elige un objeto</option>
                <option value="1">Objeto 1</option>
              </select>
            </div> <!-- Fin del div seccionManoIzquierda -->

          </div> <!-- Fin del div seccionObjetos -->

          <div class="row" id="seccionCuboGemas">
            <div class="col-xs-12 col-md-9" id="seccionCubo">
              <h4 class="text-center">Cubo de Kanai</h4>
              <div class="row">
                <div class="col-xs-12 col-md-4 form-group" id="seccionCubo1">
                  <select class="form-control" name="cubo1" id="cubo1">
                    <option>Elige un objeto</option>
                    <option value="1">Objeto 1</option>
                  </select>
                </div> <!-- Fin del div seccionCubo1 -->

                <div class="col-xs-12 col-md-4 form-group" id="seccionCubo2">
                  <select class="form-control" name="cubo2" id="cubo2">
                    <option>Elige un objeto</option>
                    <option value="1">Objeto 1</option>
                  </select>
                </div> <!-- Fin del div seccionCubo2 -->

                <div class="col-xs-12 col-md-4 form-group" id="seccionCubo3">
                  <select class="form-control" name="cubo3" id="cubo3">
                    <option>Elige un objeto</option>
                    <option value="1">Objeto 1</option>
                  </select>
                </div> <!-- Fin del div seccionCubo3 -->
              </div> <!-- Fin del div row -->
            </div> <!-- Fin del div seccionCubo -->

            <div class="col-xs-12 col-md-3" id="seccionGemas">
              <h4 class="text-center">Gemas legendarias</h4>
              <div class="row">
                <div class="col-xs-12 form-group" id="seccionGema1">
                  <select class="form-control" name="cubo1" id="cubo1">
                    <option>Elige una gema</option>
                    <option value="1">Gema 1</option>
                  </select>
                </div> <!-- Fin del div seccionGema1 -->

                <div class="col-xs-12 form-group" id="seccionGema2">
                  <select class="form-control" name="cubo2" id="cubo2">
                    <option>Elige una gema</option>
                    <option value="1">Gema 1</option>
                  </select>
                </div> <!-- Fin del div seccionGema2 -->

                <div class="col-xs-12 form-group" id="seccionGema3">
                  <select class="form-control" name="cubo3" id="cubo3">
                    <option>Elige una gema</option>
                    <option value="1">Gema 1</option>
                  </select>
                </div> <!-- Fin del div seccionGema3 -->
              </div> <!-- Fin del div row -->
            </div> <!-- Fin del div seccionGemas -->
          </div> <!-- Fin del div seccionCuboGemas -->



        </div>
      </form>
    </div> <!-- Fin del div main -->

    <?php
    // Inserción del footer
    include "footer.php";
    ?>
  </div>
</body>
</html>
