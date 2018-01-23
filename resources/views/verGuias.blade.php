@extends('layouts.app')

@section('content')
  <div id="main" class="container">
    <form id="filtrosBusqueda" name="filtrosBusqueda" action="listaGuias.php" method="get">
      <div class="container-fluid contenedor">
        <h3 class="text-center">Filtros</h3>
        <div class="row">
          <div class="col-xs-12 col-md-4 form-group" id="filtroNombre">
            <label for="nombre">Nombre de la guía</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la guía">
          </div> <!-- Fin del div filtroNombre -->

          <div class="col-xs-12 col-md-4 form-group" id="filtroAutor">
            <label for="autorGuia">Autor de la guía</label>
            <input type="text" class="form-control" id="autorGuia" name="autorGuia" placeholder="Autor de la guía">
          </div> <!-- Fin del div filtroAutor -->

          <div class="col-xs-12 col-md-4 form-group" id="filtroClase">
            <label for="clase">Clase de la guía</label>
            <select class="form-control" name="clase" id="clase">
              <option>Elige una clase</option>
              <option value="1">Clase 1</option>
            </select>
          </div> <!-- Fin del div filtroClase -->

        </div> <!-- Fin del div row -->

      </div> <!-- Fin del div container-fluid contenedor -->
    </form>

  </div> <!-- Fin del div main -->
@endsection
