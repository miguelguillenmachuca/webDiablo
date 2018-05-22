@extends('layouts.app')

@section('content')
  <div id="main" class="container">

    {{ Form::open([ 'url' => route('guia/buscar'), 'method' => 'get', 'name' => 'filtrosBusqueda', 'id' => 'filtrosBusqueda', 'class' => 'formGuia' ]) }}
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <h3 class="text-center">Filtros</h3>
            <div class="row">
              <div class="col-xs-12 col-md-4 form-group" id="filtroNombre">
                {{ Form::label('nombre', 'Nombre de la guía') }}
                {{ Form::text('nombre', null, [ 'class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Nombre de la guía' ]) }}
              </div> <!-- Fin del div filtroNombre -->

              <div class="col-xs-12 col-md-4 form-group" id="filtroAutor">
                {{ Form::label('autorGuia', 'Autor de la guía') }}
                {{ Form::text('autorGuia', null, [ 'class' => 'form-control', 'id' => 'autorGuia', 'placeholder' => 'Autor de la guía' ]) }}
              </div> <!-- Fin del div filtroAutor -->

              <div class="col-xs-12 col-md-4 form-group" id="filtroClase">
                {{ Form::label('clase', 'Clase de la guía') }}
                {{ Form::select('clase', $clases, null, [ 'class' => 'form-control', 'id' => 'clase', 'placeholder' => 'Elige una clase' ]) }}
              </div> <!-- Fin del div filtroClase -->

            </div> <!-- Fin del div row -->

            <div class="margen-inf">
              {{ Form::submit('Filtrar guía', [ 'class' => 'btn btn-rojo btn-block-xs', 'id' => 'filtrarGuia' ]) }}
              {{ Form::reset('Vaciar campos', [ 'class' => 'btn btn-rojo btn-block-xs', 'id' => 'resetForm' ]) }}
            </div>

          </div>
        </div>

      </div> <!-- Fin del div container-fluid -->
    {{ Form::close() }}

    <div class="contenedor margen-inf">
      <h3 class="text-center">Guías</h3>

      <div class="container-fluid" id="paginado_sup">
        {{ $guias->links('pagination.limit_links_rojo') }}
      </div> <!-- Fin del div paginado_sup -->

      <div class="container-fluid" id="resumenGuias">
        <div class="table-responsive table-responsive-roja">
          <table class="table table-roja table-hover">
            <thead>
              <tr>
                <th>Clase</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Votos</th>
                <th>Comentarios</th>
                <th>Última modificación</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($guias as $guia)
                <tr>
                  <td><img src="{{ asset('/storage/app/public/' .$guia->clase->foto_clase) }}" alt="imagen" class="img-responsive img-clase-resumen"></td>
                  <td><a href="{{ route('guia/show', $guia->getRouteKey()) }}">{{ $guia->nombre }}</a></td>
                  <td><a href="{{ route('usuario/show', $guia->usuario->getRouteKey()) }}" class="enlace-usuario">{{ $guia->usuario->nombre }}</a></td>
                  <td class="likes">{{ $guia->get_num_likes() }}</td>
                  <td>{{ $guia->get_num_comentarios() }}</td>
                  <td>{{ $guia->updated_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div> <!-- Fin del div resumenGuias -->

      <div class="container-fluid" id="paginado_inf">
        {{ $guias->links('pagination.limit_links_rojo') }}
      </div> <!-- Fin del div paginado_inf -->

    </div>
  </div>

</div> <!-- Fin del div main -->
@endsection
