@extends('layouts.admin')

@section('titulo')
  RUNAS
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-push-6 margen-sup">
          </div>

          <div class="col-xs-12 col-sm-6 col-sm-pull-6 margen-sup">
            <div>
              {{ $runas->links('pagination.limit_links') }}
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
                <th>Habilidad</th>
                <th>Descripción</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Restaurar</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($runas as $runa)
                <tr class="{{ $runa->trashed() ? 'inactive' : '' }}">
                  <td>{{ $runa->nombre }}</td>
                  <td>{{ $runa->habilidad->nombre }}</td>
                  <td>{{ $runa->descripcion }}</td>
                  <td><a href="{{ route('admin/runas/editar', [ $runa ]) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                  <td class="{{ $runa->trashed() ? 'inactive' : '' }}"><a href="{{ $runa->trashed() ? '#' : route('admin/deleteRuna', [ $runa ]) }}"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                  <td class="{{ $runa->trashed() ? '' : 'inactive' }}"><a href="{{ !$runa->trashed() ? '#' : route('admin/restoreRuna', [ $runa->getRouteKey() ]) }}"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-xs-12">
        <div>
          {{ $runas->links('pagination.limit_links') }}
        </div> <!-- Fin del div paginado -->
      </div>
    </div> <!-- Fin del div row -->

  </div>
@endsection
