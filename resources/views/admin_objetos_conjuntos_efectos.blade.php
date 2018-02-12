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
              <tr class="inactive">
                <td>conjunto1</td>
                <td>2</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat porro, nobis totam et, voluptatibus delectus praesentium iure iusto consequatur tempore!</td>
                <td><a href="{{ route('admin/objetos/conjuntos/efectos/editar', ['1']) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                <td class="inactive"><a href="#"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                <td><a href="#"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
              </tr>

              <tr>
                <td>conjunto1</td>
                <td>2</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat porro, nobis totam et, voluptatibus delectus praesentium iure iusto consequatur tempore!</td>
                <td><a href="{{ route('admin/objetos/conjuntos/efectos/editar', ['1']) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                <td><a href="#"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                <td class="inactive"><a href="#"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
              </tr>

              <tr>
                <td>conjunto1</td>
                <td>2</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat porro, nobis totam et, voluptatibus delectus praesentium iure iusto consequatur tempore!</td>
                <td><a href="{{ route('admin/objetos/conjuntos/efectos/editar', ['1']) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                <td><a href="#"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                <td class="inactive"><a href="#"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-xs-12">
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
      </div>
    </div> <!-- Fin del div row -->

  </div>
@endsection
