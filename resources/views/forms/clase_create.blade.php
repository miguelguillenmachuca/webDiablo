@extends('layouts.admin')

@section('content')
  <div id="main" class="container margen-sup">
    <div class="row">
      <div class="col-xs-12">
          <h2 class="text-center">Crear clase</h2>
          {{ Form::open([ 'url' => '#', 'files' => 'true', 'class' => 'form-horizontal' ]) }}
          <div class="form-group">
            {{ Form::label('nombre', 'Nombre de la clase', [ 'class' => 'control-label' ]) }}
            {{ Form::text('nombre') }}
          </div>

          <div class="form-group">
            {{ Form::label('foto', 'Foto de la clase', [ 'class' => 'control-label' ]) }}
            {{ Form::file('foto') }}
          </div>

          {{ Form::button('Enviar', [ 'type' => 'submit', 'class' => 'btn btn-default btn-redondo btn-block-xs' ]) }}
          {{ Form::button('Reiniciar los campos', [ 'type' => 'reset', 'class' => 'btn btn-default btn-redondo btn-block-xs' ]) }}
          {{ Form::close() }}
      </div>
    </div>
  </div> <!-- Fin del div main -->
@endsection
