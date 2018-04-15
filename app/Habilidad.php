<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Validator;
use Hashids;

class Habilidad extends Model
{
  use SoftDeletes;

  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'habilidad';

  /**
  * The attributes that should be mutated to dates.
  *
  * @var array
  */
  protected $dates = ['deleted_at', 'created_at', 'updated_at'];

  /**
  * The storage format of the model's date columns.
  *
  * @var string
  */
  // protected $dateFormat = 'j/n/Y g:i a';

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'nombre', 'tipo_habilidad', 'id_clase', 'descripcion', 'foto_habilidad',
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
  public function clase()
  {
    return $this->belongsTo('App\Clase', 'id_clase', 'id');
  }

  /**
  * Relationship
  */
  public function runa()
  {
    return $this->hasMany('App\Runa', 'id_runa', 'id');
  }

  /**
  * Relationship
  */
  public function guia()
  {
    return $this->belongsToMany('App\Guia', 'guia_habilidad', 'id_habilidad', 'id_guia')->using('App\GuiaHabilidad')->withPivot('id_runa', 'posicion')->withTimestamps();
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
  public static function listNombreIdActiva()
  {
    $hashids = new \Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

    $id = Habilidad::where('tipo_habilidad', 'activa')->orderBy('nombre')->pluck('id')->toArray();

    foreach ($id as $key => $value)
    {
      $id[$key] = $hashids->encode($value);
    }

    $nombre = Habilidad::where('tipo_habilidad', 'activa')->orderBy('nombre')->pluck('nombre')->toArray();

    $data = array_combine($id, $nombre);

    return $data;
  }

  /**
  * Retrieve a list of the nombre and id pairings of all model
  *
  * @return array
  */
  public static function listNombreIdPasiva()
  {
    $hashids = new \Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

    $id = Habilidad::where('tipo_habilidad', 'pasiva')->orderBy('nombre')->pluck('id')->toArray();

    foreach ($id as $key => $value)
    {
      $id[$key] = $hashids->encode($value);
    }

    $nombre = Habilidad::where('tipo_habilidad', 'activa')->orderBy('nombre')->pluck('nombre')->toArray();

    $data = array_combine($id, $nombre);

    return $data;
  }
}
