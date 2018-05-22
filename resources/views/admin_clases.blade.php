@extends('layouts.admin')

@section('titulo')
  CLASES
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-push-6 margen-sup">
            <div class="text-right">
              <a href="{{ route('admin/clases/crear') }}" class="btn btn-default btn-redondo btn-block-xs" role="button">Añadir nueva clase</a>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-sm-pull-6 margen-sup">
            <div>
              {{ $clases->links('pagination.limit_links') }}
            </div> <!-- Fin del div paginado -->
          </div>
        </div> <!-- Fin del div row -->

      </div>

      <div class="col-xs-12">
        <div class="table-admin table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-xs-3">Nombre</th>
                <th class="col-xs-3">Foto</th>
                <th class="col-xs-2">Editar</th>
                <th class="col-xs-2">Eliminar</th>
                <th class="col-xs-2">Restaurar</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($clases as $clase)
                <tr class="{{ $clase->trashed() ? 'inactive' : '' }}">
                  <td>{{ $clase->nombre }}</td>
                  <td><img src="{{ asset('/storage/app/public/' .$clase->foto_clase) }}" class="img-responsive foto-resumen" alt="foto clase"></td>
                  <td><a href="{{ route('admin/clases/editar', [ $clase ]) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                  <td class="{{ $clase->trashed() ? 'inactive' : '' }}"><a href="{{ $clase->trashed() ? '#' : route('admin/deleteClase', [ $clase ]) }}"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                  <td class="{{ $clase->trashed() ? '' : 'inactive' }}"><a href="{{ !$clase->trashed() ? '#' : route('admin/restoreClase', [ $clase->getRouteKey() ]) }}"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-xs-12">
        <div>
          {{ $clases->links('pagination.limit_links') }}
        </div> <!-- Fin del div paginado -->
      </div>
    </div> <!-- Fin del div row -->

  </div>
@endsection
