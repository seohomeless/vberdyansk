<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments_photo extends Model
{
    protected $fillable=['comments_id','filename'];
	
	public function com() {
		return $this->hasMany('App\Comments','id');
		}
}
