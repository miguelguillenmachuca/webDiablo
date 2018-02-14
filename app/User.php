<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Validator;
use Auth;

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
}
