<?php

namespace App\Http\Controllers;

use App\Conjunto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Validator;
use Hashids;

class ConjuntosController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $conjuntos = Conjunto::withTrashed()->orderBy('nombre')->paginate(20);

    return view('admin_objetos_conjuntos', [ 'conjuntos' => $conjuntos ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('forms.objeto_conjunto_create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $validator = ConjuntosController::validateModel($request);

    if($validator->fails())
    {
      return redirect()->back()
              ->withErrors($validator)
              ->withInput();
    }
    else
    {
      $conjunto=new Conjunto;

      $conjunto->nombre = $request->nombre;

      $conjunto->save();

      return redirect()->back();
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Conjunto  $conjunto
  * @return \Illuminate\Http\Response
  */
  public function show(Conjunto $conjunto)
  {
    return view('visualizarConjunto', [ $conjunto ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Conjunto  $conjunto
  * @return \Illuminate\Http\Response
  */
  public function edit(Conjunto $conjunto)
  {
    return view('forms.objeto_conjunto_update')->with('conjunto', $conjunto);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Conjunto  $conjunto
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Conjunto $conjunto)
  {
    $validator = ConjuntosController::validateModel($request, $conjunto);

    if($validator->fails())
    {
      return redirect()
              ->back()
              ->withErrors($validator)
              ->withInput();
    }
    else
    {
      $conjunto->edit($request->all());

      return redirect()->back();
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Conjunto  $conjunto
  * @return \Illuminate\Http\Response
  */
  public function destroy(Conjunto $conjunto)
  {
    if(!$conjunto->trashed())
    {
      $conjunto->delete();
    }

    return redirect()->back();
  }

  /**
  * Restore the specified removed resource from storage.
  *
  * @param  \App\Conjunto  $conjunto
  * @return \Illuminate\Http\Response
  */
  public function restore(Conjunto $conjunto)
  {
    if($conjunto->trashed())
    {
      $conjunto->restore();
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
      'nombre' => 'required|min:3|max:30|regex:/^[A-zÀ-úÀ-ÿñÑ\'\- ]*$/u',
    ]);

    return $validator;
  }
}
