<?php

namespace App\Http\Controllers;

use App\VotoPositivo;
use Illuminate\Http\Request;
use Auth;
use Hashids;

class VotosPositivosController extends Controller
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
      // Check if the user is authenticated
      if(Auth::check())
      {
        // Overwrite the id_guia value from the request with the decoded one
        $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

        // Getting the unhashed id_guia
        $request->merge([ 'id_guia' => $hashids->decode($request->id_guia)[0] ]);

        // Check if there is a voto positivo, even if is a deleted one
        if(!VotoPositivo::withTrashed()->where([ [ 'id_guia', $request->id_guia ], [ 'id_usuario', Auth::user()->id ] ])->exists())
        {
          // If it doesn't exist, then I create a new one
          $voto = new VotoPositivo;

          $voto->id_guia = $request->id_guia;
          $voto->id_usuario = Auth::user()->id;

          $voto->save();

          return redirect()->back();
        }
        else
        {
          if(VotoPositivo::withTrashed()->where([ [ 'id_guia', $request->id_guia ], [ 'id_usuario', Auth::user()->id ] ])->first()->trashed())
          {
            $voto = VotoPositivo::withTrashed()->where([ [ 'id_guia', $request->id_guia ], [ 'id_usuario', Auth::user()->id ] ])->first();

            $this->restore($voto);

            return redirect()->back();
          }
          // If the VotoPositivo isn't trashed, then it shouldn't be created again
          else
          {
            abort(401, 'Permiso denegado');
          }
        }
      }
      // If there isn't an user logged in, it can't make a VotoPositivo
      else
      {
        abort(401, 'Permiso denegado');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VotoPositivo  $votoPositivo
     * @return \Illuminate\Http\Response
     */
    public function show(VotoPositivo $votoPositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VotoPositivo  $votoPositivo
     * @return \Illuminate\Http\Response
     */
    public function edit(VotoPositivo $votoPositivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VotoPositivo  $votoPositivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VotoPositivo $votoPositivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VotoPositivo  $votoPositivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(VotoPositivo $votoPositivo)
    {
      if(!$votoPositivo->trashed())
      {
        $votoPositivo->delete();
      }

      return redirect()->back();
    }

    /**
    * Restore the specified removed resource from storage.
    *
    * @param  \App\VotoPositivo  $votoPositivo
    * @return \Illuminate\Http\Response
    */
    public function restore(VotoPositivo $votoPositivo)
    {
      if($votoPositivo->trashed())
      {
        $votoPositivo->restore();
      }

      return redirect()->back();
    }
}
