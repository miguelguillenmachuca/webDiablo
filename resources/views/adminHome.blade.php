@extends('layouts.admin')

@section('titulo')
  ADMINISTRACIÓN
@endsection

@section('content')
  <div id="main-content" class="container-fluid text-center">
    <p>Bienvenido a la sección de administración, {{ Auth::user()->nombre }}</p>
  </div> <!-- Fin del div main -->
@endsection
