<?php

namespace App\Http\Controllers;

use App\EfectoConjunto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Validator;
use Hashids;

class EfectoConjuntosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $efectos_conjuntos = EfectoConjunto::withTrashed()->orderBy('id_conjunto')->orderBy('num_requisito')->paginate(20);

      return view('admin_objetos_conjuntos_efectos', [ 'efectos_conjuntos' => $efectos_conjuntos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $conjuntos = \App\Conjunto::listNombreId();

      return view('forms.objeto_conjunto_efectos_create', ['conjuntos' => $conjuntos ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

      $request->merge([ 'id_conjunto' => $hashids->decode($request->id_conjunto)[0] ]);

      $validator = EfectoConjuntosController::validateModel($request);

      if($validator->fails())
      {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }
      else
      {
        $efecto_conjunto=new EfectoConjunto;

        $efecto_conjunto->id_conjunto = $request->id_conjunto;
        $efecto_conjunto->num_requisito = $request->num_requisito;
        $efecto_conjunto->efecto = $request->efecto;

        $efecto_conjunto->save();

        return redirect()->back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EfectoConjunto  $efectosConjunto
     * @return \Illuminate\Http\Response
     */
    public function show(EfectoConjunto $efectosConjunto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EfectoConjunto  $efectosConjunto
     * @return \Illuminate\Http\Response
     */
    public function edit(EfectoConjunto $efectosConjunto)
    {
      $conjuntos = \App\Conjunto::listNombreId();

      $hashids = new \Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

      $default = $hashids->encode($efectosConjunto->id_conjunto);

      return view('forms.objeto_conjunto_efectos_update', [ 'efecto_conjunto' => $efectosConjunto, 'conjuntos' => $conjuntos, 'default' => $default ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EfectoConjunto  $efectosConjunto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EfectoConjunto $efectosConjunto)
    {
      $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

      $request->merge([ 'id_conjunto' => $hashids->decode($request->id_conjunto)[0] ]);

      $validator = EfectoConjuntosController::validateModel($request, $efectosConjunto);

      if($validator->fails())
      {
        return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
      }
      else
      {
        $efectosConjunto->edit($request->all());

        return redirect()->back();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EfectoConjunto  $efectosConjunto
     * @return \Illuminate\Http\Response
     */
    public function destroy(EfectoConjunto $efectosConjunto)
    {
      if(!$efectosConjunto->trashed())
      {
        $efectosConjunto->delete();
      }

      return redirect()->back();
    }

    /**
    * Restore the specified removed resource from storage.
    *
    * @param  \App\EfectoConjunto  $efectosConjunto
    * @return \Illuminate\Http\Response
    */
    public function restore(EfectoConjunto $efectosConjunto)
    {
      if($efectosConjunto->trashed())
      {
        $efectosConjunto->restore();
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
        'num_requisito' => 'numeric|min:2',
        'id_conjunto' => 'required|exists:conjunto,id',
        'efecto' => 'required|min:5|max:1000|string',
      ]);

      return $validator;
    }
}
