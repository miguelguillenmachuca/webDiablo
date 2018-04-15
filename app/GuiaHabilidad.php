<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GuiaHabilidad extends Pivot
{
  /**
  * Relationship
  */
  protected function runa()
  {
    return $this->belongsTo('App\Runa', 'id_runa', 'id');
  }
}
