@extends('layouts.email')

@section('titulo')
  Cambio de contraseña
@endsection

@section('content')
  <div id="main-content" class="container">
    <p>Hola, {{ $user->nombre }},</p>
    <br>
    <p>te informamos de que se ha cambiado satisfactoriamente la contraseña de tu cuenta de <a href="https://webdiablo.000webhostapp.com/public/index.php">WebDiablo</a></p>
  </div>
@endsection
