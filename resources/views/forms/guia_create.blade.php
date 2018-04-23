@extends('layouts.app')

@section('content')
  <div id="main" class="container">

    {{ Form::open([ 'url' => route('createGuia'), 'class' => "formGuia", 'id' => 'formGuia', 'name' => 'formGuia' ]) }}
    {{-- <form name="formGuia" id="formGuia" class="formGuia" action="formularioCrearGuia.php" method="post"> --}}
      <h2 class="text-center">Introduzca los datos de la guía</h2>
      <div class="container-fluid">

        <div class="row padd-sup" id="seccionNombre">
          <div class="col-xs-12">
            <div class="form-group">
              <h3 class="text-center">{{ Form::label('nombreGuia', 'Nombre de la guía') }}</h3>
              <p class="help-block">Incluye un nombre para la guía que sea fácilmente reconocible.</p>
              {{ Form::text('nombreGuia', null, [ 'class' => 'form-control', 'placeholder' => 'Nombre de la guía' ]) }}
            </div>
          </div>
        </div>

        <div class="separador"></div>

        <div class="row padd-sup" id="seccionHabilidades">
          <div class="col-xs-12">
            <h3 class="text-center bold">Habilidades y runas</h3>
            <p class="help-block">Elige las habilidades y las correspondientes runas que usará tu personaje</p>
            <div class="row">
              @for ($i=1; $i < 7; $i++)
                <div class="form-group col-xs-6 col-md-4 contenedor-seccion" id="seccionHabilidad{{ $i }}">
                  <div class="row">
                    <div class="col-xs-12">
                      {{ Form::select( 'habilidad'.$i, $activas, null, [ 'placeholder' => 'Elige una habilidad', 'class' => 'form-control' ]) }}
                    </div>

                    <div class="margen-sup col-xs-offset-1 col-xs-10">
                      {{ Form::select( 'runa' .$i, $runas, null, [ 'placeholder' => 'Elige una runa', 'class' => 'form-control' ] ) }}
                    </div>
                  </div>
                </div> <!-- Fin del div seccionHabilidad -->
              @endfor
            </div> <!-- Fin del div seccionHabilidades -->
          </div>
        </div>

        <div class="separador"></div>

        <div class="row padd-sup" id="seccionPasivas">
          <div class="col-xs-12">
            <h3 class="text-center bold">Habilidades pasivas</h3>
            <p class="help-block">Indica las habilidades pasivas que tendrá el personaje. Recuerda que no todos los personajes están al nivel máximo, así que no es necesario que incluyas las 4 pasivas.</p>
            <div class="row">
              @for ($i=1; $i < 5; $i++)
                <div class="form-group col-xs-6 col-md-3" id="seccionPasiva{{ $i }}">
                  {{ Form::select( 'pasiva' .$i, $pasivas, null, [ 'placeholder' => 'Elige una pasiva', 'class' => 'form-control' ] ) }}
                </div> <!-- Fin del div seccionPasiva1 -->
              @endfor
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
                    {{ Form::label( 'cabeza', 'Cabeza') }}
                    {{ Form::select( 'cabeza', $objetos[ 'cabeza' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'cabeza' ] ) }}
                  </div> <!-- Fin del div seccionCabeza -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionHombros">
                    {{ Form::label( 'hombros', 'Hombros') }}
                    {{ Form::select( 'hombros', $objetos[ 'hombros' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'hombros' ] ) }}
                  </div> <!-- Fin del div seccionHombros -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionAmuleto">
                    {{ Form::label( 'amuleto', 'Amuleto') }}
                    {{ Form::select( 'amuleto', $objetos[ 'amuleto' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'amuleto' ] ) }}
                  </div> <!-- Fin del div seccionAmuleto -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionTorso">
                    {{ Form::label( 'torso', 'Torso') }}
                    {{ Form::select( 'torso', $objetos[ 'torso' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'torso' ] ) }}
                  </div> <!-- Fin del div seccionTorso -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionManos">
                    {{ Form::label( 'manos', 'Manos') }}
                    {{ Form::select( 'manos', $objetos[ 'manos' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'manos' ] ) }}
                  </div> <!-- Fin del div seccionManos -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionMunecas">
                    {{ Form::label( 'munecas', 'Muñecas') }}
                    {{ Form::select( 'munecas', $objetos[ 'munecas' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'munecas' ] ) }}
                  </div> <!-- Fin del div seccionMunecas -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionAnillo1">
                    {{ Form::label( 'anillo1', 'Anillo') }}
                    {{ Form::select( 'anillo1', $objetos[ 'anillo' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'anillo1' ] ) }}
                  </div> <!-- Fin del div seccionAnillo1 -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionAnillo2">
                    {{ Form::label( 'anillo2', 'Anillo') }}
                    {{ Form::select( 'anillo2', $objetos[ 'anillo' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'anillo2' ] ) }}
                  </div> <!-- Fin del div seccionAnillo2 -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionCintura">
                    {{ Form::label( 'cintura', 'Cintura') }}
                    {{ Form::select( 'cintura', $objetos[ 'cintura' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'cintura' ] ) }}
                  </div> <!-- Fin del div seccionCintura -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionPiernas">
                    {{ Form::label( 'piernas', 'Piernas') }}
                    {{ Form::select( 'piernas', $objetos[ 'piernas' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'piernas' ] ) }}
                  </div> <!-- Fin del div seccionPiernas -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionPies">
                    {{ Form::label( 'pies', 'Pies') }}
                    {{ Form::select( 'pies', $objetos[ 'pies' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'pies' ] ) }}
                  </div> <!-- Fin del div seccionPies -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionArma">
                    {{ Form::label( 'arma', 'Arma') }}
                    {{ Form::select( 'arma', $objetos[ 'arma' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'arma' ] ) }}
                  </div> <!-- Fin del div seccionArma -->

                  <div class="form-group col-xs-6 col-md-4" id="seccionManoIzquierda">
                    {{ Form::label( 'mano_izquierda', 'Mano izquierda') }}
                    {{ Form::select( 'mano_izquierda', $objetos[ 'mano_izquierda' ], null, [ 'placeholder' => 'Elige un objeto', 'class' => 'form-control', 'id' => 'mano_izquierda' ] ) }}
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
    {{ Form::close() }}
  </div> <!-- Fin del div main -->
@endsection
