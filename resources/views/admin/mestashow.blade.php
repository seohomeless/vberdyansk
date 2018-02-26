@extends('layouts.app')

@section('content')


<div class="container">
 
            
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

				<br/>		   
<a href="/mesto/create" class="add">+ Добавить место</a>


					<h1>Места</h1>
					<br>
					<table class="admintab">	   
					@foreach($mestashow as $mestashows)<tr>
					<td><img src="/images/{{$mestashows->prev_photo}}" style="width: 100px; height: auto;" /></td>
					<td><a href="gorod/{{$mestashows->alias}}">{{$mestashows->title}}</a></td>
					<td><a href="room/{{$mestashows->id}}">изменить</a></td>
					<td>
						
					<form method="POST" action="/destroymesta/{{$mestashows->id}}">
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
