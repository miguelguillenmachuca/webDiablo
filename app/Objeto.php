<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Validator;
use Hashids;

class Objeto extends Model
{
  use SoftDeletes;

  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'objeto';

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
    'nombre', 'id_clase', 'id_tipo_objeto', 'rareza', 'efecto_legendario', 'foto_objeto',
  ];

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
  public function conjunto()
  {
    return $this->belongsTo('App\Conjunto', 'id_conjunto', 'id');
  }

  /**
  * Relationship
  */
  public function tipo_objeto()
  {
    return $this->belongsTo('\App\TipoObjeto', 'id_tipo_objeto', 'id');
  }

  /**
  * Relationship
  */
  public function guia()
  {
    return $this->belongsToMany('App\Guia', 'guia_objeto', 'id_objeto', 'id_guia');
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
  public static function listData()
  {
    $hashids = new \Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

    $id = Objeto::orderBy('nombre')->pluck('id')->toArray();

    foreach ($id as $key => $value)
    {
      $id[$key] = $hashids->encode($value);
    }

    $nombre = Objeto::with('tipo_objeto')->orderBy('nombre')->pluck('nombre', 'id_clase', 'tipo_objeto.categoria')->toArray();

    $data = array_combine($id, $nombre);

    return $data;
  }
}
