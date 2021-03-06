<?php

namespace App\Http\Controllers;

use App\TipoObjeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Validator;
use Hashids;

class TipoObjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tipo_objetos = TipoObjeto::withTrashed()->orderBy('nombre')->paginate(20);

      return view('admin_tipo_objetos', [ 'tipo_objetos' => $tipo_objetos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clases = \App\Clase::listNombreId();

      $categorias = [
        'cabeza'           => 'Cabeza',
        'hombros'          => 'Hombros',
        'torso'            => 'Torso',
        'munecas'          => 'Muñecas',
        'manos'            => 'Manos',
        'cintura'          => 'Cintura',
        'piernas'          => 'Piernas',
        'pies'             => 'Pies',
        'mano_izquierda'   => 'Mano izquierda',
        'una_mano'         => 'Una mano',
        'dos_manos'        => 'Dos manos',
        'a_distancia'      => 'A distancia',
        'anillo'           => 'Anillo',
        'amuleto'          => 'Amuleto',
        'gema'             => 'Gema'
      ];

      return view('forms.tipo_objeto_create', [ 'clases' => $clases, 'categorias' => $categorias ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->id_clase)
      {
        $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

        $request->merge([ 'id_clase' => $hashids->decode($request->id_clase)[0] ]);
      }

      $validator = TipoObjetosController::validateModel($request);

      if($validator->fails())
      {
        return redirect()->back()
                ->withErrors($validator)
                ->withInput();
      }
      else
      {
        $tipo_objeto=new TipoObjeto;

        $tipo_objeto->nombre = $request->nombre;
        $tipo_objeto->id_clase = $request->id_clase;
        $tipo_objeto->categoria_obj = $request->categoria_obj;

        $tipo_objeto->save();

        return redirect()->back()->with('success', true);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoObjeto  $tipoObjeto
     * @return \Illuminate\Http\Response
     */
    public function show(TipoObjeto $tipoObjeto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoObjeto  $tipoObjeto
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoObjeto $tipoObjeto)
    {
      $clases = \App\Clase::listNombreId();
      $categorias = [
        'cabeza'           => 'Cabeza',
        'hombros'          => 'Hombros',
        'torso'            => 'Torso',
        'munecas'          => 'Muñecas',
        'manos'            => 'Manos',
        'cintura'          => 'Cintura',
        'piernas'          => 'Piernas',
        'pies'             => 'Pies',
        'mano_izquierda'   => 'Mano izquierda',
        'una_mano'         => 'Una mano',
        'dos_manos'        => 'Dos manos',
        'a_distancia'      => 'A distancia',
        'anillo'           => 'Anillo',
        'amuleto'          => 'Amuleto',
        'gema'             => 'Gema'
      ];

      $hashids = new \Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

      $default_clase = $hashids->encode($tipoObjeto->clase);

      return view('forms.tipo_objeto_update', [ 'tipo_objeto' => $tipoObjeto, 'categorias' => $categorias, 'clases' => $clases, 'default_clase' => $default_clase ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoObjeto  $tipoObjeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoObjeto $tipoObjeto)
    {
      if($request->id_clase)
      {
        $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

        $request->merge([ 'id_clase' => $hashids->decode($request->id_clase)[0] ]);
      }

      $validator = TipoObjetosController::validateModel($request, $tipoObjeto);

      if($validator->fails())
      {
        return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
      }
      else
      {
        $tipoObjeto->edit($request->all());

        return redirect()->back()->with('success', true);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoObjeto  $tipo_objeto
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoObjeto $tipo_objeto)
    {
      if(!$tipo_objeto->trashed())
      {
        $tipo_objeto->delete();
      }

      return redirect()->back();
    }

    /**
    * Restore the specified removed resource from storage.
    *
    * @param  \App\TipoObjeto  $tipo_objeto
    * @return \Illuminate\Http\Response
    */
    public function restore(TipoObjeto $tipo_objeto)
    {
      if($tipo_objeto->trashed())
      {
        $tipo_objeto->restore();
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
      if($request->id_clase)
      {
        $id_clase_rules = 'exists:clase,id';
      }
      else
      {
        $id_clase_rules = '';
      }

      // Testing the data received
      $validator = Validator::make($request->all(), [
        'nombre' => 'required|min:3|max:50|regex:/^[A-zÀ-úÀ-ÿñÑ ]*$/u',
        'id_clase' => $id_clase_rules,
      ]);

      return $validator;
    }
}
