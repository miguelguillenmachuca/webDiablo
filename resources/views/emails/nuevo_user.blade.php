@extends('layouts.email')

@section('titulo')
  Bienvenido a WebDiablo
@endsection

@section('content')
  <div id="main-content" class="container">
    <p>Hola, {{ $user->nombre }},</p>
    <br>
    <p>te damos la bienvenida a <a href="https://webdiablo.000webhostapp.com/public/index.php">WebDiablo</a>. Esperamos que disfrutes haciendo uso de nuestra página.</p>
  </div>
@endsection
