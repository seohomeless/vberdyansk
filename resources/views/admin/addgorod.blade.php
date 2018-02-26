@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
         {{ session('status') }}
        </div>
    @endif					   
<div >
					
<h1>Добавить о городе</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{action('Gorod@addgorod')}}" enctype="multipart/form-data" />
{{ csrf_field() }}
    Превью фото <br /><input type="file" name="prev_photo" class="btn " /><br /> 
    Заголовок:<br><input type="text" name="title"  class="form-control" /><br>
    Алиас:<br><input type="text" name="alias"  class="form-control" /><br>
    Основной текст: <br><textarea name="content"  class="form-control" id="editor1"></textarea><br>
    <br> <input type = 'submit' value = "Добавить"  class="btn btn-primary btn-lg active" />				
@if(Session::has('message'))
{{Session::get('message')}}
@endif
</form></div>
      
</div>				
@include('footer')				
					
             

<script>
    var editor = CKEDITOR.replace( 'editor1',{
             filebrowserBrowseUrl : '/elfinder/ckeditor' 
    } );
</script>
@endsection
