<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mestas extends Model
{

    protected $fillable = ['title', 'prev_photo', 'rubrika', 'alias', 'content', 'lat', 'lng'];
}
