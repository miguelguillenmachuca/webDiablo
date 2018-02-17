@extends('layouts.admin')

@section('titulo')
  EDITAR USUARIO
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-offset-2 col-sm-8">
        {{ Form::model($usuario, [ 'url' => route('admin/updateUser', [ $usuario ]), 'files' => 'true', 'class' => 'form-horizontal' ]) }}
        <div class="form-group{{ $errors->has('nombre') ? ' has-error': '' }}">
          {{ Form::label('nombre', 'Nombre del usuario', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::text('nombre', null, [ 'class' => 'form-control' ]) }}
            @if($errors->has('nombre'))
              @foreach ($errors->get('nombre') as $message)
                <span class="help-block">{{ $message }}</span>
              @endforeach
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error': '' }}">
          {{ Form::label('email', 'E-mail', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::email('email', null, [ 'class' => 'form-control' ]) }}
            @if($errors->has('email'))
              @foreach ($errors->get('email') as $message)
                <span class="help-block">{{ $message }}</span>
              @endforeach
            @endif
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('tipo_usuario', 'Tipo de usuario', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::select('tipo_usuario', [ 'administrador' => 'Administrador', 'usuario' => 'Usuario' ], null, [ 'class' => 'form-control' ]) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('foto', 'Foto de la habilidad', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
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
