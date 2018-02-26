@extends('layouts.app')

@section('content')


<link href="https://refreshless.com/nouislider/distribute/nouislider.css?v=1100" rel="stylesheet">

	
	
	
	
	   <script src="{{ asset('js/noUiSlider/nouislider.css') }}"></script>
	      <script src="{{ asset('js/noUiSlider/nouislider.js') }}"></script>
	
	
	
<div style="width: 100%; height: 45px; background: white; border-bottom: 1px solid silver;">
<div style="max-width: 1250px; margin: 0 auto;" id="formtop">
<form action="/poisk" method="GET">
<div style="clear: both; height: 75px; padding-top: 12px;">

<div style="width: 60px; float: left;">
Район:
</div>
<div style="width: 130px; float: left;">
<select style="width: 100px" name="rayon">
<option value="центр">Центр</option>
	<option value="лиски">Лиски</option>
	<option value="азмол">Азмол</option>
	<option value="акз">АКЗ</option>
	<option value="гора">Гора</option>
	<option value="слободка">Слободка</option>
</select>
</div>


<div style="width: 60px; float: left;">
Комнат:
</div>


<div style="width: 130px; float: left;">

<select style="width: 100px" name="komnat">
<option value="1">1 ком.</option>
	<option value="2">2 ком.</option>
	<option value="3">3 ком.</option>
	<option value="4">4 ком.</option>
</select>
</div>


<div style="width: 60px; float: left;">
Мест:
</div>



<div style="width: 130px; float: left;">

<select style="width: 100px" name="mest">
<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
</select>
</div>

<div style="width: 60px; float: left;">
Цена:
</div>







<div style="width: 80px; float: left; margin-right: 30px;"><input id="input-select" name="price_one">
</div>
<div style="width:200px; float: left; margin-right: 30px;">


<div id="html5" class="noUi-target noUi-ltr noUi-horizontal">
<div class="noUi-connect" style="transform: translate(3.04878%, 0px) scale(0.969512, 1);"></div>
</div>

</div>

<div style="width: 80px; float: left; margin-right:40px;"><input id="input-number" name="price_twho">
</div>

<script>

var select = document.getElementById('input-select');

// Append the option elements
for ( var i = 0; i <= {{ $maxprice }}; i++ ){

	var option = document.createElement("option");
		option.text = i;
		option.value = i;

	select.appendChild(option);
}
</script>
<script>

var html5Slider = document.getElementById('html5');

noUiSlider.create(html5Slider, {
	start: [ 0, {{ $maxprice }} ],
	connect: true,
	range: {
		'min': 0,
		'max': {{ $maxprice }}
	}
});
</script>
<script>

var inputNumber = document.getElementById('input-number');

html5Slider.noUiSlider.on('update', function( values, handle ) {

	var value = values[handle];

	if ( handle ) {
		inputNumber.value = value;
	} else {
		select.value = Math.round(value);
	}
});

select.addEventListener('change', function(){
	html5Slider.noUiSlider.set([this.value, null]);
});

inputNumber.addEventListener('change', function(){
	html5Slider.noUiSlider.set([null, this.value]);
});
</script>


















<div style="width: 100px; float: left;" id="poisk">
<input type="submit" value="Поиск квартиры">
</div>
</div>
</form>

</div>


</div>








<div class="container">
 
            
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

						   


						   
					@foreach($rooms as $room)
					<div class="rooms">
					
											            

					
					
					
					
						<a href="room/{{$room->id}}"><img src="/images/{{$room->prev}}" style="width: 100%; height: 200px;" /></a>
						
						<div style="padding-top: 6px; position: relative; top: -30px; height: 0px; color: white; left: 10px; ">
						Мест: {{$room->mest}}   /    Комнат:  {{$room->komnat}}   /  Район: {{$room->rayon}}
							</div>
						
						
						<div style="padding: 5px;"><h3><a href="room/{{$room->id}}">{{$room->title}}</a></h3>
						<div class="pri"><div class="pice">{{$room->cena}} грн.</div></div><br>
						{!! str_limit($room->content, 230) !!}...
						
						<br></br>
						Автор: как передать
						</div>
					</div>
					@endforeach
					
					
					<div style="clear: both ; display: table;    margin: 0 auto;">{{ $rooms->links() }}</div>
             
</div>@include('footer')
	

@endsection
