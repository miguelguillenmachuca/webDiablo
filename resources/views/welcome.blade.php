@extends('layouts.app')

@section('content')
  <div id="main" class="container">
    <div id="bienvenida" class="container-fluid contenedor-top-guia">
      <h2>Bienvenido a WebDiablo</h2>

      <p>Saludos, {{ Auth::check() ? Auth::user()->nombre : 'jugador' }}, y bienvenido a WebDiablo. En ésta página podrás encontrarás todas las guías que nuestros usuarios han decidido compartir con otros jugadores, siéntete libre de echarles un ojo <a href="{{ route('guia/buscar') }}">aquí</a>. Además, puedes filtrar por clase, si sólo quieres ver las que corresponden a tu clase favorita, o por usuario, si conoces a alguien con el que parece que compartes la forma de jugar.</p>
      <p>Si lo que quieres es crear tus propias guías para compartirlas con el mundo, sólo tienes que dirigirte <a href="{{ route('crearGuia') }}">a crear guía</a>@if (!Auth::check()), pero primero tienes que <a href="{{ route('login') }}">logearte</a>, o si no tienes una cuenta de WebDiablo, <a href="{{ route('register') }}">créate una</a>.
      @endif
      </p>

      <p>Por último, aquí debajo te dejamos un top 3 de las guías mejor valoradas por nuestros usuarios, categorizadas por clases.</p>
      <p>¡Buena suerte eliminando demonios!</p>
    </div>
    <h2 class="text-center">TOP 3 DE GUÍAS POR CLASE</h2>
    @foreach ($clases as $clase)
      <div class="container-fluid contenedor-top-guia">
        <h3 class="text-center">{{ $clase->nombre }}</h3>
        <div class="row">
          @foreach ($clase->getTop3() as $guia)
            <div class="resumen-guia col-xs-12 col-md-4">
              <div class="row">
                <div class="col-xs-3">
                  <img src="{{ asset('../storage/app/public/' .$guia->clase->foto_clase) }}" class="img-clase-resumen" alt="img-clase">
                </div>

                <div class="col-xs-9">
                  <h4><a href="{{ route('guia/show', [ $guia->getRouteKey() ]) }}" class="enlace-guia">{{ $guia->getTrimmedTitle() }}</a></h4>
                  <p>de: <a href="{{ route('usuario/show', [ $guia->usuario->getRouteKey() ]) }}" class="enlace-usuario">{{ $guia->usuario->nombre }}</a></p>
                </div>

                <div class="col-xs-12">
                  <div class="row resumen-habilidades">
                    @for ($i=1; $i < 7; $i++)
                      <div class="col-xs-4 col-sm-2">
                        <img src="{{ $guia->getHabilidadByPos('a'.$i) !== null ? asset('../storage/app/public/' .$guia->getHabilidadByPos('a'.$i)->foto_habilidad) : asset("img/black_default_img.png") }}" class="img-habilidad-resumen img-responsive" alt="habilidad{{ $i }}">
                      </div>
                    @endfor
                  </div> <!-- Fin del div row resumen-habilidades -->
                </div> <!-- Fin del div col -->

                <div class="col-xs-12 resumen-guia-info">
                  <p><span class="glyphicon glyphicon-thumbs-up likes">{{ $guia->get_num_likes() }}</span> Última edición: <span>{{ $guia->updated_at }}</span></p>
                </div> <!-- Fin del div resumen-guia-info -->
              </div> <!-- Fin del div row -->
            </div> <!-- Fin del div resumen-guia -->
          @endforeach
        </div> <!-- Fin del div row -->
      </div> <!-- Fin del div contenedor-top-guia -->
    @endforeach
  </div> <!-- Fin del div main -->
@endsection
