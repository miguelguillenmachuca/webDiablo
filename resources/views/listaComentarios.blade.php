<div class="container-fluid" id="paginado_sup">
  {{ $comentarios->links('pagination.limit_links_rojo') }}
</div> <!-- Fin del div paginado_sup -->

<div class="container-fluid" id="comentarios">
  @if($comentarios->count() == 0)
    <h3>No se han encontrado comentarios</h3>
  @else
    @foreach ($comentarios as $comentario)
      <div class="col-xs-12">
        <div class="row contenedor-seccion-comentarios row-eq-height">
          <div class="col-xs-12 col-sm-2 col-md-2 contenedor-autor-comentario">
            <div class="row">
              <div class="col-xs-2 col-sm-12">
                <img src="{{ asset('storage/' .$comentario->usuario->foto_usuario) }}" alt="usuario" class="img-responsive img-usuario center-block">
              </div>
              <div class="col-xs-10 col-sm-12 text-center">
                <div class="row">
                  <div class="col-xs-12">
                    <a href="{{ route('usuario/show', $comentario->usuario) }}" class="enlace-usuario">{{ $comentario->usuario->nombre }}</a>
                  </div>
                  <div class="col-xs-12">
                    <span class="num-comentario">Publicado en: <a href="{{ route('guia/show', $comentario->guia) }}" class="enlace-guia">{{ $comentario->guia->nombre }}</a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-sm-10 col-md-10 contenedor-texto-comentario full-height">
            <p class="full-height">{{ $comentario->texto }}</p>
          </div>
        </div>
      </div>
    @endforeach
  @endif
</div> <!-- Fin del div comentarios -->

<div class="container-fluid" id="paginado_inf">
  {{ $comentarios->links('pagination.limit_links_rojo') }}
</div> <!-- Fin del div paginado_inf -->
