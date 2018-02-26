<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	
	
	
    protected $fillable = [
      'id', 'title', 'content', 'cena', 'alias', 'rayon', 'mest', 'komnat', 'prev', 'lat', 'lng',
    ];
	
		public function room()
	  {
		    return $this->hasMany('App\ProductsPhoto');
	  }
	  
	  
	  
	  public function comments()
		{
		return $this->hasMany('App\Comments','article_id','id');
		}
			  
	  
}


