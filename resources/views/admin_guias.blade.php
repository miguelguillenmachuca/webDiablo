@extends('layouts.admin')

@section('titulo')
  GUÍAS
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-push-6 margen-sup">
            {{-- <div class="text-right">
              <a href="{{ route('admin/guias/crear') }}" class="btn btn-default btn-redondo btn-block-xs" role="button">Añadir nueva guia</a>
            </div> --}}
          </div>

          <div class="col-xs-12 col-sm-6 col-sm-pull-6 margen-sup">
            <div>
              {{ $guias->links('pagination.limit_links') }}
            </div> <!-- Fin del div paginado -->
          </div>
        </div> <!-- Fin del div row -->

      </div>

      <div class="col-xs-12">
        <div class="table-admin table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Clase</th>
                <th>Visibilidad</th>
                <th>Eliminar</th>
                <th>Restaurar</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($guias as $guia)
                <tr class="{{ $guia->trashed() ? 'inactive' : '' }}">
                  <td>{{ $guia->nombre }}</td>
                  <td>{{ $guia->usuario->nombre }}</td>
                  <td>{{ $guia->clase->nombre }}</td>
                  <td>{{ $guia->visibilidad }}</td>
                  <td class="{{ $guia->trashed() ? 'inactive' : '' }}"><a href="{{ $guia->trashed() ? '#' : route('admin/deleteGuia', [ $guia ]) }}"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                  <td class="{{ $guia->trashed() ? '' : 'inactive' }}"><a href="{{ !$guia->trashed() ? '#' : route('admin/restoreGuia', [ $guia->getRouteKey() ]) }}"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-xs-12">
        <div>
          {{ $guias->links('pagination.limit_links') }}
        </div> <!-- Fin del div paginado -->
      </div>
    </div> <!-- Fin del div row -->

  </div>
@endsection
