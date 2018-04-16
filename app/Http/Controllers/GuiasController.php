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

          $objetos = \App\Objeto::listData();

          return view ('forms.guia_create', [ 'activas' => $habilidadesActivas, 'runas' => $runas, 'pasivas' => $runas, 'objetos' => $objetos ]);
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
