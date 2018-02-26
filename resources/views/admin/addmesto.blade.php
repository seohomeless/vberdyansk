@extends('layouts.app')

@section('content')


<div class="container">
 
            
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

						   


						<div >
					
					<h1>Добавить место</h1>
					
					
					<form method="POST" action="/mesta/add" enctype="multipart/form-data" />
  {{ csrf_field() }}
  
	Превью фото <br />
    <input type="file" name="prev_photo" class="btn " />
    <br /><br />



       
Заголовок:<br><input type="text" name="title"  class="form-control" /><br>
Алиас:<br><input type="text" name="alias"  class="form-control" /><br>
Рубрика:<br>
<select name="rubrika">
    <option value="Кафе и рестораны">Кафе и рестораны</option>
    <option value="Бильярд">Бильярд</option>
    <option value="Боулинг">Боулинг</option>
    <option value="Кинотеатры">Кинотеатры</option>
    <option value="Клубы">Клубы</option>
    <option value="Салоны красоты">Салоны красоты</option>
    <option value="Бани и сауны">Бани и сауны</option>
    <option value="Тренажерный зал">Тренажерный зал</option>
    <option value="Торговые центры">Торговые центры</option>
    <option value="Что посмотреть">Что посмотреть</option>
    <option value="Музеи">Музеи</option>
    <option value="Парки">Парки</option>
    <option value="Пляжи">Пляжи</option>
</select>


<br><br/>
Основной текст: <br><textarea name="content"  class="form-control" id="editor1"></textarea><br>
lat:<br><input type="text" name="lat"  class="form-control" /><br>
lng:<br><input type="text" name="lng"  class="form-control" /><br>

<br> <input type = 'submit' value = "Добавить"  class="btn btn-primary btn-lg active" />
					
@if(Session::has('message'))
{{Session::get('message')}}
@endif
</form></div>
      
				
	</div>				
	@include('footer')				
					
             
 <script>
        var editor = CKEDITOR.replace( 'editor1' );
</script>
					
					
					
					</div>
					
					
             
</div>

@endsection
