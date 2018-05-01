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
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'clase';

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

  /**********************************************************/
  /***************** Relationships **************************/
  /**********************************************************/

  /**
  * Relationship
  */
  public function habilidad()
  {
    return $this->hasMany('App\Habilidad', 'id_habilidad', 'id');
  }

  /**
  * Relationship
  */
  public function guia()
  {
    return $this->hasMany('App\Guia', 'id_clase', 'id');
  }

  /**
  * Get the value of the model's route key.
  *
  * @return mixed
  */
  public function getRouteKey()
  {
    $hashids = new \Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

    return $hashids->encode($this->getKey());
  }

  /**
  * Update the attributes of the model instance
  *
  * @param             $new_values
  * @return
  */
  public function edit($new_values)
  {
    $this->update($new_values);
  }

  /**
  * Retrieve a list of the nombre and id pairings of all model
  *
  * @return array
  */
  public static function listNombreId()
  {
    $hashids = new \Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

    $id = Clase::orderBy('nombre')->pluck('id')->toArray();

    foreach ($id as $key => $value)
    {
      $id[$key] = $hashids->encode($value);
    }

    $nombre = Clase::orderBy('nombre')->pluck('nombre')->toArray();

    $data = array_combine($id, $nombre);

    return $data;
  }
}
