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

      return view('admin_efecto_conjuntos', [ 'efectos_conjuntos' => $efectos_conjuntos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Route::getFacadeRoot()->current()->uri() == 'admin/objetos/conjuntos/efectos/crear')
      {
        $clases = \App\Clase::listNombreId();

        return view('forms.habilidad_create', [ 'pasiva' => false, 'clases' => $clases ]);
      }
      else if(Route::getFacadeRoot()->current()->uri() == 'admin/habilidades/pasiva/crear')
      {
        $clases = \App\Clase::listNombreId();

        return view('forms.habilidad_create', [ 'pasiva' => true, 'clases' => $clases ]);
      }
      else
      {
        abort(404, 'Página no encontrada');
      }
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
     * @param  \App\EfectosConjunto  $efectosConjunto
     * @return \Illuminate\Http\Response
     */
    public function show(EfectosConjunto $efectosConjunto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EfectosConjunto  $efectosConjunto
     * @return \Illuminate\Http\Response
     */
    public function edit(EfectosConjunto $efectosConjunto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EfectosConjunto  $efectosConjunto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EfectosConjunto $efectosConjunto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EfectosConjunto  $efectosConjunto
     * @return \Illuminate\Http\Response
     */
    public function destroy(EfectosConjunto $efectosConjunto)
    {
        //
    }
}
