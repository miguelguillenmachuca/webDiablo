<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Validator;
use Hashids;

class Runa extends Model
{
  use SoftDeletes;

  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'runa';

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
    'id_habilidad', 'nombre', 'descripcion', 'foto_runa',
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
    return $this->belongsTo('App\Habilidad', 'id_habilidad', 'id');
  }

  /**
  * Relationship
  */
  public function guia()
  {
    return $this->belongsToMany('App\Guia', 'guia_habilidad', 'id_runa', 'id_guia');
  }

  /**
  * Relationship
  */
  protected function guiaHabilidad()
  {
    return $this->hasMany('App\GuiaHabilidad', 'id_runa', 'id');
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
  * @param  \App\Clase $clase
  * @return array
  */
  public static function listNombreId(\App\Clase $clase)
  {
    $hashids = new \Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

    $idHabilidades = \App\Habilidad::where('id_clase', $clase->id)->where('tipo_habilidad', 'activa')->orderBy('nombre')->pluck('id')->toArray();

    $id = Runa::whereIn('id_habilidad', $idHabilidades)->orderBy('id_habilidad')->pluck('id')->toArray();

    foreach ($id as $key => $value)
    {
      $id[$key] = $hashids->encode($value);
    }

    $nombre = Runa::whereIn('id_habilidad', $idHabilidades)->orderBy('id_habilidad')->pluck('nombre')->toArray();

    $data = array_combine($id, $nombre);

    return $data;
  }
}
