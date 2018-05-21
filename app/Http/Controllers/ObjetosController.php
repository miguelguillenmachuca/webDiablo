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
    $objetos = Objeto::withTrashed()->orderBy('id_clase')->orderBy('id_tipo_objeto')->orderBy('nombre')->paginate(20);

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
    $conjuntos = \App\Conjunto::listNombreId();

    return view('forms.objeto_create', [ 'clases' => $clases, 'tipos_objeto' => $tipos_objeto, 'conjuntos' => $conjuntos ]);
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

    if($request->id_clase != null)
    {
      $request->merge([ 'id_clase' => $hashids->decode($request->id_clase)[0] ]);
    }

    if($request->id_conjunto)
    {
      $request->merge([ 'id_conjunto' => $hashids->decode($request->id_conjunto)[0] ]);
    }

    $request->merge([ 'id_tipo_objeto' => $hashids->decode($request->id_tipo_objeto)[0] ]);

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

      if($request->id_conjunto == null)
      {
        $rareza = 'legendario';
      }
      else
      {
        $rareza = 'conjunto';
      }

      $objeto->id_conjunto = $request->id_conjunto;
      $objeto->rareza = $rareza;
      $objeto->id_tipo_objeto = $request->id_tipo_objeto;
      $objeto->efecto_legendario = $request->efecto_legendario;

      if($request->hasFile('foto'))
      {
        $foto = Controller::saveFile($request, 'public/img/objetos');

        // Cut out the 'public/' part of the string we want to save in the database
        $foto = substr($foto, 7);

        $objeto->foto_objeto = $foto;
      }

      $objeto->save();

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
    return view('visualizarObjeto')->with('objeto', $objeto);
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
    $default_tipo_objeto = $hashids->encode($objeto->id_tipo_objeto);
    $default_clase = $hashids->encode($objeto->clase);

    return view('forms.objeto_update', [ 'objeto' => $objeto, 'conjuntos' => $conjuntos,'tipos_objeto' => $tipos_objeto, 'clases' => $clases, 'default_conjunto' => $default_conjunto, 'default_tipo_objeto' => $default_tipo_objeto, 'default_clase' => $default_clase ]);
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

    if($request->id_clase != null)
    {
      $request->merge([ 'id_clase' => $hashids->decode($request->id_clase)[0] ]);
    }

    if($request->id_conjunto)
    {
      $request->merge([ 'id_conjunto' => $hashids->decode($request->id_conjunto)[0] ]);
    }

    $request->merge([ 'id_tipo_objeto' => $hashids->decode($request->id_tipo_objeto)[0] ]);

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
    if($request->id_clase != null)
    {
      $id_clase_rules = "exists:clase,id";
    }
    else
    {
      $id_clase_rules = "";
    }

    if($request->id_conjunto != null)
    {
      $id_conjunto_rules = "exists:conjunto,id";
    }
    else
    {
      $id_conjunto_rules = "";
    }
    // Testing the data received
    $validator = Validator::make($request->all(), [
      'nombre' => 'required|min:3|max:50|regex:/^[A-zÀ-úÀ-ÿñÑ\' ]*$/u',
      'id_clase' => $id_clase_rules,
      'id_conjunto' => $id_conjunto_rules,
      'id_tipo_objeto' => 'required|exists:tipo_objeto,id',
      'efecto_legendario' => 'string|nullable|max:220',
    ]);

    return $validator;
  }
}
