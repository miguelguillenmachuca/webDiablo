@extends('layouts.admin')

@section('titulo')
  CREAR HABILIDAD
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-offset-2 col-sm-8">
        {{ Form::open([ 'url' => '#', 'files' => 'true', 'class' => 'form-horizontal' ]) }}
        <div class="form-group">
          {{ Form::label('nombre', 'Nombre de la habilidad', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::text('nombre', null, [ 'class' => 'form-control' ]) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('id_clase', 'Clase', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::select('id_clase', [ 'clase1' => 'Clase1', 'clase2' => 'Clase2' ], 'clase1', [ 'class' => 'form-control' ]) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('descripcion', 'Descripción', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::textarea('descripcion', null, [ 'class' => 'form-control' ]) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('foto', 'Foto de la habilidad', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::file('foto') }}
          </div>
        </div>

        @if ($pasiva)
          {{ Form::hidden('tipo_habilidad', 'pasiva') }}
        @else
          {{ Form::hidden('tipo_habilidad', 'activa') }}
        @endif

        <div class="form-group">
          <div class="col-sm-offset-1 col-sm-10 col-md-offset-3 col-md-6">
            {{ Form::button('Enviar', [ 'type' => 'submit', 'class' => 'btn btn-default btn-redondo btn-block-xs' ]) }}
            {{ Form::button('Reiniciar los campos', [ 'type' => 'reset', 'class' => 'btn btn-default btn-redondo btn-block-xs' ]) }}
          </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div> <!-- Fin del div main-content -->
@endsection
