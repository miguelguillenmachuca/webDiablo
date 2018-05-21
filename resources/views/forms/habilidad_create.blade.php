@extends('layouts.admin')

@section('titulo')
  CREAR HABILIDAD
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-offset-2 col-sm-8">
        {{ Form::open([ 'url' => route('admin/createHabilidad'), 'files' => 'true', 'class' => 'form-horizontal' ]) }}

        <div class="form-group">
          {{ Form::label('nombre', 'Nombre de la habilidad', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
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
            {{ Form::select('id_clase', $clases, null, [ 'class' => 'form-control' ]) }}
            @if($errors->has('id_clase'))
              @foreach ($errors->get('id_clase') as $message)
                <span class="help-block text-error">{{ $message }}</span>
              @endforeach
            @endif
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('descripcion', 'Descripción', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::textarea('descripcion', null, [ 'class' => 'form-control' ]) }}
            @if($errors->has('descripcion'))
              @foreach ($errors->get('descripcion') as $message)
                <span class="help-block text-error">{{ $message }}</span>
              @endforeach
            @endif
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('foto', 'Foto de la habilidad', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::file('foto') }}
          </div>
        </div>

        @if (!$pasiva)
          <h3 class="text-center">Runas</h3>

          <div class="form-group">
            {{ Form::label('runa1', 'Nombre runa 1', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
            <div class="col-sm-6 col-md-6">
              {{ Form::text('runa1', null, [ 'class' => 'form-control' ]) }}
              @if($errors->has('runa1'))
                @foreach ($errors->get('runa1') as $message)
                  <span class="help-block text-error">{{ $message }}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="form-group">
            {{ Form::label('runa2', 'Nombre runa 2', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
            <div class="col-sm-6 col-md-6">
              {{ Form::text('runa2', null, [ 'class' => 'form-control' ]) }}
              @if($errors->has('runa2'))
                @foreach ($errors->get('runa2') as $message)
                  <span class="help-block text-error">{{ $message }}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="form-group">
            {{ Form::label('runa3', 'Nombre runa 3', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
            <div class="col-sm-6 col-md-6">
              {{ Form::text('runa3', null, [ 'class' => 'form-control' ]) }}
              @if($errors->has('runa3'))
                @foreach ($errors->get('runa3') as $message)
                  <span class="help-block text-error">{{ $message }}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="form-group">
            {{ Form::label('runa4', 'Nombre runa 4', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
            <div class="col-sm-6 col-md-6">
              {{ Form::text('runa4', null, [ 'class' => 'form-control' ]) }}
              @if($errors->has('runa4'))
                @foreach ($errors->get('runa4') as $message)
                  <span class="help-block text-error">{{ $message }}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="form-group">
            {{ Form::label('runa5', 'Nombre runa 5', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
            <div class="col-sm-6 col-md-6">
              {{ Form::text('runa5', null, [ 'class' => 'form-control' ]) }}
              @if($errors->has('runa5'))
                @foreach ($errors->get('runa5') as $message)
                  <span class="help-block text-error">{{ $message }}</span>
                @endforeach
              @endif
            </div>
          </div>

          {{ Form::hidden('tipoHabilidad', 'activa') }}
        @else
          {{ Form::hidden('tipoHabilidad', 'pasiva') }}
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
