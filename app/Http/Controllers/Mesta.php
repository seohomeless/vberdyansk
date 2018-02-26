<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mestas;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as ImageInt;
use Illuminate\Contracts\Validation\Validator;

class Mesta extends Controller
{
      	public function index()
		{	
			$mestaarticle = Mestas::orderBy('created_at', 'desc')
				->paginate(10);

			return view('mesta')->with('mestaarticle', $mestaarticle);
		}



		public function addmesto(Request $request)
		{	
	
			$this->validate($request, [
				'title' => 'required|min:5',
				'content' => 'required|min:100',
			]);

			$addmesto = new Mestas;
			$addmesto->title = $request->title;
			
			
			if ($addmesto->alias == null) {
				$addmesto->alias = Str::slug($request->title);
			} else {
				$addmesto->alias = $request->alias;
			}

			$addmesto->content = $request->content;
		
			

			$path=$_SERVER['DOCUMENT_ROOT']."/images/";
			$filename=$request->file('prev_photo')->getClientOriginalName();
			$filename= str_random(10) . $filename;
			$image = $request->file('prev_photo');
				$img = ImageInt::make($image);
				$img->resizeCanvas(300, 200)->save($path . $filename);
					
			$addmesto->prev_photo = $filename;
			$addmesto->rubrika = $request->rubrika;;
			$addmesto->lat = $request->lat;;
			$addmesto->lng = $request->lng;;
			
			$addmesto->save();
			return redirect('/mesta');
		}
}
