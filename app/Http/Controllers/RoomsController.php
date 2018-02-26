<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role; 
use App\Room;
use App\Photo;
use App\User;
use App\Comments_photo;
use App\Comments;
use App\ProductsPhoto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class RoomsController extends Controller
{
	
		    public function kvartiri(Request $request)
			{
				$maxprice = DB::table('rooms')->max('cena');
				
				$rayon=$request->rayon;
				$mest=$request->mest;
				$komnat=$request->komnat;
				$price_one=$request->price_one;
				$price_twho=$request->price_twho;
			
				$rooms = Room::orderBy('id', 'desc')
				->Paginate(8);
		
				return view('kvartiri')->with('rooms', $rooms)->with('maxprice', $maxprice)->with('rayon', $rayon);
			}
			
			
			
	
	    public function poisk(Request $request)
			{
				$maxprice = DB::table('rooms')->max('cena');
				
				$rayon=$request->rayon;
				$mest=$request->mest;
				$komnat=$request->komnat;
				$price_one=$request->price_one;
				$price_twho=$request->price_twho;
			
				$rooms = Room::where('rayon', $rayon)->where('mest', $mest)->where('komnat', $komnat)->whereBetween('cena', array($price_one, $price_twho))
				->orderBy('id', 'desc')
				->Paginate(8);
		
				return view('poisk')->with('rooms', $rooms)->with('maxprice', $maxprice)->with('rayon', $rayon);
			}
	
		
		
	
		
	
	
	
		
		public function vashezhile()
			{	
			
				$roomss = Room::where('user_id', Auth::user()->id)
				->orderBy('id', 'desc')
				->take(80)
               ->get();
              
		
				
				return view('vashezhile')->with('roomss', $roomss);
			}
	
	
	
	
	
	
	
	
	
	
		public function create() 
			{
				return view('add');
			}	
	
	
	
	
	
		public function show($id)
			{
		
					
			$metki =  Room::where('id', $id)->get();
		    $config = array();
			$config['center'] = '47.87750026, 35.05304967';
			$config['zoom'] = '15';
			app('map')->initialize($config);

			
			foreach ($metki as $value) {	
				$marker = array();
				$marker['position'] = "$value->lat, $value->lng";
				$marker['infowindow_content'] = $value->title;
				app('map')->add_marker($marker);
			}
			
			$map = app('map')->create_map();
		
	
		
			echo "<html><head><script type=text/javascript>var centreGot = false;</script>".$map['js']."</head>";
	

			$schetcomments=Room::find($id)->comments->count();
				
			if ($schetcomments > 0) {
					$schetcomments=Room::find($id)->comments->count();
				
				}
				else {
					$schetcomments=0.1;
				}
				
				
				// Для подсчета оценок отзывов

				$schetchisto = Room::find($id)->comments->sum('chisto');
				$schetservis = Room::find($id)->comments->sum('servic');
				$schetcena = Room::find($id)->comments->sum('cena');
				

				
			
				$schisto = 1;
				$sservis =1;
				$scena = 1;
				
				
				
				
				$schisto = $schetchisto / $schetcomments;
				$sservis = $schetservis / $schetcomments;
				$scena = $schetcena / $schetcomments;
				
				
				$schisto2 = round($schisto, 2);
				$sservis2 = round($sservis, 2);
				$scena2 = round($scena, 2);
				
					
			
			
			
				$comments=Room::where('public','=',1)->find($id)->comments; // выбираем все комментарии, который относятся к статье

				$roomd = Room::where('id', '=', $id)->firstOrFail();
				
				$photoshow = ProductsPhoto::where('product_id', '=', $id)->get();
		

				if ($roomd->user_id > 0) {
					$uzers = User::where('id', '=', $roomd->user_id)->firstOrFail();
				}
				else {
					$uzers = "автора нет";
				}
				
			
				$commentsp = 1;
				
				
				return view('show')->with('roomd', $roomd)->with('photoshow', $photoshow)->with('uzers', $uzers)->with('comments', $comments)->with('commentsp', $commentsp)->with('schisto2', $schisto2)->with('sservis2', $sservis2)->with('scena2', $scena2)->with('schetcomments', $schetcomments);
	
			} 
			
		public function store(Request $request)
			{	
				$userslogin = 0;	
				if (Auth::check()) {		
						$userslogin =  Auth::user()->id;
				}
						
			// Загрузка превьюшек
						
					$root=$_SERVER['DOCUMENT_ROOT']."/images/"; // это корневая папка для загрузки картинок
					$prev=$request->file('prev')->getClientOriginalName();//определяем имя файла
					$request->file('prev')->move($root,$prev); 


					$product = Room::create($request->all());
		
					DB::table('rooms')
					->where('id', $product->id)
					->update(['prev' => $prev, 'user_id' => $userslogin]);

					// Продукт айди тащит с запроса сверху

					foreach ($request->photos as $photo) {
						$filename = $photo->store('photos');
						 ProductsPhoto::create([
						'product_id' => $product->id,
						'filename' => $filename
						]);
					}

		
			return redirect('/room');
		}
		
}
