<?php

namespace App\Http\Controllers;

use App\Objeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Validator;
use Storage;
use Hashids;

class ObjetosController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $objetos = Objeto::withTrashed()->orderBy('id_clase')->orderBy('tipo_objeto')->orderBy('nombre')->paginate(20);

    return view('admin_objetos', [ 'objetos' => $objetos ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $clases = \App\Clase::listNombreId();
    $tipos_objeto = \App\TipoObjeto::listNombreId();

    return view('forms.objeto_create', [ 'clases' => $clases, 'tipos_objeto' => $tipos_objeto ]);
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

    $request->merge([ 'tipo_objeto' => $hashids->decode($request->tipo_objeto)[0] ]);

    $validator = ObjetosController::validateModel($request);

    if($validator->fails())
    {
      return redirect()->back()
              ->withErrors($validator)
              ->withInput();
    }
    else
    {
      $objeto=new Objeto;

      $objeto->nombre = $request->nombre;
      $objeto->id_clase = $request->id_clase;

      if($request->rareza != 'legendario')
      {
        $conjunto = $request->rareza;

        $request->merge([ 'rareza' => 'conjunto' ]);
      }

      $objeto->rareza = $request->rareza;
      $objeto->tipo_objeto = $request->tipo_objeto;
      $objeto->efecto_legendario = $request->efecto_legendario;

      if($request->hasFile('foto'))
      {
        $foto = Controller::saveFile($request, 'public/img/objetos');

        // Cut out the 'public/' part of the string we want to save in the database
        $foto = substr($foto, 7);

        $habilidad->foto_objeto = $foto;
      }

      $objeto->save();

      if($request->rareza == 'conjunto')
      {
        $objeto_conjunto = new App\ObjetoConjunto;

        $objeto_conjunto->id_objeto = $objeto->id;
        $objeto_conjunto->id_conjunto = $conjunto;

        $objeto_conjunto->save();
      }

      return redirect()->back();
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Objeto  $objeto
  * @return \Illuminate\Http\Response
  */
  public function show(Objeto $objeto)
  {
    return view('visualizarHabilidad')->with('habilidad', $habilidad);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Objeto  $objeto
  * @return \Illuminate\Http\Response
  */
  public function edit(Objeto $objeto)
  {
    $conjuntos = \App\Conjunto::listNombreId();
    $tipos_objeto = \App\TipoObjeto::listNombreId();
    $clases = \App\Clase::listNombreId();

    $hashids = new \Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

    $default_conjunto = $hashids->encode($objeto->id_conjunto);
    $default_tipo_objeto = $hashids->encode($objeto->tipo_objeto);
    $default_clase = $hashids->encode($objeto->clase);

    return view('forms.habilidad_update', [ 'objeto' => $objeto, 'conjuntos' => $conjuntos,'tipos_objeto' => $tipos_objeto, 'clases' => $clases, 'default_conjunto' => $default_conjunto, 'default_tipo_objeto' => $default_tipo_objeto, 'default_clase' => $default_clase ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Objeto  $objeto
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Objeto $objeto)
  {
    $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

    $request->merge([ 'id_conjunto' => $hashids->decode($request->id_conjunto)[0] ]);
    $request->merge([ 'tipo_objeto' => $hashids->decode($request->tipo_objeto)[0] ]);

    $validator = ObjetosController::validateModel($request, $objeto);

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
        $foto = Controller::saveFile($request, 'public/img/objetos');

        // Cut out the 'public/' part of the string we want to save in the database
        $foto = substr($foto, 7);

        $request->request->add([ 'foto_objeto' => $foto ]);
      }

      $objeto->edit($request->all());

      return redirect()->back();
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Objeto  $objeto
  * @return \Illuminate\Http\Response
  */
  public function destroy(Objeto $objeto)
  {
    if(!$objeto->trashed())
    {
      $objeto->delete();
    }

    return redirect()->back();
  }

  /**
  * Restore the specified removed resource from storage.
  *
  * @param  \App\Objeto  $objeto
  * @return \Illuminate\Http\Response
  */
  public function restore(Objeto $objeto)
  {
    if($objeto->trashed())
    {
      $objeto->restore();
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
      'id_clase' => 'exists:clase,id',
      'id_conjunto' => 'exists:conjunto,id',
      'tipo_objeto' => 'required|exists:tipo_objeto,id',
      'rareza' => 'required',
      'efecto_legendario' => 'string',
    ]);

    return $validator;
  }
}
