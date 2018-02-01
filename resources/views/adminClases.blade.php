@extends('layouts.admin')

@section('content')
  <div id="main" class="container">
    <h2 class="text-center">CLASES</h2>

    <div>
      <a href="{{ route('admin/clases/crear') }}" class="btn btn-default btn-redondo btn-block-xs" role="button">Añadir nueva clase</a>
    </div>

    <div>
      <ul class="pagination pagination-redondo">
        <li>
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </div> <!-- Fin del div paginado -->

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
          <tr>
            <td>Clase1</td>
            <td><img src="{{ asset('img/clases/default_class.png') }}" class="img-responsive foto-resumen" alt="clase"></td>
            <td><a href="#"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
            <td><a href="#"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
            <td><a href="#"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
          </tr>

          <tr>
            <td>Clase1</td>
            <td><img src="{{ asset('img/clases/default_class.png') }}" class="img-responsive foto-resumen" alt="clase"></td>
            <td><a href="#"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
            <td><a href="#"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
            <td><a href="#"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
          </tr>

          <tr>
            <td>Clase1</td>
            <td><img src="{{ asset('img/clases/default_class.png') }}" class="img-responsive foto-resumen" alt="clase"></td>
            <td><a href="#"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
            <td><a href="#"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
            <td><a href="#"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div>
      <ul class="pagination pagination-redondo">
        <li>
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </div> <!-- Fin del div paginado -->


  </div> <!-- Fin del div main -->
@endsection
