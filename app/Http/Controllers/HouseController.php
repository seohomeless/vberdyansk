<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Room;
use App\Houses;
use App\Comments;

class HouseController extends Controller
{
    public function index()
    {	
        $countcvartir = DB::table('houses')->count();
            
        $maxprice = DB::table('rooms')->max('cena');
         
        $rooms = Room::where('public', 1)
        ->orderBy('id', 'desc')
        ->take(8)
       ->get();

        $countotziv = DB::table('comments')->count();

        $frontotziv = Comments::take(6)
       ->get();


       $housez = Houses::orderBy('created_at', 'desc')
                   ->take(8)
                   ->get();
      

        // Получение значений один ко многим!		
        // $photoshow2 = ProductsPhoto::find(41);
        // echo $photoshow2->product->title;

        return view('home')->with('rooms', $rooms)->with('maxprice', $maxprice)->with('countcvartir', $countcvartir)->with('countotziv', $countotziv)->with('frontotziv', $frontotziv)->with('housez', $housez);
    }

}
