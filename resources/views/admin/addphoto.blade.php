@extends('layouts.app')

@section('content')


<div class="container">
 
            
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

						   


				<div >
					
					<h1>Добавить фото</h1>
					
					
					
					
					<form method="POST" action="{{action('RoomsController@store')}}" enctype="multipart/form-data" />
  {{ csrf_field() }}
  
	Превью фото <br />
    <input type="file" name="prev" class="btn " />
    <br /><br />
  Фото квартиры
    <br />
    <input type="file" name="photos[]" class="btn " multiple  />
    <br /><br />
	
Описание альбома: <br><textarea name="content"  class="form-control" id="editor1"></textarea><br>

<br> <input type = 'submit' value = "Добавить"  class="btn btn-primary btn-lg active" />
					
@if(Session::has('message'))
{{Session::get('message')}}
@endif
</form>
					
					</div>
					
					
             
</div>	@include('footer')

@endsection
