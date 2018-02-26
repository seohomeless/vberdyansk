<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    public function hotels()
    {
      return $this->hasOne('App\Hotels', 'houses_id');
    }

    public function sectors()
    {
      return $this->hasOne('App\Sectors', 'houses_id');
    }

    public function kvarti()
    {
      return $this->hasOne('App\Kvartirs', 'houses_id');
    }

    public function comments()
		{
		return $this->hasMany('App\Comments','article_id','id');
		}
			 
}
