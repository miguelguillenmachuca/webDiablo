@extends('layouts.app')

@section('content')
<div id="main" class="container">

  <div class="container-fluid contenedor margen-inf">
    <div id="seccionEncabezado" class="row">
      <div class="col-xs-3 col-sm-1">
        <img src="{{ asset('storage/' .$guia->clase->foto_clase) }}" class="img-clase img-responsive margen-sup" alt="clase">
      </div>
      <div class="col-xs-9 col-sm-9">
        <div class="row">
          <div class="col-xs-12">
            <h2 class="enlace-guia-inverse">{{ $guia->nombre }}</h2>
          </div>
          <div class="col-xs-12">
            <h3><a href="{{ route('usuario/show', $guia->usuario) }}" class="enlace-usuario">{{ $guia->usuario->nombre }}</a></h3>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-2">
        <div class="row">
          <div class="col-xs-6 col-sm-12">
            <h4 class="text-right text-left-xs texto-amarillo">Última modificación: {{ $guia->updated_at }}</h4>
          </div>
          <div class="col-xs-6 col-sm-12">
            <h3 class="likes text-right"><span class="glyphicon glyphicon-thumbs-up likes"></span>{{ $guia->get_num_likes() }}</h3>
            {{ Form::open(array('url' => '#', 'method' => 'post')) }}
            {{ Form::hidden('user' , '') }}
            {{ Form::hidden('guia' , '') }}

            {{ Form::button('<span class="glyphicon glyphicon-thumbs-up likes"></span><span class="likes">Votar</span>', [ 'type' => 'submit', 'class' => 'btn btn-rojo pull-right' ]) }}
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div> <!-- Fin de la sección encabezado -->

    <div class="separador"></div>

    <div id="seccionHabilidades" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Habilidades y runas</h3>

        <div class="row">
          @for ($i=1; $i < 7; $i++)
            <div class="col-xs-12 col-sm-4 contenedor-seccion" id="habilidad{{ $i }}">
              <div class="row">
                <div class="col-xs-3 col-sm-2">
                  @if ($habilidades[ 'a' .$i ])
                    <img src="{{ asset('storage/' .$habilidades[ 'a' .$i ]->foto_habilidad) }}" alt="habilidad{{ $i }}" class="img-responsive img-habilidad-resumen">
                  @else
                    <img src="{{ asset('img/habilidades/default_skill.png') }}" alt="habilidad{{ $i }}" class="img-responsive img-habilidad-resumen">
                  @endif
                </div>

                <div class="col-xs-9 col-sm-10">
                  <div class="row">
                    <div class="col-xs-12 habilidad-guia">{{ $habilidades[ 'a' .$i ] ? $habilidades[ 'a' .$i ]->nombre : 'Sin habilidad seleccionada' }}</div>
                    <div class="col-xs-12 runa-guia">
                      <span>{{ $runas[ 'a' .$i ] ? $runas[ 'a' .$i ]->nombre : 'Sin runa seleccionada' }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- Fin del contenedor-seccion -->
          @endfor
        </div>
      </div>
    </div> <!-- Fin de la sección habilidades -->

    <div class="separador"></div>

    <div id="seccionPasivas" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Habilidades pasivas</h3>

        <div class="row">
          @for ($i=1; $i < 5; $i++)
            <div class="col-xs-6 col-sm-3 contenedor-seccion" id="pasiva{{ $i }}">
              <div class="row">
                <div class="col-xs-3">
                  @if ($habilidades[ 'p' .$i ])
                    <img src="{{ asset('storage/' .$habilidades[ 'p' .$i ]->foto_habilidad) }}" alt="pasiva{{ $i }}" class="img-responsive img-habilidad-resumen">
                  @else
                    <img src="{{ asset('img/habilidades/default_skill.png') }}" alt="pasiva{{ $i }}" class="img-responsive img-habilidad-resumen">
                  @endif
                </div>
                <div class="col-xs-9 text-center-vertical">{{ $habilidades[ 'p' .$i ] ? $habilidades[ 'p' .$i ]->nombre : 'Sin pasiva seleccionada' }}</div>
              </div>
            </div>
          @endfor
        </div>
      </div>
    </div> <!-- Fin de la sección pasivas -->

    <div class="separador"></div>

    <div id="seccionEquipacion" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Equipamiento</h3>

        <div class="row row-eq-height">
          <div class="col-xs-12 col-md-9 contenedor-seccion" id="seccionObjetos">
            <h4 class="text-center">Objetos</h4>

            <div class="row">
              <div class="col-xs-12 col-sm-4" id="seccionCabeza">
                <h4 class="text-center">Cabeza</h4>
                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto cabeza" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto cabeza</div>
                </div>
              </div> <!-- Fin de la sección cabeza -->

              <div class="col-xs-12 col-sm-4" id="seccionHombros">
                <h4 class="text-center">Hombros</h4>

                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto hombros" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto hombros Lorem ipsum dolor sit amet, consectetur.</div>
                </div>
              </div> <!-- Fin de la sección hombros -->

              <div class="col-xs-12 col-sm-4" id="seccionAmuleto">
                <h4 class="text-center">Amuleto</h4>

                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto amuleto" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto amuleto</div>
                </div>
              </div> <!-- Fin de la sección amuleto -->

            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-4" id="seccionTorso">
                <h4 class="text-center">Torso</h4>

                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto torso" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto torso</div>
                </div>
              </div> <!-- Fin de la sección torso -->

              <div class="col-xs-12 col-sm-4" id="seccionManos">
                <h4 class="text-center">Manos</h4>

                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto manos" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto manos</div>
                </div>
              </div> <!-- Fin de la sección manos -->

              <div class="col-xs-12 col-sm-4" id="seccionMunecas">
                <h4 class="text-center">Muñecas</h4>

                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto muñecas" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto muñecas</div>
                </div>
              </div> <!-- Fin de la sección muñecas -->
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-4" id="seccionAnillo1">
                <h4 class="text-center">Anillo 1</h4>

                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto anillo1" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto anillo1</div>
                </div>
              </div> <!-- Fin de la sección anillo 1 -->

              <div class="col-xs-12 col-sm-4" id="seccionAnillo2">
                <h4 class="text-center">Anillo 2</h4>

                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto anillo2" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto anillo2</div>
                </div>
              </div> <!-- Fin de la sección anillo 2 -->

              <div class="col-xs-12 col-sm-4" id="seccionCintura">
                <h4 class="text-center">Cintura</h4>

                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto cintura" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto cintura</div>
                </div>
              </div> <!-- Fin de la sección cintura -->
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-4" id="seccionPiernas">
                <h4 class="text-center">Piernas</h4>

                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto piernas" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto piernas</div>
                </div>
              </div> <!-- Fin de la sección piernas -->

              <div class="col-xs-12 col-sm-4" id="seccionPies">
                <h4 class="text-center">Pies</h4>

                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto pies" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto pies</div>
                </div>
              </div> <!-- Fin de la sección pies -->

              <div class="col-xs-12 col-sm-4" id="seccionArma">
                <h4 class="text-center">Arma</h4>

                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto arma" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto arma</div>
                </div>
              </div> <!-- Fin de la sección arma -->
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-4" id="seccionManoIzquierda">
                <h4 class="text-center">Mano izquierda</h4>

                <div class="row">
                  <div class="col-xs-3">
                    <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto mano izquierda" class="img-responsive img-habilidad-resumen">
                  </div>

                  <div class="col-xs-9 text-center-vertical">Objeto mano izquierda</div>
                </div>
              </div> <!-- Fin de la sección mano izquierda -->
            </div>
          </div> <!-- Fin de la sección objetos -->

          <div class="col-xs-12 col-md-3" id="seccionCuboGemas">
            <div class="row">
              <div class="col-xs-12 contenedor-seccion full-container-height" id="seccionCubo">
                <h4 class="text-center">Cubo de Kanai</h4>

                <div class="row">
                  <div class="col-xs-12 col-sm-4 col-md-12" id="seccionArmaCubo">
                    <h4 class="text-center">Arma</h4>

                    <div class="row">
                      <div class="col-xs-3">
                        <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto arma" class="img-responsive img-habilidad-resumen">
                      </div>

                      <div class="col-xs-9 text-center-vertical">Objeto arma</div>
                    </div>
                  </div> <!-- Fin de la sección arma -->

                  <div class="col-xs-12 col-sm-4 col-md-12" id="seccionArmaduraCubo">
                    <h4 class="text-center">Armadura</h4>

                    <div class="row">
                      <div class="col-xs-3">
                        <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto armadura" class="img-responsive img-habilidad-resumen">
                      </div>

                      <div class="col-xs-9 text-center-vertical">Objeto armadura</div>
                    </div>
                  </div> <!-- Fin de la sección armadura -->

                  <div class="col-xs-12 col-sm-4 col-md-12" id="seccionAccesorio">
                    <h4 class="text-center">Accesorio</h4>

                    <div class="row">
                      <div class="col-xs-3">
                        <img src="{{ asset("img/objetos/default_item.png") }}" alt="objeto accesorio" class="img-responsive img-habilidad-resumen">
                      </div>

                      <div class="col-xs-9 text-center-vertical">Objeto accesorio</div>
                    </div>
                  </div> <!-- Fin de la sección accesorio -->
                </div>
              </div> <!-- Fin de la sección cubo -->

              <div class="col-xs-12 contenedor-seccion full-container-height" id="seccionGemas">
                <h4 class="text-center">Gemas legendarias</h4>

                <div class="row">
                  <div class="col-xs-12 col-sm-4 col-md-12" id="seccionGema1">
                    <h4 class="text-center">Gema 1</h4>

                    <div class="row">
                      <div class="col-xs-3">
                        <img src="{{ asset("img/default_img.png") }}" alt="gema 1" class="img-responsive img-habilidad-resumen">
                      </div>

                      <div class="col-xs-9 text-center-vertical">Gema 1</div>
                    </div>
                  </div> <!-- Fin de la sección gema 1 -->

                  <div class="col-xs-12 col-sm-4 col-md-12" id="seccionGema2">
                    <h4 class="text-center">Gema 2</h4>

                    <div class="row">
                      <div class="col-xs-3">
                        <img src="{{ asset("img/default_img.png") }}" alt="gema 2" class="img-responsive img-habilidad-resumen">
                      </div>

                      <div class="col-xs-9 text-center-vertical">Gema 2</div>
                    </div>
                  </div> <!-- Fin de la sección gema 2 -->

                  <div class="col-xs-12 col-sm-4 col-md-12" id="seccionGema3">
                    <h4 class="text-center">Gema 3</h4>

                    <div class="row">
                      <div class="col-xs-3">
                        <img src="{{ asset("img/default_img.png") }}" alt="gema 3" class="img-responsive img-habilidad-resumen">
                      </div>

                      <div class="col-xs-9 text-center-vertical">Gema 2</div>
                    </div>
                  </div> <!-- Fin de la sección gema 3 -->
                </div>
              </div> <!-- de la sección gemas -->
            </div>
          </div> <!-- Fin de la sección cubo y gemas -->
        </div>
      </div>
    </div> <!-- Fin de la seccion equipación -->

    <div class="separador"></div>

    <div id="seccionLeyenda" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Puntos de leyenda</h3>

        <div class="row row-eq-height">
          <div class="col-xs-12 col-sm-6 col-md-3 contenedor-seccion" id="seccionLeyendaPrimarios">
            <h4 class="text-center">Primarios</h4>

            <p>1 <span class="bold">Estadística principal</span></p>
            <p>2 <span class="bold">Vitalidad</span></p>
            <p>3 <span class="bold">Velocidad de movimiento</span></p>
            <p>4 <span class="bold">Recurso máximo</span></p>
          </div> <!-- Fin de la sección leyenda primarios-->

          <div class="col-xs-12 col-sm-6 col-md-3 contenedor-seccion" id="seccionLeyendaAtaque">
            <h4 class="text-center">Ataque</h4>

            <p>4 <span class="bold">Velocidad de ataque</span></p>
            <p>3 <span class="bold">Reducción de enfriamiento</span></p>
            <p>2 <span class="bold">Probabilidad de golpe crítico</span></p>
            <p>1 <span class="bold">Daño de golpe crítico</span></p>
          </div> <!-- Fin de la sección leyenda ataque-->

          <div class="col-xs-12 col-sm-6 col-md-3 contenedor-seccion" id="seccionLeyendaDefensa">
            <h4 class="text-center">Defensa</h4>

            <p>1 <span class="bold">Vida</span></p>
            <p>2 <span class="bold">Armadura</span></p>
            <p>3 <span class="bold">Todas las resistencias</span></p>
            <p>4 <span class="bold">Regeneración de vida</span></p>
          </div> <!-- Fin de la sección leyenda defensa-->

          <div class="col-xs-12 col-sm-6 col-md-3 contenedor-seccion" id="seccionLeyendaUtilidad">
            <h4 class="text-center">Utilidad</h4>

            <p>1 <span class="bold">Daño de área</span></p>
            <p>2 <span class="bold">Reducción de coste</span></p>
            <p>3 <span class="bold">Vida por golpe</span></p>
            <p>4 <span class="bold">Hallazgo de oro</span></p>
          </div> <!-- Fin de la sección leyenda utilidad-->
        </div>
      </div>
    </div> <!-- Fin de la sección leyenda -->

    <div class="separador"></div>

    <div id="seccionDescripcion" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Descripción</h3>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse odit blanditiis debitis necessitatibus rem asperiores reiciendis? Pariatur aut, voluptate temporibus ex voluptatum nemo itaque et maiores repellendus tempora obcaecati quaerat, similique unde deserunt assumenda cumque placeat atque! Harum alias saepe rem. Nostrum at reprehenderit laboriosam soluta? Nesciunt molestias rerum, similique dolorem dolorum consectetur, autem obcaecati, non sit atque, unde iusto adipisci voluptatum. Cupiditate ducimus molestiae alias debitis fuga enim, beatae accusantium officia quia. Quo reprehenderit earum doloribus, distinctio, voluptas a, dolores aspernatur culpa velit consequuntur repellat. Voluptatem ab debitis expedita ut provident unde molestiae sapiente, eveniet, repellendus impedit placeat ad, error, eum. Necessitatibus illum, reprehenderit blanditiis debitis vitae magnam eius, voluptates sed consequuntur suscipit maiores sunt sint, ea id fugit reiciendis. At facilis alias libero quae laboriosam culpa, quidem voluptatibus voluptates, repudiandae debitis. Facere voluptatum placeat sunt odit fugiat ipsum quia voluptate harum tempora totam, provident aliquid reiciendis ut praesentium quisquam fuga cupiditate at necessitatibus fugit dolores eius numquam aut beatae iste adipisci. In praesentium rem, voluptates dignissimos repellat consequatur odit culpa dolorem commodi. Voluptatum voluptatibus corporis, voluptas ea velit suscipit distinctio iusto ratione sint aliquid nesciunt minus soluta saepe a officiis. Modi, minima, repellat! Officiis, modi ipsam numquam quidem!</p>
      </div>
    </div> <!-- Fin de la sección descripción -->

    <div class="separador"></div>

    <div id="seccionVideo" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Vídeo</h3>

        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/CBD08XXdct0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
      </div>
    </div> <!-- Fin de la sección vídeo -->

    <div class="separador"></div>

    <div id="seccionVotos" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Recuerda votar positivo si te ha gustado la guía</h3>

        <h3 class="likes text-center"><span class="glyphicon glyphicon-thumbs-up likes"></span>147</h3>
        <div class="text-center">
          {{ Form::open(array('url' => '#', 'method' => 'post')) }}
          {{ Form::hidden('user' , '') }}
          {{ Form::hidden('guia' , '') }}

          {{ Form::button('<span class="glyphicon glyphicon-thumbs-up likes"></span><span class="likes">Votar</span>', [ 'type' => 'submit', 'class' => 'btn btn-rojo' ]) }}
          {{ Form::close() }}
        </div>
      </div>
    </div> <!-- Fin de la sección votos -->

    <div class="separador"></div>

    <div id="seccionComentarios" class="row">
      <div class="col-xs-12">
        <h3 class="text-left bold">Comentarios</h3>
        <p class="help-block">Puedes debatir sobre tu opinión de la guía, posibles cambios, o simplemente agradecerle al autor que se haya tomado su tiempo en compartirla.</p>

        <div class="formComentario">
          {{ Form::open(array('url' => '#', 'method' => 'post')) }}
          {{ Form::label('') }}
          {{ Form::textarea('comentario', null , [ 'class' => 'form-control' ]) }}

          {{ Form::button('Comentar', [' type' => 'submit', 'class' => 'btn btn-rojo btn-block-xs margen-sup' ]) }}
          {{ Form::close() }}
        </div>
      </div>
    </div>

    <div class="col-xs-12" id="paginado_comentarios">
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
    </div> <!-- Fin del div paginado_comentarios -->

    <div class="col-xs-12 margen-inf" id="cajaComentarios">
      <div class="row">
        <div class="col-xs-12">
          <div class="row contenedor-seccion-comentarios row-eq-height">
            <div class="col-xs-12 col-sm-2 col-md-2 contenedor-autor-comentario">
              <div class="row">
                <div class="col-xs-2 col-sm-12">
                  <img src="{{ asset('img/usuarios/1493925171_unknown2.png') }}" alt="usuario" class="img-responsive img-usuario center-block">
                </div>
                <div class="col-xs-10 col-sm-12 text-center">
                  <div class="row">
                    <div class="col-xs-12">
                      <a href="{{ route('usuario/show', 'asd') }}" class="enlace-usuario">Usuario</a>
                    </div>
                    <div class="col-xs-12">
                      <span class="num-comentario">123 comentarios</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-10 col-md-10 contenedor-texto-comentario full-height">
              <p class="full-height">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium maiores numquam recusandae quaerat. Numquam eius vero similique nam in eum tempora ab eos commodi soluta quam natus vel accusamus nobis, perferendis, voluptate voluptatum nesciunt, sint consequatur animi! Vitae beatae perferendis dolorem hic ab suscipit molestiae enim necessitatibus. Suscipit dolor laborum nulla consequatur dolore expedita voluptatum minima quibusdam distinctio consequuntur, sit esse enim, excepturi eius doloribus! Et totam nobis id. Architecto dolore, dignissimos vitae laborum dolores necessitatibus quam! Doloribus fugiat mollitia reprehenderit officiis ipsa, sint eveniet neque. Quae reiciendis nostrum tempore, odit sit optio blanditiis reprehenderit, ea amet impedit, excepturi totam.</p>
            </div>
          </div>
        </div>

        <div class="col-xs-12">
          <div class="row contenedor-seccion-comentarios row-eq-height">
            <div class="col-xs-12 col-sm-2 col-md-2 contenedor-autor-comentario">
              <div class="row">
                <div class="col-xs-2 col-sm-12">
                  <img src="{{ asset('img/usuarios/1493925171_unknown2.png') }}" alt="usuario" class="img-responsive img-usuario center-block">
                </div>
                <div class="col-xs-10 col-sm-12 text-center">
                  <div class="row">
                    <div class="col-xs-12">
                      <a href="{{ route('usuario/show', 'asd') }}" class="enlace-usuario">Usuario</a>
                    </div>
                    <div class="col-xs-12">
                      <span class="num-comentario">123 comentarios</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-10 col-md-10 contenedor-texto-comentario full-height">
              <p class="full-height">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium maiores numquam recusandae quaerat. Numquam eius vero similique nam in eum tempora ab eos commodi soluta quam natus vel accusamus nobis, perferendis, voluptate voluptatum nesciunt, sint consequatur animi! Vitae beatae perferendis dolorem hic ab suscipit molestiae enim necessitatibus. Suscipit dolor laborum nulla consequatur dolore expedita voluptatum minima quibusdam distinctio consequuntur, sit esse enim, excepturi eius doloribus! Et totam nobis id. Architecto dolore, dignissimos vitae laborum dolores necessitatibus quam! Doloribus fugiat mollitia reprehenderit officiis ipsa, sint eveniet neque. Quae reiciendis nostrum tempore, odit sit optio blanditiis reprehenderit, ea amet impedit, excepturi totam.</p>
            </div>
          </div>

        </div>

        <div class="col-xs-12">
          <div class="row contenedor-seccion-comentarios row-eq-height">
            <div class="col-xs-12 col-sm-2 col-md-2 contenedor-autor-comentario">
              <div class="row">
                <div class="col-xs-2 col-sm-12">
                  <img src="{{ asset('img/usuarios/1493925171_unknown2.png') }}" alt="usuario" class="img-responsive img-usuario center-block">
                </div>
                <div class="col-xs-10 col-sm-12 text-center">
                  <div class="row">
                    <div class="col-xs-12">
                      <a href="{{ route('usuario/show', 'asd') }}" class="enlace-usuario">Usuario</a>
                    </div>
                    <div class="col-xs-12">
                      <span class="num-comentario">123 comentarios</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-10 col-md-10 contenedor-texto-comentario full-height">
              <p class="full-height">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium maiores numquam recusandae quaerat. Numquam eius vero similique nam in eum tempora ab eos commodi soluta quam natus vel accusamus nobis, perferendis, voluptate voluptatum nesciunt, sint consequatur animi! Vitae beatae perferendis dolorem hic ab suscipit molestiae enim necessitatibus. Suscipit dolor laborum nulla consequatur dolore expedita voluptatum minima quibusdam distinctio consequuntur, sit esse enim, excepturi eius doloribus! Et totam nobis id. Architecto dolore, dignissimos vitae laborum dolores necessitatibus quam! Doloribus fugiat mollitia reprehenderit officiis ipsa, sint eveniet neque. Quae reiciendis nostrum tempore, odit sit optio blanditiis reprehenderit, ea amet impedit, excepturi totam.</p>
            </div>
          </div>

        </div>

        <div class="col-xs-12">
          <div class="row contenedor-seccion-comentarios row-eq-height">
            <div class="col-xs-12 col-sm-2 col-md-2 contenedor-autor-comentario">
              <div class="row">
                <div class="col-xs-2 col-sm-12">
                  <img src="{{ asset('img/usuarios/1493925171_unknown2.png') }}" alt="usuario" class="img-responsive img-usuario center-block">
                </div>
                <div class="col-xs-10 col-sm-12 text-center">
                  <div class="row">
                    <div class="col-xs-12">
                      <a href="{{ route('usuario/show', 'asd') }}" class="enlace-usuario">Usuario</a>
                    </div>
                    <div class="col-xs-12">
                      <span class="num-comentario">123 comentarios</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-10 col-md-10 contenedor-texto-comentario full-height">
              <p class="full-height">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium maiores numquam recusandae quaerat. Numquam eius vero similique nam in eum tempora ab eos commodi soluta quam natus vel accusamus nobis, perferendis, voluptate voluptatum nesciunt, sint consequatur animi! Vitae beatae perferendis dolorem hic ab suscipit molestiae enim necessitatibus. Suscipit dolor laborum nulla consequatur dolore expedita voluptatum minima quibusdam distinctio consequuntur, sit esse enim, excepturi eius doloribus! Et totam nobis id. Architecto dolore, dignissimos vitae laborum dolores necessitatibus quam! Doloribus fugiat mollitia reprehenderit officiis ipsa, sint eveniet neque. Quae reiciendis nostrum tempore, odit sit optio blanditiis reprehenderit, ea amet impedit, excepturi totam.</p>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>


</div> <!-- Fin del div main -->
@endsection
