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
        $filters = false;
        $conditions = [];
        $clases = \App\Clase::listNombreId();

        switch (Route::currentRouteName())
        {
          case 'admin/guias':
            $guias = Guia::withTrashed()->paginate(20);

            return view('admin_guias', [ 'guias' => $guias ]);
          break;

          case 'guia':
          case 'guia/buscar':
            if(isset($_GET['nombre']))
            {
              array_push($conditions, ['guia.nombre', 'like', '%' .$_GET['nombre'] .'%']);

              $filters = true;
            }

            if(isset($_GET['autorGuia']))
            {
              array_push($conditions, ['users.nombre', 'like', '%' .$_GET['autorGuia'] .'%']);

              $filters = true;
            }

            if(isset($_GET['clase']) && $_GET['clase'] != '')
            {
              $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

              // Getting the unhashed id_clase
              $id_clase = $hashids->decode($_GET['clase'])[0];

              array_push($conditions, ['guia.id_clase', '=', $id_clase ]);

              $filters = true;
            }

            if($filters)
            {
              $guias = Guia::select('guia.*')->join('users', 'users.id', '=', 'guia.id_usuario')->where($conditions)->where('visibilidad', 'publica')->orderBy('updated_at', 'DESC')->paginate(10);
            }
            else
            {
              $guias = Guia::where('visibilidad', 'publica')->orderBy('updated_at', 'DESC')->paginate(10);
            }

            return view('verGuias', [ 'guias' => $guias, 'clases' => $clases ]);
          break;
        }

        abort(404, 'Página no encontrada');
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

          $listaPosObj = [
            'cabeza', 'hombros', 'amuleto', 'torso', 'manos', 'munecas', 'anillo1', 'anillo2', 'cintura', 'piernas', 'pies', 'arma', 'mano_izquierda'
          ];

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

          return view ('forms.guia_create', [
            'activas' => $habilidadesActivas,
            'runas' => $runas,
            'pasivas' => $habilidadesPasivas,
            'objetos' => $objetos,
            'armas' => $armas,
            'armaduras' => $armaduras,
            'accesorios' => $accesorios,
            'gema' => $gema,
            'clase' => $clase,
            'lista_pos_obj' => $listaPosObj
          ]);
        break;
      }

      abort(404, 'Página no encontrada');
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
        $guia->descripcion = $request_unhashed->descripcion;
        $guia->video = $request_unhashed->video;
        $guia->visibilidad = $request_unhashed->visibilidad;

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
          $guia->objeto()->attach($request_unhashed->input('cabeza'), [ 'posicion' => 'cabeza' ]);
        }

        if($request_unhashed->filled('hombros'))
        {
          $guia->objeto()->attach($request_unhashed->input('hombros'), [ 'posicion' => 'hombros' ]);
        }

        if($request_unhashed->filled('amuleto'))
        {
          $guia->objeto()->attach($request_unhashed->input('amuleto'), [ 'posicion' => 'amuleto' ]);
        }

        if($request_unhashed->filled('torso'))
        {
          $guia->objeto()->attach($request_unhashed->input('torso'), [ 'posicion' => 'torso' ]);
        }

        if($request_unhashed->filled('manos'))
        {
          $guia->objeto()->attach($request_unhashed->input('manos'), [ 'posicion' => 'manos' ]);
        }

        if($request_unhashed->filled('munecas'))
        {
          $guia->objeto()->attach($request_unhashed->input('munecas'), [ 'posicion' => 'munecas' ]);
        }

        if($request_unhashed->filled('anillo1'))
        {
          $guia->objeto()->attach($request_unhashed->input('anillo1'), [ 'posicion' => 'anillo1' ]);
        }

        if($request_unhashed->filled('anillo2'))
        {
          $guia->objeto()->attach($request_unhashed->input('anillo2'), [ 'posicion' => 'anillo2' ]);
        }

        if($request_unhashed->filled('cintura'))
        {
          $guia->objeto()->attach($request_unhashed->input('cintura'), [ 'posicion' => 'cintura' ]);
        }

        if($request_unhashed->filled('piernas'))
        {
          $guia->objeto()->attach($request_unhashed->input('piernas'), [ 'posicion' => 'piernas' ]);
        }

        if($request_unhashed->filled('pies'))
        {
          $guia->objeto()->attach($request_unhashed->input('pies'), [ 'posicion' => 'pies' ]);
        }

        if($request_unhashed->filled('arma'))
        {
          $guia->objeto()->attach($request_unhashed->input('arma'), [ 'posicion' => 'arma' ]);
        }

        if($request_unhashed->filled('mano_izquierda'))
        {
          $guia->objeto()->attach($request_unhashed->input('mano_izquierda'), [ 'posicion' => 'mano_izquierda' ]);
        }

        for ($i=1; $i < 4; $i++)
        {
          if($request_unhashed->filled('cubo'.$i))
          {
            $guia->objeto()->attach($request_unhashed->input('cubo'.$i), [ 'posicion' => 'cubo'.$i ]);
          }
        }

        for ($i=1; $i < 4; $i++)
        {
          if($request_unhashed->filled('gema'.$i))
          {
            $guia->objeto()->attach($request_unhashed->input('gema'.$i), [ 'posicion' => 'gema'.$i ]);
          }
        }

        // ----------------- PUNTOS LEYENDA -----------------
        if($request_unhashed->filled('estad_principal'))
        {
          $estad_principal = new \App\PuntosLeyenda;
          $estad_principal->id_guia = $guia->id;
          $estad_principal->estadistica = 'estad_principal';
          $estad_principal->prioridad = $request_unhashed->input('estad_principal');
          $estad_principal->save();
        }

        if($request_unhashed->filled('vitalidad'))
        {
          $vitalidad = new \App\PuntosLeyenda;
          $vitalidad->id_guia = $guia->id;
          $vitalidad->estadistica = 'vitalidad';
          $vitalidad->prioridad = $request_unhashed->input('vitalidad');
          $vitalidad->save();
        }

        if($request_unhashed->filled('v_movimiento'))
        {
          $v_movimiento = new \App\PuntosLeyenda;
          $v_movimiento->id_guia = $guia->id;
          $v_movimiento->estadistica = 'v_movimiento';
          $v_movimiento->prioridad = $request_unhashed->input('v_movimiento');
          $v_movimiento->save();
        }

        if($request_unhashed->filled('recurso_max'))
        {
          $recurso_max = new \App\PuntosLeyenda;
          $recurso_max->id_guia = $guia->id;
          $recurso_max->estadistica = 'recurso_max';
          $recurso_max->prioridad = $request_unhashed->input('recurso_max');
          $recurso_max->save();
        }

        if($request_unhashed->filled('v_ataque'))
        {
          $v_ataque = new \App\PuntosLeyenda;
          $v_ataque->id_guia = $guia->id;
          $v_ataque->estadistica = 'v_ataque';
          $v_ataque->prioridad = $request_unhashed->input('v_ataque');
          $v_ataque->save();
        }

        if($request_unhashed->filled('reduccion_enfr'))
        {
          $reduccion_enfr = new \App\PuntosLeyenda;
          $reduccion_enfr->id_guia = $guia->id;
          $reduccion_enfr->estadistica = 'reduccion_enfr';
          $reduccion_enfr->prioridad = $request_unhashed->input('reduccion_enfr');
          $reduccion_enfr->save();
        }

        if($request_unhashed->filled('prob_golpe_crit'))
        {
          $prob_golpe_crit = new \App\PuntosLeyenda;
          $prob_golpe_crit->id_guia = $guia->id;
          $prob_golpe_crit->estadistica = 'prob_golpe_crit';
          $prob_golpe_crit->prioridad = $request_unhashed->input('prob_golpe_crit');
          $prob_golpe_crit->save();
        }

        if($request_unhashed->filled('dano_golpe_crit'))
        {
          $dano_golpe_crit = new \App\PuntosLeyenda;
          $dano_golpe_crit->id_guia = $guia->id;
          $dano_golpe_crit->estadistica = 'dano_golpe_crit';
          $dano_golpe_crit->prioridad = $request_unhashed->input('dano_golpe_crit');
          $dano_golpe_crit->save();
        }

        if($request_unhashed->filled('vida'))
        {
          $vida = new \App\PuntosLeyenda;
          $vida->id_guia = $guia->id;
          $vida->estadistica = 'vida';
          $vida->prioridad = $request_unhashed->input('vida');
          $vida->save();
        }

        if($request_unhashed->filled('armadura'))
        {
          $armadura = new \App\PuntosLeyenda;
          $armadura->id_guia = $guia->id;
          $armadura->estadistica = 'armadura';
          $armadura->prioridad = $request_unhashed->input('armadura');
          $armadura->save();
        }

        if($request_unhashed->filled('todas_resist'))
        {
          $todas_resist = new \App\PuntosLeyenda;
          $todas_resist->id_guia = $guia->id;
          $todas_resist->estadistica = 'todas_resist';
          $todas_resist->prioridad = $request_unhashed->input('todas_resist');
          $todas_resist->save();
        }

        if($request_unhashed->filled('regeneracion_vida'))
        {
          $regeneracion_vida = new \App\PuntosLeyenda;
          $regeneracion_vida->id_guia = $guia->id;
          $regeneracion_vida->estadistica = 'regeneracion_vida';
          $regeneracion_vida->prioridad = $request_unhashed->input('regeneracion_vida');
          $regeneracion_vida->save();
        }

        if($request_unhashed->filled('dano_area'))
        {
          $dano_area = new \App\PuntosLeyenda;
          $dano_area->id_guia = $guia->id;
          $dano_area->estadistica = 'dano_area';
          $dano_area->prioridad = $request_unhashed->input('dano_area');
          $dano_area->save();
        }

        if($request_unhashed->filled('reduc_coste'))
        {
          $reduc_coste = new \App\PuntosLeyenda;
          $reduc_coste->id_guia = $guia->id;
          $reduc_coste->estadistica = 'reduc_coste';
          $reduc_coste->prioridad = $request_unhashed->input('reduc_coste');
          $reduc_coste->save();
        }

        if($request_unhashed->filled('vida_por_golpe'))
        {
          $vida_por_golpe = new \App\PuntosLeyenda;
          $vida_por_golpe->id_guia = $guia->id;
          $vida_por_golpe->estadistica = 'vida_por_golpe';
          $vida_por_golpe->prioridad = $request_unhashed->input('vida_por_golpe');
          $vida_por_golpe->save();
        }

        if($request_unhashed->filled('hallazgo_oro'))
        {
          $hallazgo_oro = new \App\PuntosLeyenda;
          $hallazgo_oro->id_guia = $guia->id;
          $hallazgo_oro->estadistica = 'hallazgo_oro';
          $hallazgo_oro->prioridad = $request_unhashed->input('hallazgo_oro');
          $hallazgo_oro->save();
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
        $habilidades = [];
        $runas = [];
        $listaPosObj = [
          'cabeza', 'hombros', 'amuleto', 'torso', 'manos', 'munecas', 'anillo1', 'anillo2', 'cintura', 'piernas', 'pies', 'arma', 'mano_izquierda'
        ];
        $objetos = [];
        $puntos_leyenda = [];

        if(Auth::check())
        {
          $votoPositivo = \App\VotoPositivo::where([ [ 'id_guia', $guia->id ], [ 'id_usuario', Auth::user()->id ] ])->first();
        }
        else
        {
          $votoPositivo = null;
        }

        $comentarios = \App\Comentario::where('id_guia', $guia->id)->paginate(10);

        foreach($guia->habilidad as $habilidad)
        {
          $habilidades[ $habilidad->pivot->posicion ] = $habilidad;
        }

        foreach($guia->runa as $runa)
        {
          $runas[ $runa->pivot->posicion ] = $runa;
        }

        foreach($guia->objeto as $objeto)
        {
          $objetos[ $objeto->pivot->posicion ] = $objeto;
        }

        foreach($guia->puntosLeyenda as $punto)
        {
          $puntos_leyenda[ $punto->estadistica ] = $punto;
        }

        return view('visualizarGuia', [
          'guia' => $guia,
          'habilidades' => $habilidades,
          'runas' => $runas,
          'listaPosObj' => $listaPosObj,
          'objetos' => $objetos,
          'puntos_leyenda' => $puntos_leyenda,
          'votoPositivo' => $votoPositivo,
          'comentarios' => $comentarios
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function edit(Guia $guia)
    {
      $clase = $guia->clase;

      $habilidadesActivas = \App\Habilidad::listNombreIdActiva($clase);

      $default_habilidades = [];

      $runas = \App\Runa::listNombreId($clase);

      $default_runas = [];

      $habilidadesPasivas = \App\Habilidad::listNombreIdPasiva($clase);

      $listaPosObj = [
        'cabeza', 'hombros', 'amuleto', 'torso', 'manos', 'munecas', 'anillo1', 'anillo2', 'cintura', 'piernas', 'pies', 'arma', 'mano_izquierda'
      ];

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

      $default_objetos = [];

      $default_puntos_leyenda = [];

      // Default values from the guia

      foreach($guia->habilidad as $habilidad)
      {
        $default_habilidades[ $habilidad->pivot->posicion ] = $habilidad;
      }

      foreach($guia->runa as $runa)
      {
        $default_runas[ $runa->pivot->posicion ] = $runa;
      }

      foreach($guia->objeto as $objeto)
      {
        $default_objetos[ $objeto->pivot->posicion ] = $objeto;
      }

      foreach($guia->puntosLeyenda as $punto)
      {
        $default_puntos_leyenda[ $punto->estadistica ] = $punto;
      }

      return view ('forms.guia_update', [
        'guia' => $guia,
        'activas' => $habilidadesActivas,
        'runas' => $runas,
        'pasivas' => $habilidadesPasivas,
        'lista_pos_obj' => $listaPosObj,
        'objetos' => $objetos,
        'armas' => $armas,
        'armaduras' => $armaduras,
        'accesorios' => $accesorios,
        'gema' => $gema,
        'clase' => $clase,
        'default_habilidades' => $default_habilidades,
        'default_runas' => $default_runas,
        'default_objetos' => $default_objetos,
        'default_puntos_leyenda' => $default_puntos_leyenda,
       ]);
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
      $request_original = $request->duplicate(null, $request->all());

      $request_unhashed = GuiasController::decodeObjetos($request_original);

      $validator = GuiasController::validateModel($request_unhashed);

      $validator = GuiasController::validateModel($request_unhashed);

      if($validator->fails())
      {
        return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
      }
      else
      {
        $guia->edit($request_unhashed->all());

        // ----------------- HABILIDADES -----------------
        $guia->habilidad()->detach();

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
        $guia->objeto()->detach();

        if($request_unhashed->filled('cabeza'))
        {
          $guia->objeto()->attach($request_unhashed->input('cabeza'), [ 'posicion' => 'cabeza' ]);
        }

        if($request_unhashed->filled('hombros'))
        {
          $guia->objeto()->attach($request_unhashed->input('hombros'), [ 'posicion' => 'hombros' ]);
        }

        if($request_unhashed->filled('amuleto'))
        {
          $guia->objeto()->attach($request_unhashed->input('amuleto'), [ 'posicion' => 'amuleto' ]);
        }

        if($request_unhashed->filled('torso'))
        {
          $guia->objeto()->attach($request_unhashed->input('torso'), [ 'posicion' => 'torso' ]);
        }

        if($request_unhashed->filled('manos'))
        {
          $guia->objeto()->attach($request_unhashed->input('manos'), [ 'posicion' => 'manos' ]);
        }

        if($request_unhashed->filled('munecas'))
        {
          $guia->objeto()->attach($request_unhashed->input('munecas'), [ 'posicion' => 'munecas' ]);
        }

        if($request_unhashed->filled('anillo1'))
        {
          $guia->objeto()->attach($request_unhashed->input('anillo1'), [ 'posicion' => 'anillo1' ]);
        }

        if($request_unhashed->filled('anillo2'))
        {
          $guia->objeto()->attach($request_unhashed->input('anillo2'), [ 'posicion' => 'anillo2' ]);
        }

        if($request_unhashed->filled('cintura'))
        {
          $guia->objeto()->attach($request_unhashed->input('cintura'), [ 'posicion' => 'cintura' ]);
        }

        if($request_unhashed->filled('piernas'))
        {
          $guia->objeto()->attach($request_unhashed->input('piernas'), [ 'posicion' => 'piernas' ]);
        }

        if($request_unhashed->filled('pies'))
        {
          $guia->objeto()->attach($request_unhashed->input('pies'), [ 'posicion' => 'pies' ]);
        }

        if($request_unhashed->filled('arma'))
        {
          $guia->objeto()->attach($request_unhashed->input('arma'), [ 'posicion' => 'arma' ]);
        }

        if($request_unhashed->filled('mano_izquierda'))
        {
          $guia->objeto()->attach($request_unhashed->input('mano_izquierda'), [ 'posicion' => 'mano_izquierda' ]);
        }

        for ($i=1; $i < 4; $i++)
        {
          if($request_unhashed->filled('cubo'.$i))
          {
            $guia->objeto()->attach($request_unhashed->input('cubo'.$i), [ 'posicion' => 'cubo'.$i ]);
          }
        }

        for ($i=1; $i < 4; $i++)
        {
          if($request_unhashed->filled('gema'.$i))
          {
            $guia->objeto()->attach($request_unhashed->input('gema'.$i), [ 'posicion' => 'gema'.$i ]);
          }
        }

        // ----------------- PUNTOS LEYENDA -----------------
        $estad_principal = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'estad_principal')->first();

        if($estad_principal == null)
        {
          $estad_principal = new \App\PuntosLeyenda;
          $estad_principal->id_guia = $guia->id;
          $estad_principal->estadistica = 'estad_principal';
        }

        $estad_principal->prioridad = $request_unhashed->input('estad_principal');
        $estad_principal->save();


        $vitalidad = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'vitalidad')->first();

        if($vitalidad == null)
        {
          $vitalidad = new \App\PuntosLeyenda;
          $vitalidad->id_guia = $guia->id;
          $vitalidad->estadistica = 'vitalidad';
        }

        $vitalidad->prioridad = $request_unhashed->input('vitalidad');
        $vitalidad->save();

        $v_movimiento = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'v_movimiento')->first();

        if($v_movimiento == null)
        {
          $v_movimiento = new \App\PuntosLeyenda;
          $v_movimiento->id_guia = $guia->id;
          $v_movimiento->estadistica = 'v_movimiento';
        }

        $v_movimiento->prioridad = $request_unhashed->input('v_movimiento');
        $v_movimiento->save();

        $recurso_max = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'recurso_max')->first();

        if($recurso_max == null)
        {
          $recurso_max = new \App\PuntosLeyenda;
          $recurso_max->id_guia = $guia->id;
          $recurso_max->estadistica = 'recurso_max';
        }

        $recurso_max->prioridad = $request_unhashed->input('recurso_max');
        $recurso_max->save();

        $v_ataque = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'v_ataque')->first();

        if($v_ataque == null)
        {
          $v_ataque = new \App\PuntosLeyenda;
          $v_ataque->id_guia = $guia->id;
          $v_ataque->estadistica = 'v_ataque';
        }

        $v_ataque->prioridad = $request_unhashed->input('v_ataque');
        $v_ataque->save();

        $reduccion_enfr = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'reduccion_enfr')->first();

        if($reduccion_enfr == null)
        {
          $reduccion_enfr = new \App\PuntosLeyenda;
          $reduccion_enfr->id_guia = $guia->id;
          $reduccion_enfr->estadistica = 'reduccion_enfr';
        }

        $reduccion_enfr->prioridad = $request_unhashed->input('reduccion_enfr');
        $reduccion_enfr->save();

        $prob_golpe_crit = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'prob_golpe_crit')->first();

        if($prob_golpe_crit == null)
        {
          $prob_golpe_crit = new \App\PuntosLeyenda;
          $prob_golpe_crit->id_guia = $guia->id;
          $prob_golpe_crit->estadistica = 'prob_golpe_crit';
        }

        $prob_golpe_crit->prioridad = $request_unhashed->input('prob_golpe_crit');
        $prob_golpe_crit->save();

        $dano_golpe_crit = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'dano_golpe_crit')->first();

        if($dano_golpe_crit == null)
        {
          $dano_golpe_crit = new \App\PuntosLeyenda;
          $dano_golpe_crit->id_guia = $guia->id;
          $dano_golpe_crit->estadistica = 'dano_golpe_crit';
        }

        $dano_golpe_crit->prioridad = $request_unhashed->input('dano_golpe_crit');
        $dano_golpe_crit->save();

        $vida = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'vida')->first();

        if($vida == null)
        {
          $vida = new \App\PuntosLeyenda;
          $vida->id_guia = $guia->id;
          $vida->estadistica = 'vida';
        }

        $vida->prioridad = $request_unhashed->input('vida');
        $vida->save();

        $armadura = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'armadura')->first();

        if($armadura == null)
        {
          $armadura = new \App\PuntosLeyenda;
          $armadura->id_guia = $guia->id;
          $armadura->estadistica = 'armadura';
        }

        $armadura->prioridad = $request_unhashed->input('armadura');
        $armadura->save();

        $todas_resist = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'todas_resist')->first();

        if($todas_resist == null)
        {
          $todas_resist = new \App\PuntosLeyenda;
          $todas_resist->id_guia = $guia->id;
          $todas_resist->estadistica = 'todas_resist';
        }

        $todas_resist->prioridad = $request_unhashed->input('todas_resist');
        $todas_resist->save();

        $regeneracion_vida = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'regeneracion_vida')->first();

        if($regeneracion_vida == null)
        {
          $regeneracion_vida = new \App\PuntosLeyenda;
          $regeneracion_vida->id_guia = $guia->id;
          $regeneracion_vida->estadistica = 'regeneracion_vida';
        }

        $regeneracion_vida->prioridad = $request_unhashed->input('regeneracion_vida');
        $regeneracion_vida->save();

        $dano_area = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'dano_area')->first();

        if($dano_area == null)
        {
          $dano_area = new \App\PuntosLeyenda;
          $dano_area->id_guia = $guia->id;
          $dano_area->estadistica = 'dano_area';
        }

        $dano_area->prioridad = $request_unhashed->input('dano_area');
        $dano_area->save();

        $reduc_coste = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'reduc_coste')->first();

        if($reduc_coste == null)
        {
          $reduc_coste = new \App\PuntosLeyenda;
          $reduc_coste->id_guia = $guia->id;
          $reduc_coste->estadistica = 'reduc_coste';
        }

        $reduc_coste->prioridad = $request_unhashed->input('reduc_coste');
        $reduc_coste->save();

        $vida_por_golpe = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'vida_por_golpe')->first();

        if($vida_por_golpe == null)
        {
          $vida_por_golpe = new \App\PuntosLeyenda;
          $vida_por_golpe->id_guia = $guia->id;
          $vida_por_golpe->estadistica = 'vida_por_golpe';
        }

        $vida_por_golpe->prioridad = $request_unhashed->input('vida_por_golpe');
        $vida_por_golpe->save();

        $hallazgo_oro = \App\PuntosLeyenda::where('id_guia', $guia->id)->where('estadistica', 'hallazgo_oro')->first();

        if($hallazgo_oro == null)
        {
          $hallazgo_oro = new \App\PuntosLeyenda;
          $hallazgo_oro->id_guia = $guia->id;
          $hallazgo_oro->estadistica = 'hallazgo_oro';
        }

        $hallazgo_oro->prioridad = $request_unhashed->input('hallazgo_oro');
        $hallazgo_oro->save();

        return redirect()->back();
      }
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
        'reduccion_enfr' => 'nullable|min:1|max:4',
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

        'descripcion' => 'nullable|string|min:5|max:1000',

        'video' => 'nullable|string|min:2|max:250',

        'visibilidad' => 'nullable|in:publica,privada',
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
