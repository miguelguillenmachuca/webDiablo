<?php

namespace App\Http\Controllers;

use App\Guia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Validator;
use Hashids;

class GuiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guias = Guia::withTrashed()->paginate(20);

        return view('admin_guias', [ 'guias' => $guias ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Clase $clase
     * @return \Illuminate\Http\Response
     */
    public function create(\App\Clase $clase = null)
    {
      switch(Route::currentRouteName())
      {
        case 'crearGuia':
          $clases = \App\Clase::orderBy('nombre')->get();

          return view('crearGuia', [ 'clases' => $clases ]);
        break;

        case 'formularioCrearGuia':
          $habilidadesActivas = \App\Habilidad::listNombreIdActiva($clase);

          $runas = \App\Runa::listNombreId($clase);

          $habilidadesPasivas = \App\Habilidad::listNombreIdPasiva($clase);

          // $objetos = \App\Objeto::listData();
          $cabeza = \App\Objeto::listObjCat('cabeza', $clase);
          $hombros = \App\Objeto::listObjCat('hombros', $clase);
          $torso = \App\Objeto::listObjCat('torso', $clase);
          $munecas = \App\Objeto::listObjCat('munecas', $clase);
          $manos = \App\Objeto::listObjCat('manos', $clase);
          $cintura = \App\Objeto::listObjCat('cintura', $clase);
          $piernas = \App\Objeto::listObjCat('piernas', $clase);
          $pies = \App\Objeto::listObjCat('pies', $clase);
          $mano_izquierda = \App\Objeto::listObjCat('mano_izquierda', $clase);
          $una_mano = \App\Objeto::listObjCat('una_mano', $clase);
          $dos_manos = \App\Objeto::listObjCat('dos_manos', $clase);
          $a_distancia = \App\Objeto::listObjCat('a_distancia', $clase);
          $anillo = \App\Objeto::listObjCat('anillo', $clase);
          $amuleto = \App\Objeto::listObjCat('amuleto', $clase);
          $gema = \App\Objeto::listObjCat('gema', $clase);

          $objetos = [
            'cabeza' => $cabeza,
            'hombros' => $hombros,
            'torso' => $torso,
            'munecas' => $munecas,
            'manos' => $manos,
            'cintura' => $cintura,
            'piernas' => $piernas,
            'pies' => $pies,
            'anillo' => $anillo,
            'amuleto' => $amuleto,
            'arma' => array_merge($una_mano, $dos_manos, $a_distancia),
            'mano_izquierda' => array_merge($mano_izquierda, $una_mano, $a_distancia),
          ];

          $armas = array_merge($mano_izquierda, $una_mano, $dos_manos, $a_distancia);

          $armaduras = array_merge($cabeza, $hombros, $torso, $munecas, $manos, $cintura, $pies);

          $accesorios = array_merge($anillo, $amuleto);

          return view ('forms.guia_create', [ 'activas' => $habilidadesActivas, 'runas' => $runas, 'pasivas' => $habilidadesPasivas, 'objetos' => $objetos, 'armas' => $armas, 'armaduras' => $armaduras, 'accesorios' => $accesorios, 'gema' => $gema ]);
        break;
      }

      App::abort(404, 'Página no encontrada');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function show(Guia $guia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function edit(Guia $guia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guia $guia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guia $guia)
    {
      if(!$guia->trashed())
      {
        $guia->delete();
      }

      return redirect()->back();
    }

    /**
    * Restore the specified removed resource from storage.
    *
    * @param  \App\Guia  $guia
    * @return \Illuminate\Http\Response
    */
    public function restore(Guia $guia)
    {
      if($guia->trashed())
      {
        $guia->restore();
      }

      return redirect()->back();
    }

    /**
    * Validate the attributes of a model
    *
    * @param  Request   $request
    * @return Response  Validator
    */
    public static function validateModel(Request $request)
    {
      // Testing the data received
      $validator = Validator::make($request->all(), [
        'nombre' => 'required|min:3|max:50|regex:/^[A-zÀ-úÀ-ÿñÑ ]*$/u',
      ]);

      return $validator;
    }
}
