@extends('layouts.app')

@section('content')


<div class="container">
 
            
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

				<br/>		   
<a href="/gorod/create" class="add">+ Добавить о городе</a>


					<h1>Город</h1>
					<br>
					<table class="admintab">	   
					@foreach($goroded as $gorodeds)<tr>
					<td><img src="/images/{{$gorodeds->prev_photo}}" style="width: 100px; height: auto;" /></td>
					<td><a href="gorod/{{$gorodeds->alias}}">{{$gorodeds->title}}</a></td>
					<td><a href="room/{{$gorodeds->id}}">изменить</a></td>
					<td>
						
					<form method="POST" action="/destroygorod/{{$gorodeds->id}}">
					<input type="hidden" name="_method" value="delete"/>
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<input type="submit" value="Удалить"/>
					</form>
					
					
					</td></tr>
					
					@endforeach
					</table>	  
					
					
             
</div>

@include('footer')
@endsection
