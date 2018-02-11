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
              <tr class="inactive">
                <td>objeto1</td>
                <td><img src="{{ asset('img/objetos/default_item.png') }}" class="img-responsive foto-resumen" alt="objeto"></td>
                <td>Clase</td>
                <td>Tipo objeto</td>
                <td>Legendario</td>
                <td></td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis cum incidunt dolore, officia aspernatur dolorem deserunt voluptates dignissimos soluta. Et.</td>
                <td><a href="{{ route('admin/objetos/editar', ['1']) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                <td class="inactive"><a href="#"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                <td><a href="#"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
              </tr>

              <tr>
                <td>objeto1</td>
                <td><img src="{{ asset('img/objetos/default_item.png') }}" class="img-responsive foto-resumen" alt="objeto"></td>
                <td>Clase</td>
                <td>Tipo objeto</td>
                <td>De conjunto</td>
                <td>Nombre conjunto</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis cum incidunt dolore, officia aspernatur dolorem deserunt voluptates dignissimos soluta. Et.</td>
                <td><a href="{{ route('admin/objetos/editar', ['1']) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
                <td><a href="#"><span class="glyphicon glyphicon-remove boton-remove"></span></a></td>
                <td class="inactive"><a href="#"><span class="glyphicon glyphicon-repeat boton-restore"></span></a></td>
              </tr>

              <tr>
                <td>objeto1</td>
                <td><img src="{{ asset('img/objetos/default_item.png') }}" class="img-responsive foto-resumen" alt="objeto"></td>
                <td>Neutro</td>
                <td>Tipo objeto</td>
                <td>Legendario</td>
                <td></td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis cum incidunt dolore, officia aspernatur dolorem deserunt voluptates dignissimos soluta. Et.</td>
                <td><a href="{{ route('admin/objetos/editar', ['1']) }}"><span class="glyphicon glyphicon-pencil boton-edit"></span></a></td>
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
