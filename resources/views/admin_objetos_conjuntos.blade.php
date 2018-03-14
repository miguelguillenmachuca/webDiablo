@extends('layouts.admin')

@section('titulo')
  CONJUNTOS DE OBJETOS
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-push-6 margen-sup">
            <div class="text-right">
              <a href="{{ route('admin/objetos/conjuntos/crear') }}" class="btn btn-default btn-redondo btn-block-xs" role="button">Añadir nuevo conjunto</a>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-sm-pull-6 margen-sup">
            <div>
              {{ $conjuntos->links('pagination.limit_links') }}
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
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Restaurar</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($conjuntos as $conjunto)
                <tr class="{{ $conjunto->trashed() ? 'inactive' : '' }}">
                  <td>{{ $conjunto->nombre }}</td>
                  <td><a href="{{ route('admin/objetos/conjuntos/editar', [ $conjunto ]) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                  <td class="{{ $conjunto->trashed() ? 'inactive' : '' }}"><a href="{{ $conjunto->trashed() ? '#' : route('admin/deleteConjunto', [ $conjunto ]) }}"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                  <td class="{{ $conjunto->trashed() ? '' : 'inactive' }}"><a href="{{ !$conjunto->trashed() ? '#' : route('admin/restoreConjunto', [ $conjunto->getRouteKey() ]) }}"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-xs-12">
        <div>
          {{ $conjuntos->links('pagination.limit_links') }}
        </div> <!-- Fin del div paginado -->
      </div>
    </div> <!-- Fin del div row -->

  </div>
@endsection
