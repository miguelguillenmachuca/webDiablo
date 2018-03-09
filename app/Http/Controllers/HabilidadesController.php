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
    if(Route::getFacadeRoot()->current()->uri() == 'admin/habilidades/crear')
    {
      return view('forms.habilidad_create', [ 'pasiva' => false ]);
    }
    else if(Route::getFacadeRoot()->current()->uri() == 'admin/habilidades/pasiva/crear')
    {
      return view('forms.habilidad_create', [ 'pasiva' => true ]);
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

      // Generate the runes associated with the skill
      if($request->tipo_habilidad == 'activa')
      {
        // Creation of the 5 runa instances
        for ($i=1; $i <= 5 ; $i++)
        {
          // Create a custom request to send to RunasController's store method
          $runa_request = new Request;

          $runa_request->setMethod('POST');

          $runa_request->request->add([ 'nombre' => $request->runa+$i, 'id_habilidad' => $habilidad->id ]);

          RunasController::store($runa_request);
        }

      }

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
    return view('visualizarHabilidad')->with('habilidad', $habilidad);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Habilidad  $habilidad
  * @return \Illuminate\Http\Response
  */
  public function edit(Habilidad $habilidad)
  {
    return view('forms.habilidad_update')->with('habilidad', $habilidad);
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
    $validator = HabilidadesController::validateModel($request, $habilidad);

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
        $foto = Controller::saveFile($request, 'public/img/habilidades');

        // Cut out the 'public/' part of the string we want to save in the database
        $foto = substr($foto, 7);

        $request->request->add([ 'foto_habilidad' => $foto ]);
      }

      $habilidad->edit($request->all());

      return redirect()->back();
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Habilidad  $habilidad
  * @return \Illuminate\Http\Response
  */
  public function destroy(Habilidad $habilidad)
  {
    if(!$habilidad->trashed())
    {
      $habilidad->delete();
    }

    return redirect()->back();
  }

  /**
  * Rostore the specified removed resource from storage.
  *
  * @param  \App\Habilidad  $habilidad
  * @return \Illuminate\Http\Response
  */
  public function restore(Habilidad $habilidad)
  {
    if($habilidad->trashed())
    {
      $habilidad->restore();
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
      'id_clase' => 'required|exists:clase',
      'descripcion' => 'required|min:5|max:200|nullable|string',
    ]);

    return $validator;
  }
}
