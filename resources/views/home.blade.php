
@extends('layouts.app')







@section('content')


	
	
	 
	
	   <script src="{{ asset('js/noUiSlider/nouislider.css') }}"></script>
	      <script src="{{ asset('js/noUiSlider/nouislider.js') }}"></script>
	
	
	
<div style="width: 100%; height: 45px; background: white; border-bottom: 1px solid silver; display: none;">
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





<div style="background: url('/img/index.png'); width: 100%; height: 400px; background-size: cover; background-position: center center; margin-bottom: 30px;">





<div style="font-size: 50px; color: white; margin: 0 auto; width: 850px; text-align: center; padding-top: 30px; padding-bottom: 20px; "><h2 style="font-size: 49px; color: white;  font-family: MyriadPro,sans-serif !important;  text-shadow: 1px 1px 1px #1e1e1e; padding-top: 30px;">
Аренда  {{ $countcvartir }}  объектов жилья   в Бердянске</h2>
<h2 style="Position: relative; top: -10px; font-size: 41px; color: white;  font-family: MyriadPro,sans-serif !important;  text-shadow: 1px 1px 1px #1e1e1e; padding-top: 3px; margin: 0px;">более <span style="color: #6ecf23;"> {{ $countotziv }}</span> реальных отзывов 
</h2></div>

<div id="filternagl">
<form action="/arenda" id="formaind"  method="GET">
<div>
<div style="float: left; padding-left: 25px;">
Район:   <select id="edit-field-rajon-tid" class="form-select" name="field_rajon_tid">
<option selected="selected"  value="All">- Все -</option>
<option value="7">АКЗ</option>
<option value="10">Бердянская коса</option>
<option value="11">Другой</option>
<option value="6">Лиски</option>
<option value="8">Слободка</option>
<option value="9">Третий пляж</option>
<option value="5">Центр</option>
</select>
</div>
<div style="float: left; padding-left: 35px;">
Вид жилья:  <select id="edit-field-vidrent-tid" class="form-select" name="field_vidrent_tid">
<option selected="selected" value="All">- Все -</option>
<option value="1">Базы отдыха</option>
<option value="4">Квартиры</option>
<option value="2">Отели и гостиницы</option>
<option value="3">Частный сектор</option>
</select>
 </div>
<div style="float: left; padding-left: 35px;"  id="cena1">
 Цена от:   <input   type="text"   name="field_cenaots_value"  id="fornin1"  />
  </div>  
<div style="float: left; padding-left: 12px;" id="cena2" >
 до   <input   type="text"   name="field_cenaots_value_1"  id="fornin2"  />
 </div>
 </div>
 <div style="float: left; padding-left: 25px;">
 <input   type="submit"   value="Найти" id="fornin" />
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

						   
<center><h2>Новое жилье на сайте</h2></center>

						   
					@foreach($housez as $housezs)
					<div class="rooms">
					
						<a href="{{$housezs->category}}/{{$housezs->id}}"><img src="/images/{{$housezs->prev_photo}}" style="width: 100%; height: 200px;" /></a>
						
						<div style="padding-top: 6px; position: relative; top: -30px; height: 0px; color: white; left: 10px; ">
						Мест:    /    Комнат:   /  Район: {{$housezs->rayon}}
							</div>
						
						
						<div style="padding: 5px;"><h3><a href="{{$housezs->category}}/{{$housezs->id}}">{{$housezs->title}}</a></h3>
						<div class="pri"><div class="pice">от {{$housezs->cenaot}} грн.</div></div><br>
						{!! str_limit($housezs->content, 230) !!}...
						
						<br></br>
						Автор: как передать
						<br>Оценка: как передать
						</div>
					</div>
					@endforeach
					
					
					<br></br>
</div>

<div style="width: 100%; height: 500px; background: #f1f1f1;">
<br><center><h2>Отзывы отдыхающих</h2></center>
<div style="width: 1300px; margin: 0 auto;">
	@foreach($frontotziv as $frontotzivs)
