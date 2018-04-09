<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Validator;
use Storage;

class UsersController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $users = User::withTrashed()->orderBy('nombre')->paginate(20);

    return view('admin_usuarios', [ 'users' => $users ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('forms.usuario_create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $validator = UsersController::validateModel($request);

    if($validator->fails())
    {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }
    else
    {
      $user=new User;

      $user->nombre = $request->nombre;
      $user->email = $request->email;

      // Encriptación del password
      $user->password = Hash::make($request->password);

      $user->save();

      return redirect()->back();
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function show(User $user)
  {
    return view('visualizarUsuario', [ 'usuario' => $user ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function edit(User $user)
  {
    return view('forms.usuario_update')->with('usuario', $user);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, User $user)
  {
    $validator = UsersController::validateModel($request, $user);

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
        $avatar = Controller::saveFile($request, 'public/img/usuarios');

        // Cut out the 'public/' part of the string we want to save in the database
        $avatar = substr($avatar, 7);

        $request->request->add([ 'foto_usuario' => $avatar ]);
      }

      $user->edit($request->all());

      return redirect()->back();
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function destroy(User $user)
  {
    if(!$user->trashed())
    {
      $user->delete();
    }

    return redirect()->back();
  }

  /**
  * Restore the specified removed resource from storage.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function restore(User $user)
  {
    if($user->trashed())
    {
      $user->restore();
    }

    return redirect()->back();
  }

  /**
  * Validate the attributes of a model
  *
  * @param  Request   $request
  * @return Response  Validator
  */
  public static function validateModel(Request $request, $user = null)
  {

    // Testing the data received
    $validator = Validator::make($request->all(), [
      'nombre' => 'required|min:5|max:20|regex:/^[a-zA-Z0-9_]*$/u',
      // Make sure to ignore the unique email clause if is an update request
      'email' => 'required|email|max:191|unique:users,email' .$request->route()->uri() == 'admin/updateUser' || $request->route()->uri() == 'usuario/updateUser' ? $user->id: '',
      // If the request comes from de admin section, the password will be a required field
      'password' => 'min:6|max:20|regex:/^[a-zA-Z0-9_.-]*$/u' . $request->route()->uri() == 'admin/updateUser' ? '|required' : '',
      'repitePassword' => 'required_with:password|same:password',
    ]);

    return $validator;
  }
}
