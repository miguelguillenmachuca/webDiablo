@extends('layouts.admin')

@section('titulo')
  CREAR EFECTO DE CONJUNTO
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-offset-2 col-sm-8">
        {{ Form::open([ 'url' => '#', 'files' => 'true', 'class' => 'form-horizontal' ]) }}

        <div class="form-group">
          {{ Form::label('id_conjunto', 'Conjunto', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::select('id_conjunto', [ '1' => 'Conjunto1', '2' => 'Conjunto2' ], '1', [ 'class' => 'form-control' ]) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('num_requisito', 'Nº de piezas', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::number('num_requisito', 0, [ 'class' => 'form-control' ]) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('efecto', 'Efecto', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::textarea('efecto', null, [ 'class' => 'form-control' ]) }}
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
