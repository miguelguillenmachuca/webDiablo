@extends('layouts.app')

@section('content')
  <div id="main" class="container">

    {{ Form::model($guia, [ 'url' => route('updateGuia', [ $guia->getRouteKey() ]), 'class' => "formGuia", 'id' => 'formGuia', 'name' => 'formGuia' ]) }}
      <h2 class="text-center">Introduzca los datos de la guía</h2>

      @if($errors->any())
      <div class="container-fluid">
        <h3>Hay errores en el formulario:</h3>
        @foreach ($errors->all() as $message)
          <p>{{ $message }}</p>

        @endforeach
      </div>
      @endif

      <div class="container-fluid">

        <div class="row padd-sup" id="seccionNombre">
          <div class="col-xs-12">
            <div class="form-group">
              <h3 class="text-center">{{ Form::label('nombre', 'Nombre de la guía') }}</h3>
              <p class="help-block">Incluye un nombre para la guía que sea fácilmente reconocible.</p>
              {{ Form::text('nombre', null, [ 'class' => 'form-control', 'placeholder' => 'Nombre de la guía' ]) }}
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
                      {{ Form::select( 'habilidad'.$i, $activas, isset($default_habilidades[ 'a' .$i ]) ? $default_habilidades[ 'a' .$i ]->getRouteKey() : null, [ 'placeholder' => 'Elige una habilidad', 'class' => 'form-control' ]) }}
                    </div>

                    <div class="margen-sup col-xs-offset-1 col-xs-10">
                      {{ Form::select( 'runa' .$i, $runas, isset($default_runas[ 'a' .$i ]) ? $default_runas[ 'a' .$i ]->getRouteKey() : null, [ 'placeholder' => 'Elige una runa', 'class' => 'form-control' ] ) }}
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
                  {{ Form::select( 'pasiva' .$i, $pasivas, isset($default_habilidades[ 'p' .$i ]) ? $default_habilidades[ 'p' .$i ]->getRouteKey() : null, [ 'placeholder' => 'Elige una pasiva', 'class' => 'form-control' ] ) }}
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
                        {{ Form::select( 'cubo1', $armas, null, [ 'placeholder' => 'Elige un arma', 'class' => 'form-control', 'id' => 'cubo1' ] ) }}
                      </div> <!-- Fin del div seccionCubo1 -->

                      <div class="col-xs-12 form-group" id="seccionCubo2">
                        {{ Form::select( 'cubo2', $armaduras, null, [ 'placeholder' => 'Elige una pieza de armadura', 'class' => 'form-control', 'id' => 'cubo2' ] ) }}
                      </div> <!-- Fin del div seccionCubo2 -->

                      <div class="col-xs-12 form-group" id="seccionCubo3">
                        {{ Form::select( 'cubo3', $accesorios, null, [ 'placeholder' => 'Elige un accesorio', 'class' => 'form-control', 'id' => 'cubo3' ] ) }}
                      </div> <!-- Fin del div seccionCubo3 -->
                    </div> <!-- Fin del div row -->
                  </div> <!-- Fin del div seccionCubo -->

                  <div class="col-xs-12 contenedor-seccion full-container-height" id="seccionGemas">
                    <h4 class="text-center">Gemas legendarias</h4>

                    <div class="row">
                      <div class="col-xs-12 form-group" id="seccionGema1">
                        {{ Form::select( 'gema1', $gema, null, [ 'placeholder' => 'Elige una gema', 'class' => 'form-control', 'id' => 'gema1' ] ) }}
                      </div> <!-- Fin del div seccionGema1 -->

                      <div class="col-xs-12 form-group" id="seccionGema2">
                        {{ Form::select( 'gema2', $gema, null, [ 'placeholder' => 'Elige una gema', 'class' => 'form-control', 'id' => 'gema2' ] ) }}
                      </div> <!-- Fin del div seccionGema2 -->

                      <div class="col-xs-12 form-group" id="seccionGema3">
                        {{ Form::select( 'gema3', $gema, null, [ 'placeholder' => 'Elige una gema', 'class' => 'form-control', 'id' => 'gema3' ] ) }}
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
                {{ Form::label('estad_principal', 'Estadística principal') }}
                {{ Form::select( 'estad_principal', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'estad_principal' ] ) }}

                {{ Form::label('vitalidad', 'Vitalidad') }}
                {{ Form::select( 'vitalidad', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'vitalidad' ] ) }}

                {{ Form::label('v_movimiento', 'Velocidad de movimiento') }}
                {{ Form::select( 'v_movimiento', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'v_movimiento' ] ) }}

                {{ Form::label('recurso_max', 'Recurso máximo') }}
                {{ Form::select( 'recurso_max', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'recurso_max' ] ) }}
              </div> <!-- Fin del div seccionLeyendaPrimarios -->

              <div class="col-xs-12 col-md-3 contenedor-seccion" id="seccionLeyendaAtaque">
                <h4 class="text-center">Ataque</h4>
                {{ Form::label('v_ataque', 'Velocidad de ataque') }}
                {{ Form::select( 'v_ataque', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'v_ataque' ] ) }}

                {{ Form::label('reduccion_enfr', 'Reducción de enfriamiento') }}
                {{ Form::select( 'reduccion_enfr', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'reduccion_enfr' ] ) }}

                {{ Form::label('prob_golpe_crit', 'Probabilidad de golpe crítico') }}
                {{ Form::select( 'prob_golpe_crit', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'prob_golpe_crit' ] ) }}

                {{ Form::label('dano_golpe_crit', 'Daño de golpe crítico') }}
                {{ Form::select( 'dano_golpe_crit', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'dano_golpe_crit' ] ) }}
              </div> <!-- Fin del div seccionLeyendaAtaque -->

              <div class="col-xs-12 col-md-3 contenedor-seccion" id="seccionLeyendaDefensa">
                <h4 class="text-center">Defensa</h4>
                {{ Form::label('vida', 'Vida') }}
                {{ Form::select( 'vida', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'vida' ] ) }}

                {{ Form::label('armadura', 'Armadura') }}
                {{ Form::select( 'armadura', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'armadura' ] ) }}

                {{ Form::label('todas_resist', 'Todas las resistencias') }}
                {{ Form::select( 'todas_resist', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'todas_resist' ] ) }}

                {{ Form::label('regeneracion_vida', 'Regeneración de vida') }}
                {{ Form::select( 'regeneracion_vida', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'regeneracion_vida' ] ) }}
              </div> <!-- Fin del div seccionLeyendaDefensa -->

              <div class="col-xs-12 col-md-3 contenedor-seccion" id="seccionLeyendaUtilidad">
                <h4 class="text-center">Utilidad</h4>
                {{ Form::label('dano_area', 'Daño de área') }}
                {{ Form::select( 'dano_area', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'dano_area' ] ) }}

                {{ Form::label('reduc_coste', 'Reducción de coste') }}
                {{ Form::select( 'reduc_coste', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'reduc_coste' ] ) }}

                {{ Form::label('vida_por_golpe', 'Vida por golpe') }}
                {{ Form::select( 'vida_por_golpe', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'vida_por_golpe' ] ) }}

                {{ Form::label('hallazgo_oro', 'Hallazgo de oro') }}
                {{ Form::select( 'hallazgo_oro', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4' ], null, [ 'placeholder' => 'Elige una prioridad', 'class' => 'form-control', 'id' => 'hallazgo_oro' ] ) }}
              </div> <!-- Fin del div seccionLeyendaUtilidad -->
            </div> <!-- Fin del div row -->
          </div> <!-- Fin del div seccionLeyendaFormulario -->
        </div> <!-- Fin del div seccionLeyenda -->

        <div class="separador"></div>

        <div class="form-group padd-sup" id="seccionDescripcion">
          <h4 class="text-center">{{ Form::label('descripcion', 'Descripción de la guía') }}</h4>
          <p class="help-block">Describe la forma de juego de esta guía o lo que necesites comentar. Máximo de 1000 caracteres</p>
          {{ Form::textarea('descripcion', null, [ 'class' => 'form-control no-resize', 'id' => 'descripcion_guia', 'rows' => '8' ]) }}
        </div> <!-- Fin del div seccionDescripcion -->

        <div class="separador"></div>

        <div class="form-group padd-sup" id="seccionVideo">
          <h4 class="text-center">{{ Form::label('video', 'Vídeo de la guía') }}</h4>
          <p class="help-block">Puedes incluir un enlace a YouTube para ayudar a ilustrar la guía. Solo tienes que pegar el código de la URL después de "?v=". Por ejemplo, si el enlace es "https://www.youtube.com/watch?v=CBD08XXdct0", solo tienes que pegar "CBD08XXdct0".</p>
          {{ Form::text('video', null, [ 'class' => 'form-control', 'id' => 'video_guia', 'placeholder' => 'Enlace a YouTube del vídeo. P.ej: CBD08XXdct0' ]) }}
        </div> <!-- Fin del div seccionVisibilidad -->

        <div class="separador"></div>

        <div class="form-group padd-sup" id="seccionVisibilidad">
          <h4 class="text-center">{{ Form::label('visibilidad', 'Visibilidad de la guía') }}</h4>
          <p class="help-block">Elige el grado de visibilidad de la guía:<br/><strong>Pública:</strong> cualquier usuario puede verla. <br/><strong>Privada:</strong> solo los usuarios con el enlace a la guía pueden verla. <br/>Recuerda que puedes guardar la guía como privada hasta el momento en que consideres que esté completa o simplemente hasta que cambies de opinión.</p>
          {{ Form::select('visibilidad', [ 'publica' => 'Pública', 'privada' => 'Privada' ], null, [ 'class' => 'form-control', 'id' => 'visibilidad_guia' ]) }}
        </div> <!-- Fin del div seccionVideo -->

        <div class="margen-inf padd-sup" id="seccionBotones">
          {{ Form::hidden('id_clase', $clase->getRouteKey()) }}

          {{ Form::submit('Enviar guía', [ 'class' => 'btn btn-default', 'name' => 'enviarGuia', 'id' => 'enviarGuia' ]) }}

          {{ Form::reset('Vaciar campos', [ 'class' => 'btn btn-default' ]) }}
        </div> <!-- Fin del div seccionBotones -->
      </div> <!-- Fin del div container-fluid -->
    </form>
    {{ Form::close() }}
  </div> <!-- Fin del div main -->
@endsection
