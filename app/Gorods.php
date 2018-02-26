<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gorods extends Model
{
    
    protected $fillable = ['title', 'prev_photo', 'content', 'alias', 'description'];

}