<div style="width: 48%; margin: 1%; float: left; height: 100px;  border-radius: 4px; padding: 10px; ">	{{$frontotzivs->id}} 
	<b>{{$frontotzivs->autor}} </b>
	<br>{{$frontotzivs->created_at}} 
	<br>{{$frontotzivs->content}} </div>
	@endforeach
	
</div>
</div>


<div style="max-width: 1300px; margin: 0 auto;">
<center><h2>Отдых в Бердянске</h2></center>

Бердянск по праву признан одним из лучших курортов Азовского побережья, ведь здесь созданы все условия для качественного и недорогого отдыха. Благоприятный климат, мелководное море и чистые песчаные пляжи, делают Бердянск идеальным местом для отдыха с детьми. Большое разнообразие вариантов для активного времяпровождения придется по душе молодым людям, а те, кто предпочитает спокойный и умиротворенный отдых вдали от суеты – смогут в полной мере насладиться ним в одном из уютных пансионатов или частных отелей. Кроме того, Бердянск и его окрестности считаются одним из самых экологически чистых и безопасных районов Украины. Бердянская коса признана заповедником государственного значения, ее природа охраняется законом. На косе расположено несколько соленых озер, которые по составу воды максимально приближены к Мертвому морю, а лечебные грязи лимана оказывают мощное терапевтическое воздействие на организм. Стоит отметить, что доступ к грязям абсолютно свободный, что дает возможность совместить отдых и оздоровление. Добавьте сюда развитую туристическую инфраструктуру, доступную стоимость на проживание и спокойную, безопасную обстановку и вы поймете почему все больше и больше людей ежегодно отдают предпочтение именно отдыху в Бердянске.

Получить исчерпывающие ответы по всем интересующим вас вопросам можно на страницах нашего информационного портала, где собрана наиболее полная и актуальная информация касательно жизни и отдыха в Бердянске.

<h2>Снять жилье в Бердянске 2017</h2>

Если вы планируете провести незабываемый отдых в Бердянске, но не можете определиться с жильем – воспользуйтесь предложениями, размещенными на нашем сайте. Здесь вы гарантировано найдете наиболее приемлемый вариант, ведь жилье в Бердянске представлено множеством различных вариантов: гостиницы и мини-отели, санатории, пансионаты, базы отдыха. Для тех, кто хочет снять жилье в частном секторе (дома, квартиры) – актуальные объявления от непосредственных владельцев жилья.

<h2>Город</h2>

В этом разделе собраны последние новости о жизни города и наиболее полная информация касательно культурно-развлекательных событий. В Бердянске ежегодно проводится большое количество фестивалей и концертов, на которые съезжаются участники и гости не только из Украины, но и ближнего зарубежья. В Бердянском художественном музее можно полюбоваться выставкой работ украинских художников, а краеведческий музей, который имеет три филиала – славится своей обширной коллекцией.

<h2>Развлечения в Бердянске</h2>

На нашем портале вы узнаете о лучших кинотеатрах, ресторанах, кафе, ночных клубах и дискотеках и саунах города. Мы собрали всю актуальную информацию, которая поможет провести незабываемый отдых в Бердянске. Этот город может предложить массу всевозможных предложения для интересного времяпровождения – это и частный зоопарк «Сафари», Чешский луна-парк с многочисленными аттракционами, водный парк «Мыс Доброй надежды», признанный одним из самых лучших на всем постсоветском пространстве. Множество развлечений ждет гостей города и на Приморской площади, набережной и центральном проспекте – катание велорикшах, велосипедах, пони, морские прогулки на катерах и многое-многое другое.

Кроме того, на нашем портале постоянно действуют такие полезные разделы как Места, блоги, фото в которых мы размещаем актуальную полезную информацию.

Мы знаем об отдыхе в Бердянске все и готовы поделиться этой информацией с вами!

</div>


@include('footer')
	
@endsection






