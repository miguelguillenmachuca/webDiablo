@extends('layouts.app')

@section('content')
<div id="main" class="container">

  <div class="container-fluid contenedor margen-inf">
    <div id="seccionEncabezado" class="row">
      <div class="col-xs-3 col-sm-1">
        <img src="{{ asset('/storage/app/public/' .$guia->clase->foto_clase) }}" class="img-clase img-responsive margen-sup" alt="clase">
      </div>
      <div class="col-xs-9 col-sm-8">
        <div class="row">
          <div class="col-xs-12">
            <h2 class="enlace-guia-inverse">{{ $guia->nombre }}</h2>
          </div>
          <div class="col-xs-12">
            <h3><a href="{{ route('usuario/show', $guia->usuario) }}" class="enlace-usuario">{{ $guia->usuario->nombre }}</a></h3>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-3">
        <div class="row">
          <div class="col-xs-6 col-sm-12">
            <h4 class="text-right text-left-xs texto-amarillo">Última modificación: {{ $guia->getUpdatedAt() }}</h4>
          </div>
          <div class="col-xs-6 col-sm-12">
            <h3 class="likes text-right"><span class="glyphicon glyphicon-thumbs-up likes"></span>{{ $guia->get_num_likes() }}</h3>
            @auth
              @if (!$votoPositivo)
                {{ Form::open(array('url' => route('createVoto'), 'method' => 'post')) }}
                {{ Form::hidden('id_guia', $guia->getRouteKey()) }}

                {{ Form::button('<span class="glyphicon glyphicon-thumbs-up likes"></span><span class="likes">Votar</span>', [ 'type' => 'submit', 'class' => 'btn btn-rojo pull-right' ]) }}
                {{ Form::close() }}
              @else
                {{ Form::open(array('url' => route('deleteVoto', [ $votoPositivo->getRouteKey() ]))) }}

                {{ Form::button('<span class="glyphicon glyphicon-thumbs-up likes"></span><span class="likes">Quitar voto</span>', [ 'type' => 'submit', 'class' => 'btn btn-rojo pull-right' ]) }}
                {{ Form::close() }}
              @endif
            @endauth

            @guest
              <p>Si quieres votar a esta guía, tienes que <a href="{{ route('login') }}">logearte</a></p>
            @endguest
          </div>
        </div>
      </div>
    </div> <!-- Fin de la sección encabezado -->

    <div class="separador"></div>

    <div id="seccionHabilidades" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Habilidades y runas</h3>

        <div class="row">
          @for ($i=1; $i < 7; $i++)
            <div class="col-xs-12 col-sm-4 contenedor-seccion" id="habilidad{{ $i }}">
              <div class="row">
                <div class="col-xs-3 col-sm-2">
                  <img src="{{ isset($habilidades[ 'a' .$i ]) ? asset('/storage/app/public/' .$habilidades[ 'a' .$i ]->foto_habilidad) : asset("public/img/black_default_img.png") }}" alt="habilidad{{ $i }}" class="img-responsive img-habilidad-resumen">
                </div>

                <div class="col-xs-9 col-sm-10">
                  <div class="row">
                    <div class="col-xs-12 habilidad-guia">{{ isset($habilidades[ 'a' .$i ]) ? $habilidades[ 'a' .$i ]->nombre : 'Sin habilidad seleccionada' }}</div>
                    <div class="col-xs-12 runa-guia">
                      <span>{{ isset($runas[ 'a' .$i ]) ? $runas[ 'a' .$i ]->nombre : 'Sin runa seleccionada' }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- Fin del contenedor-seccion -->
          @endfor
        </div>
      </div>
    </div> <!-- Fin de la sección habilidades -->

    <div class="separador"></div>

    <div id="seccionPasivas" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Habilidades pasivas</h3>

        <div class="row">
          @for ($i=1; $i < 5; $i++)
            <div class="col-xs-6 col-sm-3 contenedor-seccion" id="pasiva{{ $i }}">
              <div class="row">
                <div class="col-xs-3">
                  <img src="{{ isset($habilidades[ 'p' .$i ]) ? asset('/storage/app/public/' .$habilidades[ 'p' .$i ]->foto_habilidad) : asset("public/img/black_default_img.png") }}" alt="pasiva{{ $i }}" class="img-responsive img-habilidad-resumen">
                </div>

                <div class="col-xs-9 text-center-vertical">{{ isset($habilidades[ 'p' .$i ]) ? $habilidades[ 'p' .$i ]->nombre : 'Sin pasiva seleccionada' }}</div>
              </div>
            </div>
          @endfor
        </div>
      </div>
    </div> <!-- Fin de la sección pasivas -->

    <div class="separador"></div>

    <div id="seccionEquipacion" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Equipamiento</h3>

        <div class="row row-eq-height">
          <div class="col-xs-12 col-md-9 contenedor-seccion" id="seccionObjetos">
            <h4 class="text-center">Objetos</h4>

            @php
              $cont_row = 0;
            @endphp

              @foreach ($listaPosObj as $pos)
                @if ($cont_row == 0)
                  <div class="row">
                @endif
                <div class="col-xs-12 col-sm-4" id="seccion{{ ucfirst($pos) }}">
                  <h4 class="text-center">{{ str_replace( '_', ' ', ucfirst( str_replace('munecas', 'muñecas', str_replace( 'anillo', 'anillo ', $pos) ) ) ) }}</h4>

                  <div class="row">
                    <div class="col-xs-3">
                      <img src="{{ isset($objetos[ $pos ]) ? asset('/storage/app/public/' .$objetos[ $pos ]->foto_objeto) : asset("public/img/black_default_img.png") }}" alt="objeto {{ $pos }}" class="img-responsive img-habilidad-resumen">
                    </div>

                    <div class="col-xs-9 text-center-vertical">{{ isset($objetos[ $pos ]) ? $objetos[ $pos ]->nombre : 'Sin objeto seleccionado' }}</div>
                  </div>
                </div> <!-- Fin de la sección cabeza -->
                @if ($cont_row == 2)
                  </div>
                @endif
                @php
                  $cont_row++;
                  $cont_row = $cont_row%3;
                @endphp
              @endforeach
            @if ($cont_row != 0)
            </div>
            @endif
          </div> <!-- Fin de la sección objetos -->

          <div class="col-xs-12 col-md-3" id="seccionCuboGemas">
            <div class="row">
              <div class="col-xs-12 contenedor-seccion full-container-height" id="seccionCubo">
                <h4 class="text-center">Cubo de Kanai</h4>

                <div class="row">
                  @for ($i=1; $i < 4; $i++)
                    <div class="col-xs-12 col-sm-4 col-md-12" id="seccionCubo{{ $i }}">
                      <h4 class="text-center">@switch($i) @case(1) Arma @break @case(2)Armadura @break @case(3)Accesorio @break @endswitch</h4>

                      <div class="row">
                        <div class="col-xs-3">
                          <img src="{{ isset($objetos[ 'cubo' .$i ]) ? asset('/storage/app/public/' .$objetos[ 'cubo' .$i ]->foto_objeto) : asset("public/img/black_default_img.png") }}" alt="cubo{{ $i }}" class="img-responsive img-habilidad-resumen">
                        </div>

                        <div class="col-xs-9 text-center-vertical">{{ isset($objetos[ 'cubo' .$i ]) ? $objetos[ 'cubo' .$i ]->nombre : 'Sin objeto seleccionado' }}</div>
                      </div>
                    </div> <!-- Fin de la sección cubo {{ $i }} -->
                  @endfor
                </div>
              </div> <!-- Fin de la sección cubo -->

              <div class="col-xs-12 contenedor-seccion full-container-height" id="seccionGemas">
                <h4 class="text-center">Gemas legendarias</h4>

                <div class="row">
                  @for ($i=1; $i < 4; $i++)
                    <div class="col-xs-12 col-sm-4 col-md-12" id="seccionGema{{ $i }}">
                      <h4 class="text-center">Gema {{ $i }}</h4>

                      <div class="row">
                        <div class="col-xs-3">
                          <img src="{{ isset($objetos[ 'gema' .$i ]) ? asset('/storage/app/public/' .$objetos[ 'gema' .$i ]->foto_objeto) : asset("public/img/black_default_img.png") }}" alt="gema{{ $i }}" class="img-responsive img-habilidad-resumen">
                        </div>

                        <div class="col-xs-9 text-center-vertical">{{ isset($objetos[ 'gema' .$i ]) ? $objetos[ 'gema' .$i ]->nombre : 'Sin objeto seleccionado' }}</div>
                      </div>
                    </div> <!-- Fin de la sección gema {{ $i }} -->
                  @endfor
                </div>
              </div> <!-- de la sección gemas -->
            </div>
          </div> <!-- Fin de la sección cubo y gemas -->
        </div>
      </div>
    </div> <!-- Fin de la seccion equipación -->

    <div class="separador"></div>

    <div id="seccionLeyenda" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Puntos de leyenda</h3>

        <div class="row row-eq-height">
          <div class="col-xs-12 col-sm-6 col-md-3 contenedor-seccion" id="seccionLeyendaPrimarios">
            <h4 class="text-center">Primarios</h4>

            <p>@empty($puntos_leyenda[ 'estad_principal' ]) 4 @endempty @isset($puntos_leyenda[ 'estad_principal' ]) {{ $puntos_leyenda[ 'estad_principal' ]->prioridad }} @endisset<span class="bold">Estadística principal</span></p>
            <p>@empty($puntos_leyenda[ 'vitalidad' ]) 4 @endempty @isset($puntos_leyenda[ 'vitalidad' ]) {{ $puntos_leyenda[ 'vitalidad' ]->prioridad }} @endisset<span class="bold">Vitalidad</span></p>
            <p>@empty($puntos_leyenda[ 'v_movimiento' ]) 4 @endempty @isset($puntos_leyenda[ 'v_movimiento' ]) {{ $puntos_leyenda[ 'v_movimiento' ]->prioridad }} @endisset<span class="bold">Velocidad de movimiento</span></p>
            <p>@empty($puntos_leyenda[ 'recurso_max' ]) 4 @endempty @isset($puntos_leyenda[ 'recurso_max' ]) {{ $puntos_leyenda[ 'recurso_max' ]->prioridad }} @endisset<span class="bold">Recurso máximo</span></p>
          </div> <!-- Fin de la sección leyenda primarios-->

          <div class="col-xs-12 col-sm-6 col-md-3 contenedor-seccion" id="seccionLeyendaAtaque">
            <h4 class="text-center">Ataque</h4>

            <p>@empty($puntos_leyenda[ 'v_ataque' ]) 4 @endempty @isset($puntos_leyenda[ 'v_ataque' ]) {{ $puntos_leyenda[ 'v_ataque' ]->prioridad }} @endisset<span class="bold">Velocidad de ataque</span></p>
            <p>@empty($puntos_leyenda[ 'reduccion_enfr' ]) 4 @endempty @isset($puntos_leyenda[ 'reduccion_enfr' ]) {{ $puntos_leyenda[ 'reduccion_enfr' ]->prioridad }} @endisset<span class="bold">Reducción de enfriamiento</span></p>
            <p>@empty($puntos_leyenda[ 'prob_golpe_crit' ]) 4 @endempty @isset($puntos_leyenda[ 'prob_golpe_crit' ]) {{ $puntos_leyenda[ 'prob_golpe_crit' ]->prioridad }} @endisset<span class="bold">Probabilidad de golpe crítico</span></p>
            <p>@empty($puntos_leyenda[ 'dano_golpe_crit' ]) 4 @endempty @isset($puntos_leyenda[ 'dano_golpe_crit' ]) {{ $puntos_leyenda[ 'dano_golpe_crit' ]->prioridad }} @endisset<span class="bold">Daño de golpe crítico</span></p>
          </div> <!-- Fin de la sección leyenda ataque-->

          <div class="col-xs-12 col-sm-6 col-md-3 contenedor-seccion" id="seccionLeyendaDefensa">
            <h4 class="text-center">Defensa</h4>

            <p>@empty($puntos_leyenda[ 'vida' ]) 4 @endempty @isset($puntos_leyenda[ 'vida' ]) {{ $puntos_leyenda[ 'vida' ]->prioridad }} @endisset<span class="bold">Vida</span></p>
            <p>@empty($puntos_leyenda[ 'armadura' ]) 4 @endempty @isset($puntos_leyenda[ 'armadura' ]) {{ $puntos_leyenda[ 'armadura' ]->prioridad }} @endisset<span class="bold">Armadura</span></p>
            <p>@empty($puntos_leyenda[ 'todas_resist' ]) 4 @endempty @isset($puntos_leyenda[ 'todas_resist' ]) {{ $puntos_leyenda[ 'todas_resist' ]->prioridad }} @endisset<span class="bold">Todas las resistencias</span></p>
            <p>@empty($puntos_leyenda[ 'regeneracion_vida' ]) 4 @endempty @isset($puntos_leyenda[ 'regeneracion_vida' ]) {{ $puntos_leyenda[ 'regeneracion_vida' ]->prioridad }} @endisset<span class="bold">Regeneración de vida</span></p>
          </div> <!-- Fin de la sección leyenda defensa-->

          <div class="col-xs-12 col-sm-6 col-md-3 contenedor-seccion" id="seccionLeyendaUtilidad">
            <h4 class="text-center">Utilidad</h4>

            <p>@empty($puntos_leyenda[ 'dano_area' ]) 4 @endempty @isset($puntos_leyenda[ 'dano_area' ]) {{ $puntos_leyenda[ 'dano_area' ]->prioridad }} @endisset<span class="bold">Daño de área</span></p>
            <p>@empty($puntos_leyenda[ 'reduc_coste' ]) 4 @endempty @isset($puntos_leyenda[ 'reduc_coste' ]) {{ $puntos_leyenda[ 'reduc_coste' ]->prioridad }} @endisset<span class="bold">Reducción de coste</span></p>
            <p>@empty($puntos_leyenda[ 'vida_por_golpe' ]) 4 @endempty @isset($puntos_leyenda[ 'vida_por_golpe' ]) {{ $puntos_leyenda[ 'vida_por_golpe' ]->prioridad }} @endisset<span class="bold">Vida por golpe</span></p>
            <p>@empty($puntos_leyenda[ 'hallazgo_oro' ]) 4 @endempty @isset($puntos_leyenda[ 'hallazgo_oro' ]) {{ $puntos_leyenda[ 'hallazgo_oro' ]->prioridad }} @endisset<span class="bold">Hallazgo de oro</span></p>
          </div> <!-- Fin de la sección leyenda utilidad-->
        </div>
      </div>
    </div> <!-- Fin de la sección leyenda -->

    @isset($guia->descripcion)
      <div class="separador"></div>

      <div id="seccionDescripcion" class="row">
        <div class="col-xs-12">
           <h3 class="text-center bold">Descripción</h3>

           <p>{{ $guia->descripcion }}</p>
        </div>
      </div> <!-- Fin de la sección descripción -->
    @endisset

    @isset($guia->video)
      <div class="separador"></div>

      <div id="seccionVideo" class="row">
        <div class="col-xs-12">
          <h3 class="text-center bold">Vídeo</h3>

          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $guia->video }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
        </div>
      </div> <!-- Fin de la sección vídeo -->
    @endisset

    <div class="separador"></div>

    <div id="seccionVotos" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Recuerda votar positivo si te ha gustado la guía</h3>

        <h3 class="likes text-center"><span class="glyphicon glyphicon-thumbs-up likes"></span>{{ $guia->get_num_likes() }}</h3>
        <div class="text-center">
          @auth
            @if (!$votoPositivo)
              {{ Form::open(array('url' => route('createVoto'), 'method' => 'post')) }}
              {{ Form::hidden('id_guia', $guia->getRouteKey()) }}

              {{ Form::button('<span class="glyphicon glyphicon-thumbs-up likes"></span><span class="likes">Votar</span>', [ 'type' => 'submit', 'class' => 'btn btn-rojo' ]) }}
              {{ Form::close() }}
            @else
              {{ Form::open(array('url' => route('deleteVoto', [ $votoPositivo->getRouteKey() ]))) }}

              {{ Form::button('<span class="glyphicon glyphicon-thumbs-up likes"></span><span class="likes">Quitar voto</span>', [ 'type' => 'submit', 'class' => 'btn btn-rojo' ]) }}
              {{ Form::close() }}
            @endif
          @endauth

          @guest
            <p>Si quieres votar a esta guía, tienes que <a href="{{ route('login') }}">logearte</a></p>
          @endguest
        </div>
      </div>
    </div> <!-- Fin de la sección votos -->

    <div class="separador"></div>

    <div id="seccionComentarios" class="row">
      <div class="col-xs-12">
        <h3 class="text-left bold">Comentarios</h3>
        <p class="help-block">Puedes debatir sobre tu opinión de la guía, posibles cambios, o simplemente agradecerle al autor que se haya tomado su tiempo en compartirla.</p>

        @auth
          <div class="formComentario">
            {{ Form::open(array('url' => route('createComentario'), 'method' => 'post')) }}
            {{ Form::textarea('texto_com', null , [ 'class' => 'form-control' ]) }}
            {{ Form::hidden('id_guia', $guia->getRouteKey()) }}

            {{ Form::button('Comentar', [' type' => 'submit', 'class' => 'btn btn-rojo btn-block-xs margen-sup' ]) }}
            {{ Form::close() }}
          </div>
        @endauth

        @guest
          <p>Recuerda que para comentar, tienes que <a href="{{ route('login') }}">logearte</a></p>
        @endguest
      </div>
    </div>

    <div class="col-xs-12" id="paginado_comentarios">
      {{ $comentarios->links('pagination.limit_links_rojo') }}
    </div> <!-- Fin del div paginado_comentarios -->

    <div class="col-xs-12 margen-sup margen-inf" id="cajaComentarios">
      <div class="row">
        @foreach ($comentarios as $comentario)
          <div class="col-xs-12">
            <div class="row contenedor-seccion-comentarios row-eq-height">
              <div class="col-xs-12 col-sm-2 col-md-2 contenedor-autor-comentario">
                <div class="row">
                  <div class="col-xs-2 col-sm-12">
                    <img src="{{ asset('/storage/app/public/' .$comentario->usuario->foto_usuario) }}" alt="usuario" class="img-responsive img-usuario center-block">
                  </div>
                  <div class="col-xs-10 col-sm-12 text-center">
                    <div class="row">
                      <div class="col-xs-12">
                        <a href="{{ route('usuario/show', $comentario->usuario->getRouteKey()) }}" class="enlace-usuario">{{ $comentario->usuario->nombre }}</a>
                      </div>
                      <div class="col-xs-12">
                        <span class="num-comentario">{{ $comentario->usuario->get_num_comentarios() }} comentarios</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-sm-10 col-md-10 contenedor-texto-comentario full-height">
                <p class="full-height">{{ $comentario->texto }}</p>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>

    <div class="container-fluid" id="paginado_inf">
      {{ $comentarios->links('pagination.limit_links_rojo') }}
    </div> <!-- Fin del div paginado_inf -->

  </div>


</div> <!-- Fin del div main -->
@endsection
