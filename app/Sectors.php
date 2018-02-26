<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sectors extends Model
{
    public function houses()
    {
      return $this->belongsTo('App\Houses');
    }
}
