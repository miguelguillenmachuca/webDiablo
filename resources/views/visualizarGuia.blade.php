@extends('layouts.app')

@section('content')
<div id="main" class="container">

  <div class="container-fluid contenedor">
    <div id="seccionEncabezado" class="row">
      <div class="col-xs-3 col-sm-1">
        <img src="{{ asset('img/clases/default_class.png') }}" class="img-clase img-responsive margen-sup" alt="clase">
      </div>
      <div class="col-xs-9 col-sm-9">
        <div class="row">
          <div class="col-xs-12">
            <h2 class="enlace-guia-inverse">Título Guía</h2>
          </div>
          <div class="col-xs-12">
            <h3><a href="#" class="enlace-usuario">Autor Guía</a></h3>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-2">
        <div class="row">
          <div class="col-xs-6 col-sm-12">
            <h4 class="text-right text-left-xs texto-amarillo">Última modificación: 12/12/2012</h4>
          </div>
          <div class="col-xs-6 col-sm-12">
            <h3 class="likes text-right"><span class="glyphicon glyphicon-thumbs-up likes"></span>147</h3>
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
          <div class="col-xs-12 col-sm-4 contenedor-seccion" id="habilidad1">
            <div class="row">
              <div class="col-xs-3 col-sm-2">
                <img src="{{ asset('img/habilidades/default_skill.png') }}" alt="habilidad1" class="img-responsive img-habilidad-resumen">
              </div>
              <div class="col-xs-9 col-sm-10">
                <div class="row">
                  <div class="col-xs-12 habilidad-guia">Habilidad 1</div>
                  <div class="col-xs-12 runa-guia">
                    <img src="{{ asset('img/runas/default_rune.png') }}" alt="runa1" class="img-responsive runa-guia-img inline"><span>Runa 1</span></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-sm-4 contenedor-seccion" id="habilidad2">
            <div class="row">
              <div class="col-xs-3 col-sm-2">
                <img src="{{ asset('img/habilidades/default_skill.png') }}" alt="habilidad2" class="img-responsive img-habilidad-resumen">
              </div>
              <div class="col-xs-9 col-sm-10">
                <div class="row">
                  <div class="col-xs-12">Habilidad 2</div>
                  <div class="col-xs-12 runa-guia">
                    <img src="{{ asset('img/runas/default_rune.png') }}" alt="runa2" class="img-responsive runa-guia-img inline"><span>Runa 2</span></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-sm-4 contenedor-seccion" id="habilidad3">
            <div class="row">
              <div class="col-xs-3 col-sm-2">
                <img src="{{ asset('img/habilidades/default_skill.png') }}" alt="habilidad3" class="img-responsive img-habilidad-resumen">
              </div>
              <div class="col-xs-9 col-sm-10">
                <div class="row">
                  <div class="col-xs-12">Habilidad 3</div>
                  <div class="col-xs-12 runa-guia">
                    <img src="{{ asset('img/runas/default_rune.png') }}" alt="runa3" class="img-responsive runa-guia-img inline"><span>Runa 3</span></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-sm-4 contenedor-seccion" id="habilidad4">
            <div class="row">
              <div class="col-xs-3 col-sm-2">
                <img src="{{ asset('img/habilidades/default_skill.png') }}" alt="habilidad4" class="img-responsive img-habilidad-resumen">
              </div>
              <div class="col-xs-9 col-sm-10">
                <div class="row">
                  <div class="col-xs-12">Habilidad 4</div>
                  <div class="col-xs-12 runa-guia">
                    <img src="{{ asset('img/runas/default_rune.png') }}" alt="runa4" class="img-responsive runa-guia-img inline"><span>Runa 4</span></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-sm-4 contenedor-seccion" id="habilidad5">
            <div class="row">
              <div class="col-xs-3 col-sm-2">
                <img src="{{ asset('img/habilidades/default_skill.png') }}" alt="habilidad5" class="img-responsive img-habilidad-resumen">
              </div>
              <div class="col-xs-9 col-sm-10">
                <div class="row">
                  <div class="col-xs-12">Habilidad 5</div>
                  <div class="col-xs-12 runa-guia">
                    <img src="{{ asset('img/runas/default_rune.png') }}" alt="runa5" class="img-responsive runa-guia-img inline"><span>Runa 5</span></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-sm-4 contenedor-seccion" id="habilidad6">
            <div class="row">
              <div class="col-xs-3 col-sm-2">
                <img src="{{ asset('img/habilidades/default_skill.png') }}" alt="habilidad6" class="img-responsive img-habilidad-resumen">
              </div>
              <div class="col-xs-9 col-sm-10">
                <div class="row">
                  <div class="col-xs-12">Habilidad 6</div>
                  <div class="col-xs-12 runa-guia">
                    <img src="{{ asset('img/runas/default_rune.png') }}" alt="runa6" class="img-responsive runa-guia-img inline"><span>Runa 6</span></div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div> <!-- Fin de la sección habilidades -->

    <div class="separador"></div>

    <div id="seccionPasivas" class="row">
      <div class="col-xs-12">
        <h3 class="text-center bold">Habilidades pasivas</h3>

        <div class="row">
          <div class="col-xs-6 col-sm-3 contenedor-seccion" id="pasiva1">
            <div class="row">
              <div class="col-xs-3">
                <img src="{{ asset("img/habilidades/default_skill.png") }}" alt="pasiva1" class="img-responsive img-habilidad-resumen">
              </div>
              <div class="col-xs-9 text-center-vertical">Pasiva</div>
            </div>
          </div>

          <div class="col-xs-6 col-sm-3 contenedor-seccion" id="pasiva2">
            <div class="row">
              <div class="col-xs-3">
                <img src="{{ asset("img/habilidades/default_skill.png") }}" alt="pasiva1" class="img-responsive img-habilidad-resumen">
              </div>
              <div class="col-xs-9 text-center-vertical">Pasiva</div>
            </div>
          </div>

          <div class="col-xs-6 col-sm-3 contenedor-seccion" id="pasiva3">
            <div class="row">
              <div class="col-xs-3">
                <img src="{{ asset("img/habilidades/default_skill.png") }}" alt="pasiva1" class="img-responsive img-habilidad-resumen">
              </div>
              <div class="col-xs-9 text-center-vertical">Pasiva</div>
            </div>
          </div>

          <div class="col-xs-6 col-sm-3 contenedor-seccion" id="pasiva4">
            <div class="row">
              <div class="col-xs-3">
                <img src="{{ asset("img/habilidades/default_skill.png") }}" alt="pasiva1" class="img-responsive img-habilidad-resumen">
              </div>
              <div class="col-xs-9 text-center-vertical">Pasiva</div>
            </div>
          </div>

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

  </div>

</div> <!-- Fin del div main -->
@endsection
