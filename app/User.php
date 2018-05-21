<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Hashids;
use App\Notifications\MailResetPasswordToken;

class User extends Authenticatable
{
  use Notifiable, SoftDeletes;

  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'users';

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

  /**********************************************************/
  /***************** Relationships **************************/
  /**********************************************************/

  /**
  * Relationship
  */
  public function guias()
  {
    return $this->hasMany('App\Guia', 'id_usuario', 'id');
  }

  /**
  * Relationship
  */
  public function comentarios()
  {
    return $this->hasMany('App\Comentario', 'id_usuario', 'id');
  }

  /**
  * Relationship
  */
  public function voto_positivo()
  {
    return $this->hasMany('App\VotoPositivo', 'id_usuario', 'id');
  }

  /**
  * Relationship
  */
  public function guias_favoritas()
  {
    return $this->belongsToMany('App\Guia', 'voto_positivo', 'id_usuario', 'id_guia');
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
 * Send a password reset email to the user
 */
public function sendPasswordResetNotification($token)
{
    $this->notify(new MailResetPasswordToken($token));
}

  /**
  * Update the attributes of the model instance
  *
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
  * Get the number of relationships with guia
  *
  * @return integer
  */
  public function get_num_guias()
  {
    return $this->guias()->count();
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
  * Get the comentarios publicos of the model
  */
  public function get_comentarios_publicos()
  {
    $id_guias_publicas = \App\Guia::where('visibilidad', 'publica')->pluck('id')->toArray();

    return $this->hasMany('App\Comentario', 'id_usuario', 'id')->whereIn('id_guia', $id_guias_publicas);
  }
}
