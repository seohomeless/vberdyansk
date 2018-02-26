	 <h2>Отзывы:</h2>
		<div class="comments">
				
			@foreach($comments as $comment)
					<div class="comer">
					<div style="width: 100px; float: left;"><b>Сервис: {{$comment->servic}}</div>
					<div style="width: 110px; float: left;">Чистота: {{$comment->chisto}}</div>
					<div style="width: 100px; float: left;">Цена: {{$comment->cena}}</b></div>
					<br></br>
					<b>Автор:</b> {{$comment->author}}<br>
					<b>Добавленно:</b>  {{$comment->created_at}}
					
					<br><b>Отзыв:</b><br>{{$comment->content}}
					
					<br/>

					
					
					@foreach ($comment->commentphoto as $com)	  
						
					<a href="/app/{{$com->filename}}" class="colorbox"><img  src="/app/{{$com->filename}}" style="width: 100px; height: 80px; padding-top: 10px; " /></a>
					@endforeach
					
					@foreach ($comment->otvet2 as $otvet)	
					
					<div style="clear: both; padding: 10px; margin-top: 20px; background: green; color: white; border: 1px solid green">
					<b>Овет хозяина:</b><br>
						  
						{{$otvet->content}}
						
					</div>
				@endforeach
					
				
				
				@guest					
					@else




				@if ($comment->otvetest == 1)
				  <br>
						@elseif (Auth::user()->id == $houseshow->autor_id)	<br/>	<br/>
						  <form method="POST" action="/save-otvet/fgdfh/dfgdfg/fghdfgh" enctype="multipart/form-data" />
															<input type="hidden" name="_token" value="{{ csrf_token() }}" >
									Ваш ответ:<br>
									
									<input value="{{$comment->id}}" class="form-control"  name="comment_id" style="display: none;"  />
									  
									<textarea name="contentotvet"  style="width: 490px; height: 118px;" required></textarea><br>
									<input type="submit" value="Добавить ответ" class="btn btn-primary btn-lg active" />
									</form>
						@else
						  Здесь нет записей!
						@endif


						
					@endguest								
				 </div>
				@endforeach
	</div>
<p><a href="{!! route('socialite.auth', 'github') !!}">Github</a>

<a href="{!! route('socialite.auth', 'google') !!}">Google</a>
 
                 <a href="{!! route('socialite.auth', 'facebook') !!}">Facebook</a>
					 
					 
					                  <a href="{!! route('socialite.auth', 'twitter') !!}">Twitter</a></p>
										 