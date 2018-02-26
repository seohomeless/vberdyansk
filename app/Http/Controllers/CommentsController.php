<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comments;
use App\Comments_otvet;
use App\Comments_photo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;



class CommentsController extends Controller
{
    public function save(Request $request, $id)
		{
			
		$this->validate($request, [
		'author' => 'required|max:100|min:5',
		'email' => 'required|email',
		'content'=>'required|min:3'
		]);


			$all=$request->all();//Получаем все данные из формы в массив
			$all['article_id']=$id;//Добавляем в массив id статьи
			
	
		$com =	Comments::create($all);//Сохраняем в базу
		

		if($request->filename != null) {
			foreach ($request->filename as $photos) {
						$filename = $photos->store('comphoto');
						 Comments_photo::create([
						'comments_id' => $com->id,
						'filename' => $filename
						]);
					}
				}
			
			
			
			return back()->with('message','Спасибо за комментарий.'); //редирект обратно к форме с сообщением
		}
		
		
		
		
	  public function savesotvets(Request $request)
		{
			DB::table('comments')
			->where('id', $request->comment_id)
			->update(['otvetest' => 1]);
	
			$commentsotvet = new Comments_otvet;
			$commentsotvet->comment_id = $request->comment_id;
			$commentsotvet->content = $request->contentotvet;

			$commentsotvet->save();
			
			return back()->withInput();
		}
}



