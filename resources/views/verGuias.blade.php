@extends('layouts.app')

@section('content')
  <div id="main" class="container">

    <form class="formGuia" id="filtrosBusqueda" name="filtrosBusqueda" action="listaGuias.php" method="post">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <h3 class="text-center">Filtros</h3>
            <div class="row">
              <div class="col-xs-12 col-md-4 form-group" id="filtroNombre">
                <label for="nombre">Nombre de la guía</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la guía">
              </div> <!-- Fin del div filtroNombre -->

              <div class="col-xs-12 col-md-4 form-group" id="filtroAutor">
                <label for="autorGuia">Autor de la guía</label>
                <input type="text" class="form-control" id="autorGuia" name="autorGuia" placeholder="Autor de la guía">
              </div> <!-- Fin del div filtroAutor -->

              <div class="col-xs-12 col-md-4 form-group" id="filtroClase">
                <label for="clase">Clase de la guía</label>
                <select class="form-control" name="clase" id="clase">
                  <option>Elige una clase</option>
                  <option value="1">Clase 1</option>
                </select>
              </div> <!-- Fin del div filtroClase -->

            </div> <!-- Fin del div row -->

            <div class="margen-inf">
              <input type="submit" class="btn btn-rojo btn-block-xs" id="filtrarGuia" name="filtrarGuia" value="Filtrar guia">
              <input type="reset" class="btn btn-rojo btn-block-xs" value="Vaciar campos">
            </div>

          </div>
        </div>

      </div> <!-- Fin del div container-fluid -->
    </form>

    <div class="contenedor margen-inf">
      <h3 class="text-center">Guías</h3>

      <div class="container-fluid" id="paginado_sup">
        <ul class="pagination pagination-rojo">
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
      </div> <!-- Fin del div paginado_sup -->

      <div class="container-fluid" id="resumenGuias">
        <div class="table-responsive table-responsive-roja">
          <table class="table table-roja table-hover">
            <thead>
              <tr>
                <th>Clase</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Votos</th>
                <th>Comentarios</th>
                <th>Última modificación</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><img src="{{ asset('/img/clases/default_class.png') }}" alt="imagen" class="img-responsive img-clase-resumen"></td>
                <td><a href="{{ route('guia/show', ['1']) }}">Guía de prueba</a></td>
                <td><a href="{{ route('usuario/show', ['asd']) }}" class="enlace-usuario">Autor</a></td>
                <td class="likes">123456789</td>
                <td>147</td>
                <td>12/12/2012</td>
              </tr>
              <tr>
                <td><img src="{{ asset('/img/clases/default_class.png') }}" alt="imagen" class="img-responsive img-clase-resumen"></td>
                <td><a href="{{ route('guia/show', ['1']) }}">Guía de prueba</a></td>
                <td><a href="{{ route('usuario/show', ['asd']) }}" class="enlace-usuario">Autor</a></td>
                <td class="likes">123456789</td>
                <td>147</td>
                <td>12/12/2012</td>
              </tr>
              <tr>
                <td><img src="{{ asset('/img/clases/default_class.png') }}" alt="imagen" class="img-responsive img-clase-resumen"></td>
                <td><a href="{{ route('guia/show', ['1']) }}">Guía de prueba</a></td>
                <td><a href="{{ route('usuario/show', ['asd']) }}" class="enlace-usuario">Autor</a></td>
                <td class="likes">123456789</td>
                <td>147</td>
                <td>12/12/2012</td>
              </tr>
              <tr>
                <td><img src="{{ asset('/img/clases/default_class.png') }}" alt="imagen" class="img-responsive img-clase-resumen"></td>
                <td><a href="{{ route('guia/show', ['1']) }}">Guía de prueba</a></td>
                <td><a href="{{ route('usuario/show', ['asd']) }}" class="enlace-usuario">Autor</a></td>
                <td class="likes">123456789</td>
                <td>147</td>
                <td>12/12/2012</td>
              </tr>
              <tr>
                <td><img src="{{ asset('/img/clases/default_class.png') }}" alt="imagen" class="img-responsive img-clase-resumen"></td>
                <td><a href="{{ route('guia/show', ['1']) }}">Guía de prueba</a></td>
                <td><a href="{{ route('usuario/show', ['asd']) }}" class="enlace-usuario">Autor</a></td>
                <td class="likes">123456789</td>
                <td>147</td>
                <td>12/12/2012</td>
              </tr>
              <tr>
                <td><img src="{{ asset('/img/clases/default_class.png') }}" alt="imagen" class="img-responsive img-clase-resumen"></td>
                <td><a href="{{ route('guia/show', ['1']) }}">Guía de prueba</a></td>
                <td><a href="{{ route('usuario/show', ['asd']) }}" class="enlace-usuario">Autor</a></td>
                <td class="likes">123456789</td>
                <td>147</td>
                <td>12/12/2012</td>
              </tr>
              <tr>
                <td><img src="{{ asset('/img/clases/default_class.png') }}" alt="imagen" class="img-responsive img-clase-resumen"></td>
                <td><a href="{{ route('guia/show', ['1']) }}">Guía de prueba</a></td>
                <td><a href="{{ route('usuario/show', ['asd']) }}" class="enlace-usuario">Autor</a></td>
                <td class="likes">123456789</td>
                <td>147</td>
                <td>12/12/2012</td>
              </tr>
              <tr>
                <td><img src="{{ asset('/img/clases/default_class.png') }}" alt="imagen" class="img-responsive img-clase-resumen"></td>
                <td><a href="{{ route('guia/show', ['1']) }}">Guía de prueba</a></td>
                <td><a href="{{ route('usuario/show', ['asd']) }}" class="enlace-usuario">Autor</a></td>
                <td class="likes">123456789</td>
                <td>147</td>
                <td>12/12/2012</td>
              </tr>
              <tr>
                <td><img src="{{ asset('/img/clases/default_class.png') }}" alt="imagen" class="img-responsive img-clase-resumen"></td>
                <td><a href="{{ route('guia/show', ['1']) }}">Guía de prueba</a></td>
                <td><a href="{{ route('usuario/show', ['asd']) }}" class="enlace-usuario">Autor</a></td>
                <td class="likes">123456789</td>
                <td>147</td>
                <td>12/12/2012</td>
              </tr>
              <tr>
                <td><img src="{{ asset('/img/clases/default_class.png') }}" alt="imagen" class="img-responsive img-clase-resumen"></td>
                <td><a href="{{ route('guia/show', ['1']) }}">Guía de prueba</a></td>
                <td><a href="{{ route('usuario/show', ['asd']) }}" class="enlace-usuario">Autor</a></td>
                <td class="likes">123456789</td>
                <td>147</td>
                <td>12/12/2012</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div> <!-- Fin del div resumenGuias -->

      <div class="container-fluid" id="paginado_inf">
        <ul class="pagination pagination-rojo">
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
      </div> <!-- Fin del div paginado_inf -->

    </div>
  </div>

</div> <!-- Fin del div main -->
@endsection
