@extends('layouts.app')

@section('content')
  <div id="main" class="container">
    <div class="container-fluid contenedor-top-guia">
      <h1>ERROR</h1>

      <h3>{{ $exception->getMessage() }}</h3>
    </div>
  </div> <!-- Fin del div main -->
@endsection
