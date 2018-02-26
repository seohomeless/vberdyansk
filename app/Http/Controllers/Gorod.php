<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gorods;
use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Validator;
use Intervention\Image\Facades\Image as ImageInt;



class Gorod extends Controller
{
   	public function index()
		{	
			$gorodarticle = Gorods::orderBy('created_at', 'desc')
				->paginate(10);

			
			return view('gorod')->with('gorodarticle', $gorodarticle);
		}
	
	
	public function showgorod($alias)
		{	
			
			$gorodshow =  Gorods::where('alias', $alias)->firstOrFail();
			return view('showgorod')->with('gorodshow', $gorodshow);
		}


	public function addgorod(Request $request)
		{	
	
		$this->validate($request, [
			'title' => 'required|min:5',
			'content' => 'required|min:100',
		]);

		$gorods = new Gorods;
		$gorods->title = $request->title;
		
		
		if ($gorods->alias == null) {
				$gorods->alias = Str::slug($request->title);
			} else {
				$gorods->alias = $request->alias;
		}
			

		$gorods->content = $request->content;
		$description = strip_tags($gorods->content);
		$gorods->description = str_limit($description, 150);
		

		$path=$_SERVER['DOCUMENT_ROOT']."/images/";
		$filename=$request->file('prev_photo')->getClientOriginalName();
		$filename= str_random(10) . $filename;
		$image = $request->file('prev_photo');
			$img = ImageInt::make($image);
      		$img->resizeCanvas(300, 200)->save($path . $filename);
				
		$gorods->prev_photo = $filename;
		
		
		$gorods->save();
		return redirect('/gorod');
		}

}
