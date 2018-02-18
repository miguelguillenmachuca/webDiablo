<?php

namespace App\Http\Controllers;

use App\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Validator;
use Storage;

class ClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clases = Clase::withTrashed()->orderBy('nombre')->paginate(20);

      return view('admin_clases', [ 'clases' => $clases ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.clase_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = ClasesController::validateModel($request);

      if($validator->fails())
      {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }
      else
      {
        $clase=new Clase;

        $clase->nombre = $request->nombre;

        if($request->hasFile('foto'))
        {
          $foto = Controller::saveFile($request, 'public/img/clases');

          // Cut out the 'public/' part of the string we want to save in the database
          $foto = substr($foto, 7);

          $clase->foto_clase = $foto;
        }

        $clase->save();

        return redirect()->back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        return view('visualizarClase')->with('clase', $clase);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {
        return view('forms.clase_update')->with('clase', $clase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clase $clase)
    {
      $validator = ClasesController::validateModel($request, $clase);

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
          $foto = Controller::saveFile($request, 'public/img/clases');

          // Cut out the 'public/' part of the string we want to save in the database
          $foto = substr($foto, 7);

          $request->request->add([ 'foto_clase' => $foto ]);
        }

        $clase->edit($request->all());

        return redirect()->back();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {
      if(!$clase->trashed())
      {
        $clase->delete();
      }

      return redirect()->back();
    }

    /**
    * Rostore the specified removed resource from storage.
    *
    * @param  \App\Clase  $clase
    * @return \Illuminate\Http\Response
    */
    public function restore(Clase $clase)
    {
      if($clase->trashed())
      {
        $clase->restore();
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
      ]);

      return $validator;
    }
}
