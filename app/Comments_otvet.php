<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments_otvet extends Model
{
    protected $fillable=['comment_id','content'];
  
    public function otvet() {
		return $this->hasMany('App\Comments', 'comment_id');
		}
}
