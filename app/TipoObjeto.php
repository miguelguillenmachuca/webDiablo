<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Hashids;

class TipoObjeto extends Model
{
  use SoftDeletes;

  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'tipo_objeto';

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
    'nombre', 'id_clase', 'categoria_objeto',
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
  public function objeto()
  {
    return $this->hasMany('App\Objeto', 'tipo_objeto', 'id');
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

    $id = TipoObjeto::orderBy('nombre')->pluck('id')->toArray();

    foreach ($id as $key => $value)
    {
      $id[$key] = $hashids->encode($value);
    }

    $nombre = TipoObjeto::orderBy('nombre')->pluck('nombre')->toArray();

    $data = array_combine($id, $nombre);

    return $data;
  }
}
