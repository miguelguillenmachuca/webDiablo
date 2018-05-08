{{ Form::model( $usuario, [ 'url' => route('updateUsuario', [ $usuario ]), 'files' => 'true', 'class' => "form-horizontal" ]) }}
<div class="form-group">
  {{ Form::label('email', 'Correo electrónico', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::email('email') }}
    @if($errors->has('email'))
      @foreach ($errors->get('email') as $message)
        <span class="help-block">{{ $message }}</span>
      @endforeach
    @endif
  </div>
</div>

<div class="form-group">
  {{ Form::label('nombre', 'Nombre de usuario', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::text('nombre') }}
    @if($errors->has('nombre'))
      @foreach ($errors->get('nombre') as $message)
        <span class="help-block">{{ $message }}</span>
      @endforeach
    @endif
  </div>
</div>

<div class="separador"></div>

<h3>Ajustes básicos</h3>


<div class="form-group">
  {{ Form::label('pass_actual', 'Contraseña actual', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::password('pass_actual') }}
    @if($errors->has('pass_actual'))
      @foreach ($errors->get('pass_actual') as $message)
        <span class="help-block">{{ $message }}</span>
      @endforeach
    @endif
  </div>
</div>

<div class="form-group">
  {{ Form::label('password', 'Nueva contraseña', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::password('password') }}
    @if($errors->has('password'))
      @foreach ($errors->get('password') as $message)
        <span class="help-block">{{ $message }}</span>
      @endforeach
    @endif
  </div>
</div>

<div class="form-group">
  {{ Form::label('repitePassword', 'Repite la contraseña', [ 'class' => 'control-label col-sm-2 text-right' ]) }}
  <div class="col-sm-10">
    {{ Form::password('repitePassword') }}
    @if($errors->has('repitePassword'))
      @foreach ($errors->get('repitePassword') as $message)
        <span class="help-block">{{ $message }}</span>
      @endforeach
    @endif
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
