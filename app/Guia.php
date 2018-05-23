<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Hashids;

class Guia extends Model
{
    use SoftDeletes;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'guia';

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
      'nombre', 'id_usuario', 'id_clase', 'descripcion', 'video', 'visibilidad',
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
    public function usuario()
    {
      return $this->belongsTo('App\User', 'id_usuario', 'id');
    }

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
      return $this->belongsToMany('App\Objeto', 'guia_objeto', 'id_guia', 'id_objeto')->withPivot('posicion')->withTimeStamps();
    }

    /**
    * Relationship
    */
    public function habilidad()
    {
      return $this->belongsToMany('App\Habilidad', 'guia_habilidad', 'id_guia', 'id_habilidad')->using('App\GuiaHabilidad')->withPivot('id_runa', 'posicion')->withTimestamps();
    }

    /**
    * Relationship
    */
    public function runa()
    {
      return $this->belongsToMany('App\Runa', 'guia_habilidad', 'id_guia', 'id_runa')->using('App\GuiaHabilidad')->withPivot('posicion');
    }

    /**
    * Relationship
    */
    public function puntosLeyenda()
    {
      return $this->hasMany('App\PuntosLeyenda', 'id_guia', 'id');
    }

    /**
    * Relationship
    */
    public function comentarios()
    {
      return $this->hasMany('App\Comentario', 'id_guia', 'id');
    }

    /**
    * Relationship
    */
    public function voto_positivo()
    {
      return $this->hasMany('App\VotoPositivo', 'id_guia', 'id');
    }

    /**
    * Relationship
    */
    public function usuarios_favoritos()
    {
      return $this->belongsToMany('App\User', 'voto_positivo', 'id_guia', 'id_usuario');
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
    * Get the number of relationships with comentario
    *
    * @return integer
    */
    public function get_num_comentarios()
    {
      return $this->comentarios()->count();
    }

    /**
    * Get the number of relationships with voto_positivo
    *
    * @return integer
    */
    public function get_num_likes()
    {
      return $this->voto_positivo()->count();
    }

    /**
    * Get the habilidad in a given posicion
    * @param $pos
    * @return mixed
    */
    public function getHabilidadByPos($pos)
    {
      return $this->belongsToMany('App\Habilidad', 'guia_habilidad', 'id_guia', 'id_habilidad')->using('App\GuiaHabilidad')->withPivot('id_runa', 'posicion')->wherePivot('posicion', '=', $pos)->first();
    }

    /**
    * Get the habilidad in a given posicion
    * @param $pos
    * @return mixed
    */
    public function getTrimmedTitle()
    {
      return strlen($this->nombre) > 20 ? substr($this->nombre, 0, 20) .'...' : $this->nombre;
    }

    /**
     * Get the Guia's updated_at
     *
     * @param  string  $value
     * @return string
     */
    public function getUpdatedAt()
    {
        return date("d-m-Y", strtotime($this->updated_at));
    }
}
