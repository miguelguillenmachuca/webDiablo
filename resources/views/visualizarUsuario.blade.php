@extends('layouts.app')

@section('content')
  <div id="main" class="container">

    <div class="container-fluid contenedor margen-inf">
      <div class="container-fluid">
        <div class="row row-eq-height">
          <div class="col-xs-3 col-sm-1 text-center">
            <div class="text-center-vertical">
              <img src="{{ asset('img/usuarios/default_user_icon.png') }}" alt="avatar del usuario" class="img-responsive img-usuario-no-max">
            </div>
          </div>

          <div class="col-xs-9 col-sm-5 col-md-8">
            <h3>Nombre de usuario</h3>
            <h4>Usuario/administrador</h4>
            <p>Se unió el 12/12/2012</p>
          </div>

          <div class="col-xs-12 col-sm-6 col-md-3 margen-inf">
            <div class="row row-eq-height marco-resumen margen-sup">
              <div class="col-xs-4 text-center"><span class="text-center">10 guías creadas</span></div>
              <div class="col-xs-4 text-center"><span class="text-center">10 comentarios</span></div>
              <div class="col-xs-4 text-center"><span class="text-center">10 Me gusta</span></div>
            </div>
          </div>
        </div>

        <div class="row margen-sup">
          <div class="col-xs-12">
            <ul class="nav nav-tabs">
              <li class="{{ areActiveRoutes([ 'usuario/show', 'usuario/guias' ]) }}"><a href="{{ route('usuario/guias', [ 'asd' ]) }}">Guías publicadas</a></li>
              <li class="{{ isActiveRoute('usuario/comentarios') }}"><a href="{{ route('usuario/comentarios', [ 'asd' ]) }}">Comentarios</a></li>
              <li class="{{ isActiveRoute('usuario/favoritas') }}"><a href="{{ route('usuario/favoritas', [ 'asd' ]) }}">Me gusta</a></li>
            </ul>
          </div>

          <div class="col-xs-12">
            @if(areActiveRoutes([ 'usuario/show', 'usuario/guias' ]))
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
