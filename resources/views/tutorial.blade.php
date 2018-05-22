@extends('layouts.app')

@section('content')
  <div id="main" class="container">
    <div class="container-fluid contenedor-top-guia">
      <h3 class="text-center">¿Cómo usar la página?</h3>

      <br>

      <p>El uso de la página es bastante intuitivo, pero si aún así tienes algún problema a la hora de moverte por ella, aquí te mostramos una sencilla guía para hacer tu experiencia más cómoda.</p>

      <br>

      <h4 class="text-center">Barra de navegación</h4>

      <br>

      <img src="img/capturas_web/barra_navegacion.png" alt="barra de navegacion" class="img-center img-responsive">

      <br>

      <p>La barra de navegación es nuestra principal herramienta para movernos por WebDiablo, ya que incluye los enlaces a las principales secciones de la página.</p>

      <br>

      <img src="img/capturas_web/barra_navegacion_login.png" alt="barra de navegacion logeado" class="img-center img-responsive">

      <br>

      <p>Una vez hayamos entrado con nuestras credenciales, o nos hayamos registrado si aún no lo habíamos hecho, la barra cambiará para quedar como la que se muestra sobre estas líneas.</p>

      <p>Las opciones que nos ofrece el menú desplegable que hay en el nombre del usuario nos llevarán, en el orden en que aparecen:
        <ul>
          <li>A la sección para visualizar los datos de nuestra cuenta</li>
          <li>A la sección de ajustes, donde podemos cambiar los datos de inicio de sesión de nuestra cuenta, así como añadir un avatar</li>
          <li>Al listado de las guías que hemos publicado</li>
          <li>Al listado de las guías a las que le hemos dado "me gusta"</li>
          <li>La opción para desconectarnos</li>
        </ul>
      </p>
    </div>
  </div>

</div> <!-- Fin del div main -->
@endsection
