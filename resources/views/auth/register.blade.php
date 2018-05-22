@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel contenedor">
                <h3 class="text-center bold">Registro</h3>

                <div class="panel-body resumen-guia">
                    <form id="register_form" class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div id="name_container" class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name_register" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                <span class="help-block" id="name_errors">
                                @if ($errors->has('name'))
                                        <strong>{{ $errors->first('name') }}</strong>
                                @endif
                              </span>
                            </div>
                        </div>

                        <div id="email_container" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email_register" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                <span class="help-block" id="email_errors">
                                @if ($errors->has('email'))
                                        <strong>{{ $errors->first('email') }}</strong>
                                @endif
                              </span>
                            </div>
                        </div>

                        <div id="password_container" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password_register" type="password" class="form-control" name="password" required>

                                <span class="help-block" id="password_errors">
                                @if ($errors->has('password'))
                                        <strong>{{ $errors->first('password') }}</strong>
                                @endif
                              </span>
                            </div>
                        </div>

                        <div id="password-confirm_container" class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirma la contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm_register" type="password" class="form-control" name="password_confirmation" required>

                                <span class="help-block" id="password-confirm_errors">
                                @if ($errors->has('password_confirmation'))
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                @endif
                              </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="submit">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
