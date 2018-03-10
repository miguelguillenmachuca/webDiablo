<?php

namespace App\Http\Controllers;

use App\Habilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Validator;
use Storage;
use Hashids;

class HabilidadesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $habilidades = Habilidad::withTrashed()->orderBy('id_clase')->orderBy('tipo_habilidad')->paginate(20);

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
    $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

    $request->merge([ 'id_clase' => $hashids->decode($request->id_clase)[0] ]);

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
      $habilidad->tipo_habilidad = $request->tipoHabilidad;
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

      // Generate the runas associated with the skill
      if($request->tipoHabilidad == 'activa')
      {
        $rController = new RunasController();
        // Creation of the 5 runa instances
        for ($i=1; $i <= 5 ; $i++)
        {
          // Create a custom request to send to RunasController's store method
          $runa_request = new Request;

          $runa_request->setMethod('POST');

          $runa_request->request->add([ 'nombre' => $request->input('runa' .$i), 'id_habilidad' => $habilidad->id ]);

          $rController->store($runa_request);
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
    $clases = \App\Clase::listNombreId();

    $hashids = new \Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

    $default = $hashids->encode($habilidad->id_clase);

    return view('forms.habilidad_update', [ 'habilidad' => $habilidad, 'clases' => $clases, 'default' => $default ]);
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
    $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

    $request->merge([ 'id_clase' => $hashids->decode($request->id_clase)[0] ]);

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
      'nombre' => 'required|min:3|max:50|regex:/^[A-zÀ-úÀ-ÿñÑ ]*$/u',
      'id_clase' => 'required|exists:clase,id',
      'descripcion' => 'required|min:5|max:1000|nullable|string',
    ]);

    return $validator;
  }
}
