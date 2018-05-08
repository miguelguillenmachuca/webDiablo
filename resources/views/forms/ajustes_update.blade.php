{{ Form::model( $usuario, [ 'url' => route('updateUsuario', [ $usuario ]), 'files' => 'true', 'class' => "form-horizontal" ]) }}
<div class="form-group">
  {{ Form::label('email', 'Correo electrónico', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::email('email') }}
  </div>
</div>

<div class="form-group">
  {{ Form::label('nombre', 'Nombre de usuario', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::text('nombre') }}
  </div>
</div>

<div class="separador"></div>
{{-- {{dd($errors)}} --}}
<h3>Ajustes básicos</h3>
@if($errors->any())
<div class="container-fluid">
  <h3>Hay errores en el formulario:</h3>
  @foreach ($errors->all() as $message)
    <p>{{ $message }}</p>

  @endforeach
</div>
@endif

<div class="form-group">
  {{ Form::label('pass_actual', 'Contraseña actual', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::password('pass_actual') }}
  </div>
</div>

<div class="form-group">
  {{ Form::label('password', 'Nueva contraseña', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::password('password') }}
  </div>
</div>

<div class="form-group">
  {{ Form::label('repitePassword', 'Repite la contraseña', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::password('repitePassword') }}
  </div>
</div>

<div class="separador"></div>

<h3>Avatar</h3>

<div class="form-group">
  {{ Form::label('foto', 'Cambiar avatar', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::file('foto') }}
  </div>
</div>

<div class="separador"></div>

{{ Form::button('Enviar los cambios', [ 'type' => 'submit', 'class' => 'btn btn-rojo btn-block-xs' ]) }}
{{ Form::button('Reiniciar los campos', [ 'type' => 'reset', 'class' => 'btn btn-rojo btn-block-xs' ]) }}
{{ Form::close() }}
