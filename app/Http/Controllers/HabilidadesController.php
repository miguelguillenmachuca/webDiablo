<?php

namespace App\Http\Controllers;

use App\Habilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Validator;
use Storage;

class HabilidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $habilidades = Habilidad::withTrashed()->orderBy('id_clase')->paginate(20);

      return view('admin_habilidades', [ 'habilidades' => $habilidades ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.habilidad_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = HabilidadesController::validateModel($request);

      if($validator->fails())
      {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }
      else
      {
        $habilidad=new Habilidad;

        $habilidad->nombre = $request->nombre;
        $habilidad->tipo_habilidad = $request->tipo_habilidad;
        $habilidad->id_clase = $request->id_clase;
        $habilidad->descripcion = $request->descripcion;

        if($request->hasFile('foto'))
        {
          $foto = Controller::saveFile($request, 'public/img/habilidades');

          // Cut out the 'public/' part of the string we want to save in the database
          $foto = substr($foto, 7);

          $habilidad->foto_habilidad = $foto;
        }

        $habilidad->save();

        return redirect()->back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habilidad  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function show(Habilidad $habilidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habilidad  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Habilidad $habilidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habilidad  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habilidad $habilidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habilidad  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habilidad $habilidad)
    {
        //
    }
}
