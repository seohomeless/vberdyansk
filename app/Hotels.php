<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    public function houses()
    {
      return $this->belongsTo('App\Houses');
    }
}
