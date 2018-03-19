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
              <a href="{{ route('admin/objetos/crear') }}" class="btn btn-default btn-redondo btn-block-xs" role="button">Añadir nuevo objeto</a>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-sm-pull-6 margen-sup">
            <div>
              {{ $objetos->links('pagination.limit_links') }}
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
                <th>Tipo de objeto</th>
                <th>Rareza</th>
                <th>Conjunto</th>
                <th>Efecto legendario</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Restaurar</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($objetos as $objeto)
                <tr class="{{ $objeto->trashed() ? 'inactive' : '' }}">
                  <td>{{ $objeto->nombre }}</td>
                  <td><img src="{{ asset('storage/' .$objeto->foto_habilidad) }}" class="img-responsive foto-resumen" alt="foto objeto"></td>

                  @if($objeto->clase != null)
                    <td>{{ $objeto->clase->nombre }}</td>
                  @else
                    <td>Multiclase</td>
                  @endif

                  <td>{{ $objeto->tipo_objeto }}</td>
                  <td>{{ $objeto->rareza }}</td>

                  @if($objeto->conjunto != null)
                    <td>{{ $objeto->conjunto->nombre }}</td>
                  @else
                    <td>Sin conjunto</td>
                  @endif
                  <td>{{ $objeto->efecto_legendario }}</td>
                  <td><a href="{{ route('admin/objetos/editar', [ $objeto ]) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                  <td class="{{ $objeto->trashed() ? 'inactive' : '' }}"><a href="{{ $objeto->trashed() ? '#' : route('admin/deleteObjeto', [ $objeto ]) }}"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                  <td class="{{ $objeto->trashed() ? '' : 'inactive' }}"><a href="{{ !$objeto->trashed() ? '#' : route('admin/restoreObjeto', [ $objeto->getRouteKey() ]) }}"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-xs-12">
        <div>
          {{ $objetos->links('pagination.limit_links') }}
        </div> <!-- Fin del div paginado -->
      </div>
    </div> <!-- Fin del div row -->

  </div>
@endsection
