@extends('layouts.admin')

@section('titulo')
  EDITAR CONJUNTO
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-offset-2 col-sm-8">
        {{ Form::model($conjunto, [ 'url' => route('admin/updateConjunto', [ $conjunto ]), 'files' => 'true', 'class' => 'form-horizontal' ]) }}

        <div class="form-group">
          {{ Form::label('nombre', 'Nombre del conjunto', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::text('nombre', null, [ 'class' => 'form-control', 'placeholder' => 'nombre del conjunto' ]) }}
            @if($errors->has('nombre'))
              @foreach ($errors->get('nombre') as $message)
                <span class="help-block text-error">{{ $message }}</span>
              @endforeach
            @endif
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
