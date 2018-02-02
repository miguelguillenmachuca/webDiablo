@extends('layouts.app')

@section('content')
  <div id="main" class="container">

    <div class="container-fluid contenedor margen-inf">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <h2 class="text-center">Cambiar ajustes</h2>

          <div class="margen-inf">
            <h3>Ajustes de cuenta</h3>
            @include('forms.ajustes_update')
          </div>
        </div>
      </div>
    </div>

  </div> <!-- Fin del div main -->
@endsection
