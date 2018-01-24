@extends('layouts.app')

@section('content')
<div id="main" class="container">
  <div class="container-fluid contenedor-seccion">
    <div class="row">
      <div class="col-xs-3 col-sm-1">
        <img src="{{ asset('img/clases/default_class.png') }}" class="img-clase img-responsive" alt="clase">
      </div>
      <div class="col-xs-9 col-sm-9 col-lg-10">
        <div class="row">
          <div class="col-xs-12">
            <h2 class="">Título Guía</h2>
          </div>
          <div class="col-xs-12">
            <h3><a href="#" class="enlace-usuario">Autor Guía</a></h3>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-2 col-lg-1">
        <h3 class="likes text-right"><span class="glyphicon glyphicon-thumbs-up likes"></span>147</h3>
        {{ Form::open(array('url' => '#', 'method' => 'post')) }}
          {{ Form::hidden('user' , '') }}
          {{ Form::hidden('guia' , '') }}

          {{ Form::button('<span class="glyphicon glyphicon-thumbs-up likes"></span><span class="likes">Votar</span>', [ 'type' => 'submit', 'class' => 'btn btn-rojo pull-right' ]) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>

</div> <!-- Fin del div main -->
@endsection
