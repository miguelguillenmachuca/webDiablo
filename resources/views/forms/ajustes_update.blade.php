{{ Form::open([ 'url' => '#', 'files' => 'true', 'class' => "form-horizontal" ]) }}
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

<h3>Ajustes básicos</h3>

<div class="form-group">
  {{ Form::label('pass_actual', 'Contraseña actual', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::password('pass_actual') }}
  </div>
</div>

<div class="form-group">
  {{ Form::label('pass', 'Nueva contraseña', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::password('pass') }}
  </div>
</div>

<div class="form-group">
  {{ Form::label('repite_pass', 'Repite la contraseña', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::password('repite_pass') }}
  </div>
</div>

<div class="separador"></div>

<h3>Avatar</h3>

<div class="form-group">
  {{ Form::label('avatar', 'Cambiar avatar', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::file('avatar') }}
  </div>
</div>

<div class="separador"></div>

{{ Form::button('Enviar los cambios', [ 'type' => 'submit', 'class' => 'btn btn-rojo btn-block-xs' ]) }}
{{ Form::button('Reiniciar los campos', [ 'type' => 'reset', 'class' => 'btn btn-rojo btn-block-xs' ]) }}
{{ Form::close() }}
