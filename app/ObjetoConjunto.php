<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class ObjetoConjunto extends Model
{
    use SoftDeletes;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'conjunto';

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
      'id_objeto', 'id_conjunto',
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
    public function objeto()
    {
      return $this->belongsTo('App\Objeto', 'id_conjunto', 'id');
    }

    /**
    * Relationship
    */
    public function conjunto()
    {
      return $this->belongsTo('App\Conjunto', 'id_conjunto', 'id');
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