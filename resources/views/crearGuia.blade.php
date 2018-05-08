@extends('layouts.app')

@section('content')
<div id="main" class="container">
  <h3 class="text-center">Elige una clase</h3>

  <div class="row margen-inf">
    @php
      $col = 0;
    @endphp
    @foreach ($clases as $clase)
      @if ($col == 0)
        @php
          $offset = ''
        @endphp
      @else
        @php
          $offset = 'col-sm-offset-2'
        @endphp
      @endif
      <div class="col-xs-6 col-sm-5 {{ $offset }} contenedor margen-sup">
        <div class="row">
          <div class="col-xs-4 col-sm-3 col-md-2">
            <a href="{{ route('formularioCrearGuia', [ $clase ]) }}" class="enlace-guia"><img src="{{ asset('../storage/app/public/' .$clase->foto_clase) }}" alt="imagen {{ $clase->nombre }}" class="img-responsive"></a>
          </div>
          <div class="col-xs-8 col-sm-9 col-md-10">
            <h4><a href="{{ route('formularioCrearGuia', [ $clase ]) }}" class="enlace-guia">{{ $clase->nombre }}</a></h4>
          </div>
        </div>
      </div>
      @php
      $col = ($col+1)%2;
      @endphp
    @endforeach
  </div>

</div> <!-- Fin del div main -->
@endsection
