<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function show(User $user)
  {
    //
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
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function destroy(User $user)
  {
    //
  }

  /**
  * Validate the attributes of an user
  *
  * @param  Request   $request
  * @return Response  Validator
  */
  public static function validateUser(Request $request)
  {
    // Testing the data received
    $validator = Validator::make($request->all(), [
      'nombre' => 'required|max:100|regex:/^[\pL\s]+$/u',
      'email' => 'required|email|unique:users,email|max:191',
      'password' => 'required_if:formType,create',
      'repitePassword' => 'required_with:password|same:password',
    ]);

    return $validator;
  }
}
