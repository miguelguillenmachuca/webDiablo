<div id="contenido_toggle">

</div>

<div id="hueco_sidebar">
  <nav id="sidebar">
    <div id="contenedor-boton">
      <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn btn-block-sm">
        <i class="glyphicon glyphicon-arrow-left flecha-izquierda"></i>
        <i class="glyphicon glyphicon-arrow-right flecha-derecha"></i>
        {{-- <span>Comprimir sidebar</span> --}}
      </button>
    </div>
    <!-- Sidebar Header -->
    <div class="sidebar-header">
      <h3>WebDiablo</h3>
      <strong>WD</strong>
    </div>

    <!-- Sidebar Links -->
    <ul class="list-unstyled components">
      <li class="{{ areActiveRoutes([ 'admin', 'admin/home' ]) }}">
        <a href="{{ route('admin/home') }}">
          <i class="glyphicon glyphicon-home"></i>
          Home
        </a>
      </li>

      <li class="{{ areActiveRoutes([ 'admin/clases', 'admin/clases/*' ]) }}">
        <a href="{{ route('admin/clases') }}">
          <i class="glyphicon glyphicon-tower"></i>
          Clases
        </a>
      </li>

      <li class="{{ areActiveRoutes([ 'admin/objetos', 'admin/objetos/*' ]) }}">
        <a href="{{ route('admin/objetos') }}">
          <i class="glyphicon glyphicon-sunglasses"></i>
          Objetos
        </a>
      </li>

      <li>
        <a href="#">
          <i class="glyphicon glyphicon-fire"></i>
          Habilidades
        </a>
      </li>

      <li>
        <a href="#">
          <i class="glyphicon glyphicon-user"></i>
          Usuarios
        </a>
      </li>

      <li>
        <a href="#">
          <i class="glyphicon glyphicon-education"></i>
          Guías
        </a>
      </li>

      <li>
        <a href="{{ route('/') }}">
          <i class="glyphicon glyphicon-send"></i>
          Volver a webDiablo
        </a>
      </li>
    </ul>
  </nav>
</div>
