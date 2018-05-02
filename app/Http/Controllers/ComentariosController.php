<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;
use Hashids;
use Auth;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Overwrite the id_guia value from the request with the decoded one
      $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

      // Getting the unhashed id_guia
      $request->merge([ 'id_guia' => $hashids->decode($request->id_guia)[0] ]);

      $comentario = new Comentario;

      $comentario->id_guia = $request->id_guia;
      $comentario->id_usuario = Auth::user()->id;
      $comentario->texto = $request->texto_com;

      $comentario->save();

      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
