@extends('layouts.app')

@section('content')
  <div id="main" class="container">

    <form name="formGuia" id="formGuia" class="formGuia" action="formularioCrearGuia.php" method="post">
      <h2 class="text-center">Introduzca los datos de la guía</h2>
      <div class="container-fluid">

        <div class="row padd-sup" id="seccionNombre">
          <div class="col-xs-12">
            <div class="form-group">
              <h3 class="text-center"><label for="nombreGuia">Nombre de la guía</label></h3>
              <p class="help-block">Incluye un nombre para la guía que sea fácilmente reconocible.</p>
              <input type="text" class="form-control" name="nombreGuia" placeholder="Nombre de la guía">
            </div>
          </div>
        </div>

        <div class="separador"></div>

        <div class="row padd-sup" id="seccionHabilidades">
          <div class="col-xs-12">
            <h3 class="text-center bold">Habilidades y runas</h3>
            <p class="help-block">Elige las habilidades y las correspondientes runas que usará tu personaje</p>
            <div class="row">
              <div class="form-group col-xs-6 col-md-4 contenedor-seccion" id="seccionHabilidad1">
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

              <div class="form-group col-xs-6 col-md-4 contenedor-seccion" id="seccionHabilidad2">
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

              <div class="form-group col-xs-6 col-md-4 contenedor-seccion" id="seccionHabilidad3">
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

              <div class="form-group col-xs-6 col-md-4 contenedor-seccion" id="seccionHabilidad4">
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

              <div class="form-group col-xs-6 col-md-4 contenedor-seccion" id="seccionHabilidad5">
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

              <div class="form-group col-xs-6 col-md-4 contenedor-seccion" id="seccionHabilidad6">
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
          </div>
        </div>

        <div class="separador"></div>

        <div class="row padd-sup" id="seccionPasivas">
          <div class="col-xs-12">
            <h3 class="text-center bold">Habilidades pasivas</h3>
            <p class="help-block">Indica las habilidades pasivas que tendrá el personaje. Recuerda que no todos los personajes están al nivel máximo, así que no es necesario que incluyas las 4 pasivas.</p>
            <div class="row">
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
          </div>
        </div>

        <div class="separador"></div>

        <div class="row padd-sup" id="seccionEquipamiento">
          <div class="col-xs-12">
            <h3 class="text-center bold">Equipamiento</h3>
            <p class="help-block">Escoge los objetos, mejoras del cubo de Kanai y las gemas legendarias que tu personaje llevará equipadas.</p>

            <div class="row row-eq-height">
              <div class="col-xs-12 col-md-9 contenedor-seccion" id="seccionObjetos">
                <h4 class="text-center">Objetos</h4>
                <div class="row">
                  <div class="form-group col-xs-6 col-md-4" id="seccionCabeza">
                    <label for="cabeza">Cabeza</label>
                    <select class="form-control" name="cabeza" id="cabeza">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionCabeza -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionHombros">
                    <label for="hombros">Hombros</label>
                    <select class="form-control" name="hombros" id="hombros">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionHombros -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionAmuleto">
                    <label for="amuleto">Amuleto</label>
                    <select class="form-control" name="amuleto" id="amuleto">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionAmuleto -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionTorso">
                    <label for="torso">Torso</label>
                    <select class="form-control" name="torso" id="torso">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionTorso -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionManos">
                    <label for="manos">Manos</label>
                    <select class="form-control" name="manos" id="manos">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionManos -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionMunecas">
                    <label for="munecas">Muñecas</label>
                    <select class="form-control" name="munecas" id="munecas">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionMunecas -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionAnillo1">
                    <label for="anillo1">Anillo</label>
                    <select class="form-control" name="anillo1" id="anillo1">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionAnillo1 -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionAnillo2">
                    <label for="anillo2">Anillo</label>
                    <select class="form-control" name="anillo2" id="anillo2">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionAnillo2 -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionCintura">
                    <label for="cintura">Cintura</label>
                    <select class="form-control" name="cintura" id="cintura">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionCintura -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionPiernas">
                    <label for="piernas">Piernas</label>
                    <select class="form-control" name="piernas" id="piernas">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionPiernas -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionPies">
                    <label for="pies">Pies</label>
                    <select class="form-control" name="pies" id="pies">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionPies -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionArma">
                    <label for="arma">Arma</label>
                    <select class="form-control" name="arma" id="arma">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionArma -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionManoIzquierda">
                    <label for="Mano izquierda">Mano izquierda</label>
                    <select class="form-control" name="Mano izquierda" id="Mano izquierda">
                      <option>Elige un objeto</option>
                      <option value="1">Objeto 1</option>
                    </select>
                  </div> <!-- Fin del div seccionManoIzquierda -->
                </div> <!-- Fin del div row -->
              </div> <!-- Fin del div seccionObjetos -->

              <div class="col-xs-12 col-md-3" id="seccionCuboGemas">
                <div class="row">
                  <div class="col-xs-12 contenedor-seccion full-container-height" id="seccionCubo">
                    <h4 class="text-center">Cubo de Kanai</h4>

                    <div class="row">
                      <div class="col-xs-12 form-group" id="seccionCubo1">
                        <select class="form-control" name="cubo1" id="cubo1">
                          <option>Elige un objeto</option>
                          <option value="1">Objeto 1</option>
                        </select>
                      </div> <!-- Fin del div seccionCubo1 -->

                      <div class="col-xs-12 form-group" id="seccionCubo2">
                        <select class="form-control" name="cubo2" id="cubo2">
                          <option>Elige un objeto</option>
                          <option value="1">Objeto 1</option>
                        </select>
                      </div> <!-- Fin del div seccionCubo2 -->

                      <div class="col-xs-12 form-group" id="seccionCubo3">
                        <select class="form-control" name="cubo3" id="cubo3">
                          <option>Elige un objeto</option>
                          <option value="1">Objeto 1</option>
                        </select>
                      </div> <!-- Fin del div seccionCubo3 -->
                    </div> <!-- Fin del div row -->
                  </div> <!-- Fin del div seccionCubo -->

                  <div class="col-xs-12 contenedor-seccion full-container-height" id="seccionGemas">
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
                </div> <!-- Fin del div row -->
              </div> <!-- Fin del div seccionCuboGemas -->
            </div> <!-- Fin del div seccionEquipamiento -->
          </div>
        </div>

        <div class="separador"></div>

        <div class="row padd-sup" id="seccionLeyenda">
          <div class="col-xs-12">
            <h2 class="text-center bold">Puntos de leyenda</h2>
          </div>

          <div class="col-xs-12 form-group" id="seccionLeyendaFormulario">
            <p class="help-block">Indica las prioridades de los puntos de leyenda, siendo 1 la máxima prioridad y 4 la menor. Puedes repetir el mismo número en una misma categoría si consideras que las prioridades son equivalentes.</p>
            <div class="row">
              <div class="col-xs-12 col-md-3 contenedor-seccion" id="seccionLeyendaPrimarios">
                <h4 class="text-center">Primarios</h4>
                <label for="estad_principal">Estadística principal</label>
                <select class="form-control" name="estad_principal" id="estad_principal">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="vitalidad">Vitalidad</label>
                <select class="form-control" name="vitalidad" id="vitalidad">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="v_movimiento">Velocidad de movimiento</label>
                <select class="form-control" name="v_movimiento" id="v_movimiento">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="recurso_max">Recurso máximo</label>
                <select class="form-control" name="recurso_max" id="recurso_max">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div> <!-- Fin del div seccionLeyendaPrimarios -->

              <div class="col-xs-12 col-md-3 contenedor-seccion" id="seccionLeyendaAtaque">
                <h4 class="text-center">Ataque</h4>
                <label for="v_ataque">Velocidad de ataque</label>
                <select class="form-control" name="v_ataque" id="v_ataque">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="reduccion_enfr">Reducción de enfriamiento</label>
                <select class="form-control" name="reduccion_enfr" id="reduccion_enfr">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="prob_golpe_crit">Probabilidad de golpe crítico</label>
                <select class="form-control" name="prob_golpe_crit" id="prob_golpe_crit">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="dano_golpe_crit">Daño de golpe crítico</label>
                <select class="form-control" name="dano_golpe_crit" id="dano_golpe_crit">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div> <!-- Fin del div seccionLeyendaAtaque -->

              <div class="col-xs-12 col-md-3 contenedor-seccion" id="seccionLeyendaDefensa">
                <h4 class="text-center">Defensa</h4>
                <label for="vida">Vida</label>
                <select class="form-control" name="vida" id="vida">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="armadura">Armadura</label>
                <select class="form-control" name="armadura" id="armadura">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="todas_resist">Todas las resistencias</label>
                <select class="form-control" name="todas_resist" id="todas_resist">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="regeneracion_vida">Regeneración de vida</label>
                <select class="form-control" name="regeneracion_vida" id="regeneracion_vida">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div> <!-- Fin del div seccionLeyendaDefensa -->

              <div class="col-xs-12 col-md-3 contenedor-seccion" id="seccionLeyendaUtilidad">
                <h4 class="text-center">Utilidad</h4>
                <label for="dano_area">Daño de área</label>
                <select class="form-control" name="dano_area" id="dano_area">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="reduc_coste">Reducción de coste</label>
                <select class="form-control" name="reduc_coste" id="reduc_coste">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="vida_por_golpe">Vida por golpe</label>
                <select class="form-control" name="vida_por_golpe" id="vida_por_golpe">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="hallazgo_oro">Hallazgo de oro</label>
                <select class="form-control" name="hallazgo_oro" id="hallazgo_oro">
                  <option>Elige una prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div> <!-- Fin del div seccionLeyendaUtilidad -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div seccionLeyendaFormulario -->
        </div> <!-- Fin del div seccionLeyenda -->

        <div class="separador"></div>

        <div class="form-group padd-sup" id="seccionDescripcion">
          <h4 class="text-center"><label for="descripcion_guia">Descripción de la guía</label></h4>
          <p class="help-block">Describe la forma de juego de esta guía o lo que necesites comentar. Máximo de 1000 caracteres</p>
          <textarea class="form-control no-resize" id="descripcion_guia" name="descripcion_guia" rows="8"></textarea>
        </div> <!-- Fin del div seccionDescripcion -->

        <div class="separador"></div>

        <div class="form-group padd-sup" id="seccionVideo">
          <h4 class="text-center"><label for="video_guia">Vídeo de la guía</label></h4>
          <p class="help-block">Puedes incluir un enlace a YouTube para ayudar a ilustrar la guía. Solo tienes que pegar el código de la URL después de "?v=". Por ejemplo, si el enlace es "https://www.youtube.com/watch?v=CBD08XXdct0", solo tienes que pegar "CBD08XXdct0".</p>
          <input type="text" class="form-control" id="video_guia" name="video_guia" placeholder="Enlace a YouTube del vídeo. P.ej: CBD08XXdct0"></input>
        </div> <!-- Fin del div seccionVisibilidad -->

        <div class="separador"></div>

        <div class="form-group padd-sup" id="seccionVisibilidad">
          <h4 class="text-center"><label for="visibilidad_guia">Visibilidad de la guía</label></h4>
          <p class="help-block">Elige el grado de visibilidad de la guía:<br/><strong>Pública:</strong> cualquier usuario puede verla. <br/><strong>Privada:</strong> solo los usuarios con el enlace a la guía pueden verla. <br/>Recuerda que puedes guardar la guía como privada hasta el momento en que consideres que esté completa o simplemente hasta que cambies de opinión.</p>
          <select class="form-control" id="visibilidad_guia" name="visibilidad_guia">
            <option value="publica">Pública</option>
            <option value="privada">Privada</option>
          </select>
        </div> <!-- Fin del div seccionVideo -->

        <div class="margen-inf padd-sup" id="seccionBotones">
          <input type="submit" class="btn btn-default" id="enviarGuia" name="enviarGuia" value="Enviar guia">
          <input type="reset" class="btn btn-default" value="Vaciar campos">
        </div> <!-- Fin del div seccionBotones -->
      </div> <!-- Fin del div container-fluid -->
    </form>
  </div> <!-- Fin del div main -->
@endsection
