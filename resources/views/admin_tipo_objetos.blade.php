@extends('layouts.admin')

@section('titulo')
  OBJETOS
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-push-6 margen-sup">
            <div class="text-right">
              <a href="{{ route('admin/objetos/tipos/crear') }}" class="btn btn-default btn-redondo btn-block-xs" role="button">Añadir nuevo tipo de objeto</a>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-sm-pull-6 margen-sup">
            <div>
              {{ $tipo_objetos->links('pagination.limit_links') }}
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
                <th>Clase</th>
                <th>Categoría</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Restaurar</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($tipo_objetos as $tipo_objeto)
                <tr class="{{ $tipo_objeto->trashed() ? 'inactive' : '' }}">
                  <td>{{ $tipo_objeto->nombre }}</td>
                  @if ($tipo_objeto->clase != null)
                    <td>{{ $tipo_objeto->clase->nombre }}</td>
                  @else
                    <td>Multiclase</td>
                  @endif
                  <td>{{ $tipo_objeto->categoria_obj }}</td>
                  <td><a href="{{ route('admin/objetos/tipos/editar', [ $tipo_objeto ]) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                  <td class="{{ $tipo_objeto->trashed() ? 'inactive' : '' }}"><a href="{{ $tipo_objeto->trashed() ? '#' : route('admin/deleteTipoObjeto', [ $tipo_objeto ]) }}"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                  <td class="{{ $tipo_objeto->trashed() ? '' : 'inactive' }}"><a href="{{ !$tipo_objeto->trashed() ? '#' : route('admin/restoreTipoObjeto', [ $tipo_objeto->getRouteKey() ]) }}"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-xs-12">
        <div>
          {{ $tipo_objetos->links('pagination.limit_links') }}
        </div> <!-- Fin del div paginado -->
      </div>
    </div> <!-- Fin del div row -->

  </div>
@endsection
