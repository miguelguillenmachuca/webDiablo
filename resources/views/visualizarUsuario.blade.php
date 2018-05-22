@extends('layouts.app')

@section('content')
  <div id="main" class="container">

    <div class="container-fluid contenedor margen-inf">
      <div class="container-fluid">
        <div class="row row-eq-height">
          <div class="col-xs-3 col-sm-1 text-center">
            <div class="text-center-vertical">
              <img src="{{ asset('/storage/app/public/' .$usuario->foto_usuario) }}" alt="avatar del usuario" class="img-responsive img-usuario-no-max">
            </div>
          </div>

          <div class="col-xs-9 col-sm-5 col-md-8">
            <h3>{{ $usuario->nombre }}</h3>
            <h4>{{ $usuario->tipo_usuario }}</h4>
            <p>Se unió el {{ $usuario->created_at->format('d-m-Y H:i') }}</p>
          </div>

          <div class="col-xs-12 col-sm-6 col-md-3 margen-inf">
            <div class="row row-eq-height marco-resumen margen-sup">
              <div class="col-xs-4 text-center"><span class="text-center">{{ $usuario->get_num_guias() }} guías creadas</span></div>
              <div class="col-xs-4 text-center"><span class="text-center">{{ $usuario->get_num_comentarios() }} comentarios</span></div>
              <div class="col-xs-4 text-center"><span class="text-center">{{ $usuario->get_num_likes() }} Me gusta</span></div>
            </div>
          </div>
        </div>

        <div class="row margen-sup">
          <div class="col-xs-12">
            <ul class="nav nav-tabs nav-tabs-rojo">
              <li class="{{ areActiveRoutes([ 'usuario/show', 'usuario/guias_publi' ]) }}"><a href="{{ route('usuario/guias_publi', $usuario) }}">Guías publicadas</a></li>
              <li class="{{ isActiveRoute('usuario/comentarios') }}"><a href="{{ route('usuario/comentarios', $usuario) }}">Comentarios</a></li>
              <li class="{{ isActiveRoute('usuario/favoritas') }}"><a href="{{ route('usuario/favoritas', $usuario) }}">Me gusta</a></li>
            </ul>
          </div>

          <div class="col-xs-12">
            @if(areActiveRoutes([ 'usuario/show', 'usuario/guias_publi' ]))
              @include('listaGuiasPubli')
            @elseif(isActiveRoute('usuario/comentarios'))
              @include('listaComentarios')
            @elseif(isActiveRoute('usuario/favoritas'))
              @include('listaGuiasFav')
            @endif
          </div>
        </div>
      </div>
    </div>

  </div> <!-- Fin del div main -->
@endsection
