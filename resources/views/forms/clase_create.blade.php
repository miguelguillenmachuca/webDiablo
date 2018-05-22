@extends('layouts.admin')

@section('titulo')
  CREAR CLASE
@endsection

@section('content')
  <div id="main-content" class="container-fluid">

    <div class="row">
      <div class="col-xs-12 col-sm-offset-2 col-sm-8">
        @if(session('success') == true)
          @include('exito')
        @endif
        
        {{ Form::open([ 'url' => route('admin/createClase'), 'files' => 'true', 'class' => 'form-horizontal' ]) }}
        <div class="form-group{{ $errors->has('nombre') ? ' has-error': '' }}">
          {{ Form::label('nombre', 'Nombre de la clase', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::text('nombre', null, [ 'class' => 'form-control' ]) }}
            @if($errors->has('nombre'))
              @foreach ($errors->get('nombre') as $message)
                <span class="help-block text-error">{{ $message }}</span>
              @endforeach
            @endif
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('foto', 'Foto de la clase', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::file('foto') }}
            @if($errors->has('foto'))
              @foreach ($errors->get('foto') as $message)
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
