@extends('layouts.admin')

@section('titulo')
  EDITAR OBJETO
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-offset-2 col-sm-8">
        {{ Form::open([ 'url' => '#', 'files' => 'true', 'class' => 'form-horizontal' ]) }}

        <div class="form-group">
          {{ Form::label('nombre', 'Nombre del objeto', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::text('nombre', null, [ 'class' => 'form-control', 'placeholder' => 'nombre del objeto' ]) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('id_clase', 'Clase', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::select('id_clase', ['1' => 'Neutral', 'clase1' => 'clase1'], 'clase1', [ 'class' => 'form-control' ]) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('tipo_objeto', 'Tipo', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::select('tipo_objeto', ['1' => 'Tipo1', '2' => 'Tipo2'], '1', [ 'class' => 'form-control' ]) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('rareza', 'Rareza', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::select('rareza', ['legendario' => 'Legendario', 'conjunto' => 'De conjunto'], 'legendario', [ 'class' => 'form-control' ]) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('conjunto', 'Conjunto', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::select('conjunto', ['1' => 'Conjunto1', '2' => 'Conjunto2'], null, [ 'placeholder' => 'Ninguno', 'class' => 'form-control' ]) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('efecto_objeto', 'Efecto legendario', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::textarea('efecto_objeto', null, [ 'placeholder' => 'Efecto legendario del objeto, en caso de no tener, déjalo vacío', 'class' => 'form-control' ]) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('foto', 'Foto del objeto', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::file('foto') }}
          </div>
        </div>

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
