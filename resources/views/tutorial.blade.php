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

      <img src="{{ asset('public/img/capturas_web/barra_navegacion.PNG') }}" alt="barra de navegacion" class="img-center img-responsive">

      <br>

      <p>La barra de navegación es nuestra principal herramienta para movernos por WebDiablo, ya que incluye los enlaces a las principales secciones de la página.</p>

      <br>

      <img src="{{ asset('public/img/capturas_web/barra_navegacion_login.PNG') }}" alt="barra de navegacion logeado" class="img-center img-responsive">

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

      <br>

      <h4 class="text-center">Crear guía</h4>

      <br>

      <img src="{{ asset('public/img/capturas_web/elegir_clase.PNG') }}" alt="elegir clase" class="img-center img-responsive">

      <br>

      <p>Para crear una guía tenemos que dirigirnos a la sección correspondiente, y en caso de no estarlo, nos pedirá que hagamos login. Lo primero que hay que hacer es elegir una clase sobre la que haremos la guía.</p>

      <br>

      <img src="{{ asset('public/img/capturas_web/formulario_crear_guia.PNG') }}" alt="formulario crear guia" class="img-center img-responsive">

      <br>

      <p>Una vez elijamos una clase, nos aparecerá un formulario para crear la guía. No temas si ves que hay muchos campos a rellenar, ya que solo el nombre de la guía es obligatorio. Algunas consideraciones a tener en cuenta son:
        <ul>
          <li>No tienes por qué poner las 6 habilidades, ni es obligatorio ponerle runas a las habilidades, pero si coges una runa, tienes que elegir la habilidad que corresponde a ese hueco</li>
          <li>Tanto en habilidades como en objetos se permite la repetición del mismo elemento, así que no tengas miedo en dejar claro que "Porrazo" es la habilidad más importante de tu guía</li>
          <li>Los puntos de leyenda requieren que pongas una prioridad a las distintas posibilidades, para especificar cómo de importante es subir una determinada estadística. Si dejas alguna (o todas) las prioridades en blanco, se le asignará automáticamente la prioridad 4</li>
          <li>La descripción es completamente opcional</li>
          <li>El vídeo de la guía también es opcional, pero si vas a incluir uno, solo tienes que poner la parte del final de la dirección de Youtube donde está guardado. Por ejemplo, si la dirección es: https://www.youtube.com/watch?v=CBD08XXdct0, solo tienes que coger CBD08XXdct0</li>
          <li>La visibilidad de la guía permite que la guía sea visible para todo el mundo o que solo puedan verla aquellos que tienen la dirección de la misma</li>
        </ul>
      </p>

      <br>

      <h4 class="text-center">Ver guías</h4>

      <br>

      <img src="{{ asset('public/img/capturas_web/filtros_guia.PNG') }}" alt="filtros guia" class="img-center img-responsive">

      <br>

      <p>Lo primero que veremos cuando vayamos a buscar guías es una caja con filtros para buscar las guías que puedan interesarnos. No es obligatorio rellenar todos los filtros para buscar, puedes, por ejemplo, filtrar solo por clase.</p>

      <br>

      <img src="{{ asset('public/img/capturas_web/lista_guia.PNG') }}" alt="lista de guias" class="img-center img-responsive">

      <br>

      <p>Debajo de los filtros se nos muestran las guías que hay disponibles, ya sean todas porque no hayamos puesto ningún filtro, o las que coinciden con los criterios de búsqueda que hemos incluido. También podemos hacer click en el nombre de algún autor para ver los datos de dicho usuario.</p>

      <br>

      <img src="{{ asset('public/img/capturas_web/ver_guia.PNG') }}" alt="vista de la guia" class="img-center img-responsive">

      <br>

      <p>Una vez veamos la guía tenemos las opciones de dar un "me gusta", para añadirla a nuestra lista de favoritos, y comentar en la guía, ambas en el caso de estar logeado</p>

    </div>
  </div>

</div> <!-- Fin del div main -->
@endsection
