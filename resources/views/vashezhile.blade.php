@extends('layouts.app')

@section('content')


<div class="container">
 
            
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

						   


						   
					@foreach($roomss as $room)
					<div class="rooms">
					
											            

					
					
					
					
						<a href="room/{{$room->id}}"><img src="/images/{{$room->prev}}" style="width: 100%; height: 200px;" /></a>
						
						<div style="padding-top: 6px; position: relative; top: -30px; height: 0px; color: white; left: 10px; ">
						Мест: {{$room->mest}}   /    Комнат:  {{$room->komnat}}   /  Район: {{$room->rayon}}
							</div>
						
						
						<div style="padding: 5px;"><h3><a href="room/{{$room->id}}">{{$room->title}}</a></h3>
						<div class="pri"><div class="pice">{{$room->cena}} грн.</div></div><br>
						{!! str_limit($room->content, 230) !!}...
						
						<br></br>
						<a href="#">Поднять жилье</a>
						
						<br>
						<a href="#">Закрепить жилье</a>
						</div>
					</div>
					@endforeach
					
					
					
             
</div>

@endsection
