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
