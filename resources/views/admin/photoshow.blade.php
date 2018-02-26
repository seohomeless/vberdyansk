@extends('layouts.app')

@section('content')


<div class="container">
 
            
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

				<br/>		   
<a href="/photo/create" class="add">+ Добавить фото</a>


					<h1>Фото</h1>
					<br>
					<table class="admintab">	   
					@foreach($photoshow as $photoshows)<tr>
					<td><img src="/images/{{$photoshows->prev_photo}}" style="width: 100px; height: auto;" /></td>
					<td><a href="gorod/{{$photoshows->alias}}">{{$photoshows->title}}</a></td>
					<td><a href="room/{{$photoshows->id}}">изменить</a></td>
					<td>
						
					<form method="POST" action="/destroygorod/{{$photoshows->id}}">
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
