<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
  protected $fillable=['author','content','article_id','email','chisto','servic','cena'];
  
  
    public function commentphoto()
  {
    return $this->hasMany('App\Comments_photo', 'comments_id');
  }
  

  public function otvet2()
  {
    return $this->hasMany('App\Comments_otvet', 'comment_id');
  }
  
  
}
