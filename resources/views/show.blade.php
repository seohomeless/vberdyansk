 @extends('layouts.app')

 

 
 
 
@section('content')


	

	
	  <div class="owl-carousel owl-theme">
	  	  @foreach($photoshow as $photoshow)
		<div class="item"> 
		  <img src="/app/{{$photoshow->filename}}" style="height: 450px;" />
		</div>				
			@endforeach
       </div>
          


<script type="text/javascript">
<!--
function viewdiv(id){
var el=document.getElementById(id);
if(el.style.display=="block"){
el.style.display="none";
} else {
el.style.display="block";
}
}
//-->
</script>












<div class="container">
    <div class="row">
	
	
	<div class="col-md-4 col-md-offset-0" style="float: left;">
	 <div class="panel panel-default" style="padding: 12px;">

	
	 @if(!empty($uzers->id))
		
	<center>
	 @if(!empty($uzers->avatar))
									<img src="/app/{{ $uzers->avatar }}" style="width: 200px; height: 200px; border-radius: 200px;">
			 @endif		
			 
			 
		<h2>{{ $uzers->name }}</h2>
		 @if(!empty($uzers->osebe))
			 <h4>О себе</h4>{{ $uzers->osebe }} 
		 @endif	
		 @if(!empty($uzers->phone))
					<h4>Телефон</h4>
				{{ $uzers->phone }}
		@endif		
				
				@else 
					
				Автора квартиры нет
		
	</center>
				 @endif		
						
						
						
	 </div> </div>
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                
                <div class="panel-body">
				
				<div style="width: 65%; float: left;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

						            
	
									
					
						
						<h1>{{ $roomd->title }}</h1>
			
						{{ $roomd->content }}

						
				
						<div id="map_canvas" style="width:100%; height:300px; margin-top: 20px;"></div>

                </div>
				
				
				<div style="width: 35%; float: left;">
				 <div style="padding-left: 30px; padding-top: 20px;">
				 @if($schetcomments > 1)

	<div style="margin-bottom: 20px;">	<strong>	<div class="pice">Цена: <span style="font-size: 25px">{{ $roomd->cena }}</span> грн.</div>
							<div class="pice" style=" border-top: 1px solid #dadada;">Район: {{ $roomd->rayon }} </div>
								<div class="pice"  style=" border-top: 1px solid #dadada;">Комнат: {{ $roomd->komnat }} </div>
								<div class="pice"  style=" border-bottom: 1px solid #dadada; border-top: 1px solid #dadada;">Мест: {{ $roomd->mest }} </div></strong>

	</div>	
<img src="/img/ret.png" style="float: left; padding-right: 10px; padding-bottom: 50px;">

	<p style="padding-top: 10px;">	 Всего отзывов: {{ $schetcomments }}<br>
<font color="green">
	<br>Сервис:  {{ $sservis2 }} из 5
	<br>Чистота:  {{ $schisto2 }}  из 5
	<br>Цена: {{ $scena2 }}  из 5</font>
		 
	@else 
					
				Отзывов пока нет!
		
	</center>
				 @endif		
				
				  </div>
				  
				  
				   </div>
            </div>
			
		
    </div>
			
			
			
        </div>
    </div>
	

	 <div class="panel panel-default" style="padding: 0px; background-color: inherit !important;  box-shadow: 0 0px 0px rgba(0, 0, 0, 0);
    border: 0 none;
    padding: 0;">
	 
	
	 
		  
	 <h2>Отзывы:</h2>
		<div class="comments">
				
			@foreach($comments as $comment)
					<div class="comer">
					<div style="width: 100px; float: left;"><b>Сервис: {{$comment->servic}}</div>
					<div style="width: 110px; float: left;">Чистота: {{$comment->chisto}}</div>
					<div style="width: 100px; float: left;">Цена: {{$comment->cena}}</b></div>
					<br></br>
					Автор: {{$comment->author}}
					<br>Отзыв:<br>{{$comment->content}}
					

					<br></br>
					@foreach ($comment->commentphoto as $com)	  
						<a href="/app/{{$com->filename}}" class="colorbox"><img  src="/app/{{$com->filename}}" style="width: 50px; height: 50px;" /></a>
					@endforeach
					</div>
		
		
					@if(!empty($uzers->id))						
							@if (Auth::user()->id == $roomd->user_id)
									<form method="POST" action="/room/save/jjj">
									Ваш ответ:<br>
									<textarea name="content2"  style="width: 490px; height: 118px;" required></textarea><br>
									<input type="hidden" name="_token" value="{{csrf_token()}}"/>

									<input type="submit" value="Добавить ответ" class="btn btn-primary btn-lg active" 
									</form>
							@endif				
					@endif				 
												
				
						@endforeach
			</div>
			
		
		<p><a href="{!! route('socialite.auth', 'github') !!}">Github</a>

<a href="{!! route('socialite.auth', 'google') !!}">Google</a>
 
                 <a href="{!! route('socialite.auth', 'facebook') !!}">Facebook</a>
					 
					 
					                  <a href="{!! route('socialite.auth', 'twitter') !!}">Twitter</a></p>
										 
										 
										 
	
			@if($roomd->comments_enable==1)
			@include('comment')
			@endif
	 </div>
	 
</div></div></div>



	@include('footer')
	
	
@endsection



	
	
