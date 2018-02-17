<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Hashids;

class User extends Authenticatable
{
  use Notifiable, SoftDeletes;

  /**
  * The attributes that should be mutated to dates.
  *
  * @var array
  */
  protected $dates = ['deleted_at', 'created_at', 'updated_at'];

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'nombre', 'email', 'password', 'tipo_usuario', 'foto_usuario',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
  * Get the value of the model's route key.
  *
  * @return mixed
  */
  public function getRouteKey()
  {
    $hashids = new \Hashids\Hashids('No se me ocurre una salt, soy muy original');

    return $hashids->encode($this->getKey());
  }

  /**
  * Update the attributes of the user
  *
  * @param   Integer   $id
  * @param             $new_values
  * @return
  */
  public function edit($new_values)
  {
    if(array_key_exists('password', $new_values))
    {
      $new_values['password'] = Hash::make($new_values['password']);
    }

    $this->update($new_values);
  }

  /**
  * Gets the user with the hashed id
  *
  * @param   Integer   $id
  * @return  \App\User $user
  */
  public static function findByHashedId($hashedId)
  {
    $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original');

    $id = $hashids->decode($hashedId)[0];

    return \App\User::withTrashed()->findOrFail($id);
  }
}
