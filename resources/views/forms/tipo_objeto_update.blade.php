@extends('layouts.admin')

@section('titulo')
  EDITAR TIPO DE OBJETO
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-offset-2 col-sm-8">
        @if(session('success') == true)
          @include('exito')
        @endif
        
        {{ Form::model($tipo_objeto, [ 'url' => route('admin/updateTipoObjeto', [ $tipo_objeto ]), 'class' => 'form-horizontal' ]) }}
        <div class="form-group{{ $errors->has('nombre') ? ' has-error': '' }}">
          {{ Form::label('nombre', 'Nombre del tipo', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
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
          {{ Form::label('id_clase', 'Clase', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::select('id_clase', $clases, $default_clase, [ 'placeholder' => 'Ninguna', 'class' => 'form-control' ]) }}
            @if($errors->has('id_clase'))
              @foreach ($errors->get('id_clase') as $message)
                <span class="help-block text-error">{{ $message }}</span>
              @endforeach
            @endif
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('categoria_obj', 'Categoría', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::select('categoria_obj', $categorias, $tipo_objeto->categoria_obj, [ 'class' => 'form-control' ]) }}
            @if($errors->has('categoria_obj'))
              @foreach ($errors->get('categoria_obj') as $message)
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
