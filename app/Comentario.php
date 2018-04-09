<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Validator;
use Hashids;

class Comentario extends Model
{
    use SoftDeletes;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'comentario';

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
      'id_guia', 'id_usuario', 'texto',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [

    ];

    /**********************************************************/
    /***************** Relationships **************************/
    /**********************************************************/

    /**
    * Relationship
    */
    public function guias()
    {
      return $this->belongsTo('App\Guia', 'id_guia', 'id');
    }

    /**
    * Relationship
    */
    public function usuario()
    {
      return $this->belongsTo('App\User', 'id_usuario', 'id');
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
}
