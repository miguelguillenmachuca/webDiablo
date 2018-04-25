<?php

namespace App\Http\Controllers;

use App\Guia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Validator;
use Hashids;
use Auth;

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

          return view ('forms.guia_create', [ 'activas' => $habilidadesActivas, 'runas' => $runas, 'pasivas' => $habilidadesPasivas, 'objetos' => $objetos, 'armas' => $armas, 'armaduras' => $armaduras, 'accesorios' => $accesorios, 'gema' => $gema, 'clase' => $clase ]);
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
      $request_original = $request->duplicate(null, $request->all());

      $request_unhashed = GuiasController::decodeObjetos($request_original);

      $validator = GuiasController::validateModel($request_unhashed);

      if($validator->fails())
      {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }
      else
      {
        $guia = new Guia;

        $guia->nombre = $request_unhashed->nombre;

        $guia->id_usuario = Auth::user()->id;
        $guia->id_clase = $request_unhashed->id_clase;

        $guia->save();

        // ----------------- HABILIDADES -----------------

        // Loop to save all the habilidad and runa
        for ($i=1; $i < 7 ; $i++)
        {
          // If the habilidad has a runa attached
          if($request_unhashed->filled('runa'.$i))
          {
            $guia->habilidad()->attach($request_unhashed->input('habilidad'.$i), [ 'id_runa' => $request_unhashed->input('runa'.$i), 'posicion' => 'a'.$i ]);
          }
          // If the habilidad doesn't have a runa attached
          else if($request_unhashed->filled('habilidad'.$i))
          {
            $guia->habilidad()->attach($request_unhashed->input('habilidad'.$i), [  'posicion' => 'a'.$i ]);
          }
        }

        // Loop to save all the pasiva
        for ($i=1; $i < 5 ; $i++)
        {
          if($request_unhashed->filled('pasiva'.$i))
          {
            $guia->habilidad()->attach($request_unhashed->input('pasiva'.$i), [ 'posicion' => 'p'.$i ]);
          }
        }

        // ----------------- OBJETOS -----------------
        if($request_unhashed->filled('cabeza'))
        {
          $guia->objeto()->attach($request_unhashed->input('cabeza'));
        }

        if($request_unhashed->filled('hombros'))
        {
          $guia->objeto()->attach($request_unhashed->input('hombros'));
        }

        if($request_unhashed->filled('amuleto'))
        {
          $guia->objeto()->attach($request_unhashed->input('amuleto'));
        }

        if($request_unhashed->filled('torso'))
        {
          $guia->objeto()->attach($request_unhashed->input('torso'));
        }

        if($request_unhashed->filled('manos'))
        {
          $guia->objeto()->attach($request_unhashed->input('manos'));
        }

        if($request_unhashed->filled('munecas'))
        {
          $guia->objeto()->attach($request_unhashed->input('munecas'));
        }

        if($request_unhashed->filled('anillo1'))
        {
          $guia->objeto()->attach($request_unhashed->input('anillo1'));
        }

        if($request_unhashed->filled('anillo2'))
        {
          $guia->objeto()->attach($request_unhashed->input('anillo2'));
        }

        if($request_unhashed->filled('cintura'))
        {
          $guia->objeto()->attach($request_unhashed->input('cintura'));
        }

        if($request_unhashed->filled('piernas'))
        {
          $guia->objeto()->attach($request_unhashed->input('piernas'));
        }

        if($request_unhashed->filled('pies'))
        {
          $guia->objeto()->attach($request_unhashed->input('pies'));
        }

        if($request_unhashed->filled('arma'))
        {
          $guia->objeto()->attach($request_unhashed->input('arma'));
        }

        if($request_unhashed->filled('mano_izquierda'))
        {
          $guia->objeto()->attach($request_unhashed->input('mano_izquierda'));
        }

        return redirect()->back();
      }
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
    * @return Response
    */
    public static function validateModel(Request $request)
    {
      // Testing the data received
      $validator = Validator::make($request->all(), [
        'nombre' => 'required|min:3|max:70|string',

        'id_clase' => 'required|exists:clase,id',

        'habilidad1' => 'nullable|required_with:runa1|exists:habilidad,id',
        'habilidad2' => 'nullable|required_with:runa2|exists:habilidad,id',
        'habilidad3' => 'nullable|required_with:runa3|exists:habilidad,id',
        'habilidad4' => 'nullable|required_with:runa4|exists:habilidad,id',
        'habilidad5' => 'nullable|required_with:runa5|exists:habilidad,id',
        'habilidad6' => 'nullable|required_with:runa6|exists:habilidad,id',

        'runa1' => 'nullable|exists:runa,id',
        'runa2' => 'nullable|exists:runa,id',
        'runa3' => 'nullable|exists:runa,id',
        'runa4' => 'nullable|exists:runa,id',
        'runa5' => 'nullable|exists:runa,id',
        'runa6' => 'nullable|exists:runa,id',

        'pasiva1' => 'nullable|exists:habilidad,id',
        'pasiva2' => 'nullable|exists:habilidad,id',
        'pasiva3' => 'nullable|exists:habilidad,id',
        'pasiva4' => 'nullable|exists:habilidad,id',
        'pasiva5' => 'nullable|exists:habilidad,id',
        'pasiva6' => 'nullable|exists:habilidad,id',

        'cabeza' => 'nullable|exists:objeto,id',
        'hombros' => 'nullable|exists:objeto,id',
        'amuleto' => 'nullable|exists:objeto,id',
        'torso' => 'nullable|exists:objeto,id',
        'manos' => 'nullable|exists:objeto,id',
        'munecas' => 'nullable|exists:objeto,id',
        'anillo1' => 'nullable|exists:objeto,id',
        'anillo2' => 'nullable|exists:objeto,id',
        'cintura' => 'nullable|exists:objeto,id',
        'piernas' => 'nullable|exists:objeto,id',
        'pies' => 'nullable|exists:objeto,id',
        'arma' => 'nullable|exists:objeto,id',
        'mano_izquierda' => 'nullable|exists:objeto,id',

        'cubo1' => 'nullable|exists:objeto,id',
        'cubo2' => 'nullable|exists:objeto,id',
        'cubo3' => 'nullable|exists:objeto,id',

        'gema1' => 'nullable|exists:objeto,id',
        'gema2' => 'nullable|exists:objeto,id',
        'gema3' => 'nullable|exists:objeto,id',

        'estad_principal' => 'nullable|min:1|max:4',
        'vitalidad' => 'nullable|min:1|max:4',
        'v_movimiento' => 'nullable|min:1|max:4',
        'recurso_max' => 'nullable|min:1|max:4',

        'v_ataque' => 'nullable|min:1|max:4',
        'reduccion_enf' => 'nullable|min:1|max:4',
        'prob_golpe_crit' => 'nullable|min:1|max:4',
        'dano_golpe_crit' => 'nullable|min:1|max:4',

        'vida' => 'nullable|min:1|max:4',
        'armadura' => 'nullable|min:1|max:4',
        'todas_resist' => 'nullable|min:1|max:4',
        'regeneracion_vida' => 'nullable|min:1|max:4',

        'dano_area' => 'nullable|min:1|max:4',
        'reduc_coste' => 'nullable|min:1|max:4',
        'vida_por_golpe' => 'nullable|min:1|max:4',
        'hallazgo_oro' => 'nullable|min:1|max:4',

        'descripcion_guia' => 'nullable|string|min:5|max:1000',

        'video_guia' => 'nullable|string|min:2|max:250',

        'visibilidad_guia' => 'nullable|in:publica,privada',
      ]);

      return $validator;
    }

    /**
    * Validate the attributes of a model
    *
    * @param  Request   $request
    * @return Request
    */
    public static function decodeObjetos(Request $request)
    {
      $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

      // Getting the unhashed id_clase
      $request->merge([ 'id_clase' => $hashids->decode($request->id_clase)[0] ]);

      // Getting the unhashed habilidad, runa and pasiva
      for ($i=1; $i < 7 ; $i++)
      {
        if($request->filled('habilidad'.$i))
        {
          $request->merge([ 'habilidad'.$i => $hashids->decode( $request->input('habilidad'.$i) )[0] ]);
        }

        if($request->filled('runa'.$i))
        {
          $request->merge([ 'runa'.$i => $hashids->decode( $request->input('runa'.$i) )[0] ]);
        }
      }

      for ($i=1; $i < 5 ; $i++)
      {
        if($request->filled('pasiva'.$i))
        {
          $request->merge([ 'pasiva'.$i => $hashids->decode( $request->input('pasiva'.$i) )[0] ]);
        }
      }

      // Getting the unhashed items
      if($request->filled('cabeza'))
      {
        $request->merge([ 'cabeza' => $hashids->decode( $request->input('cabeza') )[0] ]);
      }

      if($request->filled('hombros'))
      {
        $request->merge([ 'hombros' => $hashids->decode( $request->input('hombros') )[0] ]);
      }

      if($request->filled('amuleto'))
      {
        $request->merge([ 'amuleto' => $hashids->decode( $request->input('amuleto') )[0] ]);
      }

      if($request->filled('torso'))
      {
        $request->merge([ 'torso' => $hashids->decode( $request->input('torso') )[0] ]);
      }

      if($request->filled('manos'))
      {
        $request->merge([ 'manos' => $hashids->decode( $request->input('manos') )[0] ]);
      }

      if($request->filled('munecas'))
      {
        $request->merge([ 'munecas' => $hashids->decode( $request->input('munecas') )[0] ]);
      }

      if($request->filled('anillo1'))
      {
        $request->merge([ 'anillo1' => $hashids->decode( $request->input('anillo1') )[0] ]);
      }

      if($request->filled('anillo2'))
      {
        $request->merge([ 'anillo2' => $hashids->decode( $request->input('anillo2') )[0] ]);
      }

      if($request->filled('cintura'))
      {
        $request->merge([ 'cintura' => $hashids->decode( $request->input('cintura') )[0] ]);
      }

      if($request->filled('piernas'))
      {
        $request->merge([ 'piernas' => $hashids->decode( $request->input('piernas') )[0] ]);
      }

      if($request->filled('pies'))
      {
        $request->merge([ 'pies' => $hashids->decode( $request->input('pies') )[0] ]);
      }

      if($request->filled('arma'))
      {
        $request->merge([ 'arma' => $hashids->decode( $request->input('arma') )[0] ]);
      }

      if($request->filled('mano_izquierda'))
      {
        $request->merge([ 'mano_izquierda' => $hashids->decode( $request->input('mano_izquierda') )[0] ]);
      }

      // Getting the unhashed cubo and gema
      for ($i=1; $i < 4 ; $i++)
      {
        if($request->filled('cubo'.$i))
        {
          $request->merge([ 'cubo'.$i => $hashids->decode( $request->input('cubo'.$i) )[0] ]);
        }

        if($request->filled('gema'.$i))
        {
          $request->merge([ 'gema'.$i => $hashids->decode( $request->input('gema'.$i) )[0] ]);
        }
      }

      return $request;
    }
}
