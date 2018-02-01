<div id="contenido_toggle">

</div>

<div id="hueco_sidebar">
  <nav id="sidebar">
    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
      <i class="glyphicon glyphicon-align-left"></i>
      <span>Comprimir sidebar</span>
    </button>
    <!-- Sidebar Header -->
    <div class="sidebar-header">
      <h3>WebDiablo</h3>
      <strong>WD</strong>
    </div>

    <!-- Sidebar Links -->
    <ul class="list-unstyled components">
      <li class="{{ areActiveRoutes([ 'admin', 'admin/home' ]) }}">
        <a href="{{ route('admin/home') }}" data-toggle="collapse" aria-expanded="false">
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

      <li>
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
          <i class="glyphicon glyphicon-sunglasses"></i>
          Objetos
        </a>
        <ul class="collapse list-unstyled" id="pageSubmenu">
          <li><a href="#">Page 1</a></li>
          <li><a href="#">Page 2</a></li>
          <li><a href="#">Page 3</a></li>
        </ul>
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
