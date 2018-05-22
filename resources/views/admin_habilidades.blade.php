@extends('layouts.admin')

@section('titulo')
  HABILIDADES
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-push-6 margen-sup">
            <div class="text-right">
              <div class="btn-group">
                <a href="{{ route('admin/habilidades/crear') }}" class="btn btn-default btn-redondo" role="button">Añadir habilidad</a>
                <a href="{{ route('admin/habilidades/pasiva/crear') }}" class="btn btn-default btn-redondo" role="button">Añadir habilidad pasiva</a>
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-sm-pull-6 margen-sup">
            <div>
              {{ $habilidades->links('pagination.limit_links') }}
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
                <th>Foto</th>
                <th>Clase</th>
                <th>Tipo habilidad</th>
                <th>Descripción</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Restaurar</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($habilidades as $habilidad)
                <tr class="{{ $habilidad->trashed() ? 'inactive' : '' }}">
                  <td>{{ $habilidad->nombre }}</td>
                  <td><img src="{{ asset('/storage/app/public/' .$habilidad->foto_habilidad) }}" class="img-responsive foto-resumen" alt="foto habilidad"></td>
                  <td>{{ $habilidad->clase->nombre }}</td>
                  <td>{{ $habilidad->tipo_habilidad }}</td>
                  <td>{{ $habilidad->descripcion }}</td>
                  <td><a href="{{ route('admin/habilidades/editar', [ $habilidad ]) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                  <td class="{{ $habilidad->trashed() ? 'inactive' : '' }}"><a href="{{ $habilidad->trashed() ? '#' : route('admin/deleteHabilidad', [ $habilidad ]) }}"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                  <td class="{{ $habilidad->trashed() ? '' : 'inactive' }}"><a href="{{ !$habilidad->trashed() ? '#' : route('admin/restoreHabilidad', [ $habilidad->getRouteKey() ]) }}"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-xs-12">
        <div>
          {{ $habilidades->links('pagination.limit_links') }}
        </div> <!-- Fin del div paginado -->
      </div>
    </div> <!-- Fin del div row -->

  </div>
@endsection
