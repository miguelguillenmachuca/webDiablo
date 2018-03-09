<?php

namespace App\Http\Controllers;

use App\Runa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Validator;
use Storage;

class RunasController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $runas = Runa::withTrashed()->orderBy('id_habilidad')->paginate(20);

    return view('admin_runas', [ 'runas' => $runas ]);
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
    $validator = HabilidadesController::validateModel($request);

    if($validator->fails())
    {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }
    else
    {
      $runa=new Runa;

      $runa->id_habilidad = $request->id_habilidad;
      $runa->nombre = $request->nombre;
      $runa->descripcion = $request->descripcion;

      if($request->hasFile('foto'))
      {
        $foto = Controller::saveFile($request, 'public/img/runas');

        // Cut out the 'public/' part of the string we want to save in the database
        $foto = substr($foto, 7);

        $runa->foto_runa = $foto;
      }

      $runa->save();
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Runa  $runa
  * @return \Illuminate\Http\Response
  */
  public function show(Runa $runa)
  {
    return view('visualizarRuna')->with('runa', $runa);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Runa  $runa
  * @return \Illuminate\Http\Response
  */
  public function edit(Runa $runa)
  {
    return view('forms.runa_update')->with('runa', $runa);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Runa  $runa
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Runa $runa)
  {
    $validator = RunasController::validateModel($request, $runa);

    if($validator->fails())
    {
      return redirect()
      ->back()
      ->withErrors($validator)
      ->withInput();
    }
    else
    {
      if($request->hasFile('foto'))
      {
        $foto = Controller::saveFile($request, 'public/img/runas');

        // Cut out the 'public/' part of the string we want to save in the database
        $foto = substr($foto, 7);

        $request->request->add([ 'foto_runa' => $foto ]);
      }

      $runa->edit($request->all());

      return redirect()->back();
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Runa  $runa
  * @return \Illuminate\Http\Response
  */
  public function destroy(Runa $runa)
  {
    if(!$runa->trashed())
    {
      $runa->delete();
    }

    return redirect()->back();
  }

  /**
  * Rostore the specified removed resource from storage.
  *
  * @param  \App\Runa  $runa
  * @return \Illuminate\Http\Response
  */
  public function restore(Runa $runa)
  {
    if($runa->trashed())
    {
      $runa->restore();
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
      'nombre' => 'required|min:3|max:20|regex:/^[A-zÀ-úÀ-ÿ ]*$/u',
      'descripcion' => 'min:5|max:200|nullable|string',
    ]);

    return $validator;
  }
}
