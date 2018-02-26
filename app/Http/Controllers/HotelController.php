<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotels;
use App\Houses;
use App\Comments;
use App\Hotelroom;
use Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as ImageInt;
use Illuminate\Contracts\Validation\Validator;


class HotelController extends Controller
{

    public function index()
    {
        $house = Houses::orderBy('created_at', 'desc')
                ->where('category', 'hotels')
                ->paginate(10);
       
        return view('hotels')->with('house', $house);    
    }

    public function create()
    {
        return view('addhotels'); 
    }

    public function store(Request $request)
    {
        $addhouse = new Houses;

        $addhouse->title = $request->title;
        
        $addhouse->category = $request->category;
        $addhouse->rayon = $request->rayon;
        $addhouse->category = "hotels";
        $addhouse->cenaot = $request->cenaot;
        $addhouse->autor_id = Auth::user()->id;
        $addhouse->lat = $request->lat;
        $addhouse->lng = $request->lng;


        $path=$_SERVER['DOCUMENT_ROOT']."/images/";
		$filename=$request->file('prev_photo')->getClientOriginalName();
		$filename= str_random(10) . $filename;
		$image = $request->file('prev_photo');
			$img = ImageInt::make($image);
      		$img->resizeCanvas(300, 200)->save($path . $filename);
            $addhouse->prev_photo = $filename;   

        $addhouse->save();

        $addmesto = new Hotels;
        
        $addmesto->houses_id = $addhouse->id;
		$addmesto->content = $request->content;
		
        $addmesto->save();


        $nomer = new Hotelroom;
        
        $nomer->hotels_id = $hotels->id;
		$nomer->content = $request->opisnomer;
        $nomer->title = $request->titlenomer;
        $nomer->price = $request->pricenomer;
     
        $addmesto->save();
        

     
    }

    public function show($id)
    {


        $metki =  Houses::where('id', $id)->get();
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
	

        $schetcomments=Houses::find($id)->comments->count();
				
			if ($schetcomments > 0) {
					$schetcomments=Houses::find($id)->comments->count();
				
				}
				else {
					$schetcomments=0.1;
				}
				
				
				// Для подсчета оценок отзывов

				$schetchisto = Houses::find($id)->comments->sum('chisto');
				$schetservis = Houses::find($id)->comments->sum('servic');
				$schetcena = Houses::find($id)->comments->sum('cena');
				

				
			
				$schisto = 1;
				$sservis =1;
				$scena = 1;
				
				
				
				
				$schisto = $schetchisto / $schetcomments;
				$sservis = $schetservis / $schetcomments;
				$scena = $schetcena / $schetcomments;
				
				
				$schisto2 = round($schisto, 2);
				$sservis2 = round($sservis, 2);
				$scena2 = round($scena, 2);









        $houseshow = Houses::where('id', $id)
                ->firstOrFail();
                
         $comments=Comments::where('article_id', $id)->get();  
              
        return view('hotelsshow')->with('houseshow', $houseshow)->with('comments', $comments)->with('schisto2', $schisto2)->with('sservis2', $sservis2)->with('scena2', $scena2)->with('schetcomments', $schetcomments);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
