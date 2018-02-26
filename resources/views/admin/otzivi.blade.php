@extends('layouts.app')

@section('content')


<div class="container">
 
            
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

						   
					<h1>Отзывы на сайте</h1>
					<br>

						   
					@foreach($otzivi as $otzivis)
					<div class="">
					
									
					


						<a href="room/{{$otzivis->article_id}}">Псмотреть</a>
						<br>{{$otzivis->created_at}}
						<br>{{$otzivis->content}}
					<hr>
						</div>
					
					@endforeach
					
					
					
             
</div>

@endsection
