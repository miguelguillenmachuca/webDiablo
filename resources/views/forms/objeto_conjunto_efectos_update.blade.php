@extends('layouts.admin')

@section('titulo')
  EDITAR EFECTO DE CONJUNTO
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-offset-2 col-sm-8">
        {{ Form::model( $efecto_conjunto, [ 'url' => route('admin/updateEfectoConjunto', $efecto_conjunto), 'class' => 'form-horizontal' ]) }}

        <div class="form-group">
          {{ Form::label('id_conjunto', 'Conjunto', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::select('id_conjunto', $conjuntos, $default, [ 'class' => 'form-control' ]) }}
            @if($errors->has('id_conjunto'))
              @foreach ($errors->get('id_conjunto') as $message)
                <span class="help-block">{{ $message }}</span>
              @endforeach
            @endif
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('num_requisito', 'Nº de piezas', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::number('num_requisito', null, [ 'class' => 'form-control' ]) }}
            @if($errors->has('num_requisito'))
              @foreach ($errors->get('num_requisito') as $message)
                <span class="help-block">{{ $message }}</span>
              @endforeach
            @endif
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('efecto', 'Efecto', [ 'class' => 'control-label col-sm-6 col-md-4' ]) }}
          <div class="col-sm-6 col-md-6">
            {{ Form::textarea('efecto', null, [ 'class' => 'form-control' ]) }}
            @if($errors->has('efecto'))
              @foreach ($errors->get('efecto') as $message)
                <span class="help-block">{{ $message }}</span>
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
