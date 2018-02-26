<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gorods;
use App\Room;
use App\Photo;
use App\Mestas;
use App\Houses;
use App\Comments;
use DB;

class AdminController extends Controller
{
	
	
	public function soderzhimoe()
			{	
				$goroded = Gorods::orderBy('created_at', 'desc')
				->paginate(100);
		
				return view('admin.soderzhimoe')->with('goroded', $goroded);
			}


			
	public function photoshow()
			{	
				$photoshow = Gorods::orderBy('created_at', 'desc')
				->paginate(100);
		
				return view('admin.photoshow')->with('photoshow', $photoshow);
			}
	
	public function houseshow()
			{	
				$houseshow = Houses::orderBy('created_at', 'desc')
				->paginate(100);
		
				return view('admin.house')->with('houseshow', $houseshow);
			}

			
			
	public function mestashow()
			{	
				$mestashow = Mestas::orderBy('created_at', 'desc')
				->paginate(100);
		
				return view('admin.mestashow')->with('mestashow', $mestashow);
			}
			
			
	public function destroygorod($id)
			{
				$category=Gorods::find($id); 
				$category->delete();
				return redirect('/soderzhimoe');
			}		
			
	public function destroymesta($id)
			{
				$category=Mestas::find($id); 
				$category->delete();
				return redirect('/mestashow');
			}		
			


			
	public function otzivi() {	
				$otzivi = Comments::orderBy('created_at', 'desc')
				->paginate(100);
		
				return view('admin.otzivi')->with('otzivi', $otzivi);
			}
			
			
	public function users() {	
				$users = DB::table('users')
				->get();
		
				return view('admin.user')->with('users', $users);
			}
	
	public function oplati() {	
				$users = DB::table('users')
				->get();
		
				return view('admin.oplati')->with('users', $users);
			}
	
	
	public function gorodadd() {	
				return view('admin.addgorod');
			}
	
	
	public function mestaadd() {	
				return view('admin.addmesto');
			}
			
			
	public function photoadd() {	
				return view('admin.addphoto');
			}
	
}
