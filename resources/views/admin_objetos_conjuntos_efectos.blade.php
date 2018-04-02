@extends('layouts.admin')

@section('titulo')
  EFECTOS DE CONJUNTOS DE OBJETOS
@endsection

@section('content')
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-push-6 margen-sup">
            <div class="text-right">
              <a href="{{ route('admin/objetos/conjuntos/efectos/crear') }}" class="btn btn-default btn-redondo btn-block-xs" role="button">Añadir nuevo efecto</a>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-sm-pull-6 margen-sup">
            <div>
              {{ $efectos_conjuntos->links('pagination.limit_links') }}
            </div> <!-- Fin del div paginado -->
          </div>
        </div> <!-- Fin del div row -->

      </div>

      <div class="col-xs-12">
        <div class="table-admin table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Conjunto</th>
                <th>Nº de piezas</th>
                <th>Efecto</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Restaurar</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($efectos_conjuntos as $efecto_conjunto)
                <tr class="{{ $efecto_conjunto->trashed() ? 'inactive' : '' }}">
                  <td>{{ $efecto_conjunto->conjunto->nombre }}</td>
                  <td>{{ $efecto_conjunto->num_requisito }}</td>
                  <td>{{ $efecto_conjunto->efecto }}</td>
                  <td><a href="{{ route('admin/objetos/conjuntos/efectos/editar', [ $efecto_conjunto ]) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                  <td class="{{ $efecto_conjunto->trashed() ? 'inactive' : '' }}"><a href="{{ $efecto_conjunto->trashed() ? '#' : route('admin/deleteEfectoConjunto', [ $efecto_conjunto ]) }}"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                  <td class="{{ $efecto_conjunto->trashed() ? '' : 'inactive' }}"><a href="{{ !$efecto_conjunto->trashed() ? '#' : route('admin/restoreEfectoConjunto', [ $efecto_conjunto->getRouteKey() ]) }}"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-xs-12">
        <div>
          {{ $efectos_conjuntos->links('pagination.limit_links') }}
        </div> <!-- Fin del div paginado -->
      </div>
    </div> <!-- Fin del div row -->

  </div>
@endsection
