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


					<h1>Жилье</h1>
					<br>
					<table class="admintab">
<tr>
<th>Фото</th>
<th>Заголовок</th>
<th>Категория</th>
<th></th>
<th></th>
</tr>


					
					@foreach($houseshow as $houseshows)<tr>
					<td><img src="/images/{{$houseshows->prev_photo}}" style="width: 100px; height: auto;" /></td>
					<td>{{$houseshows->title}}</td>
					
					<td>{{$houseshows->category}}</a></td>
					
					
					<td><a href="room/{{$houseshows->id}}">изменить</a></td>
					<td>
						
					<form method="POST" action="/destroygorod/{{$houseshows->id}}">
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
