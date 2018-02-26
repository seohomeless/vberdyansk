<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Photo extends Controller
{
       	public function index()
		{	
			$rooms = 1;
			return view('photo')->with('rooms', $rooms);
		}
}
