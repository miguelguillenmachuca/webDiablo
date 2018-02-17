<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Validator;
use Hashids;

class Clase extends Model
{
  use SoftDeletes;

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
    'nombre', 'foto_clase',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [ ];

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
  * Gets the model with the hashed id
  *
  * @param   Integer   $id
  * @return  \App\Clase $clase
  */
  public static function findByHashedId($hashedId)
  {
    $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original');

    $id = $hashids->decode($hashedId)[0];

    return \App\Clase::withTrashed()->findOrFail($id);
  }
}
