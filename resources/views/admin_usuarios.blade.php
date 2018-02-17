@extends('layouts.admin')

@section('titulo')
  USUARIOS
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-push-6 margen-sup">
            {{-- <div class="text-right">
              <a href="{{ route('admin/usuarios/crear') }}" class="btn btn-default btn-redondo btn-block-xs" role="button">Añadir nueva clase</a>
            </div> --}}
          </div>

          <div class="col-xs-12 col-sm-6 col-sm-pull-6 margen-sup">
            <div>
              {{ $users->links('pagination.limit_links') }}
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
                <th>E-mail</th>
                <th>Tipo usuario</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Restaurar</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($users as $key => $value)
                <tr class="{{ $value->trashed() ? 'inactive' : '' }}">
                  <td>{{ $value->nombre }}</td>
                  <td><img src="{{ asset('storage/' .$value->foto_usuario) }}" class="img-responsive foto-resumen" alt="foto_usuario"></td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->tipo_usuario }}</td>
                  <td><a href="{{ route('admin/usuarios/editar', [ $value ]) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                  <td class="{{ $value->trashed() ? 'inactive' : '' }}"><a href="{{ $value->trashed() ? '#' : route('admin/deleteUser', [ $value ]) }}"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                  <td class="{{ $value->trashed() ? '' : 'inactive' }}"><a href="{{ !$value->trashed() ? '#' : route('admin/restoreUser', [ $value->getRouteKey() ]) }}"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-xs-12">
        <div>
          {{ $users->links('pagination.limit_links') }}
        </div> <!-- Fin del div paginado -->
      </div>
    </div> <!-- Fin del div row -->

  </div>
@endsection
