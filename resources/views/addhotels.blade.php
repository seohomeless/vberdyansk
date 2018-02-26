	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="{{ asset('/js/ckeditor/ckeditor.js') }}" type="text/javascript" charset="utf-8" ></script>
	    	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

 <script  type="text/javascript" charset="utf-8" >
(function($){				
    jQuery.fn.lightTabs = function(options){
        
        var createTabs = function(){
            tabs = this;
            i = 0;
            
            showPage = function(i){
                $(tabs).children("div").children("div").hide();
                $(tabs).children("div").children("div").eq(i).show();
                $(tabs).children("ul").children("li").removeClass("active");
                $(tabs).children("ul").children("li").eq(i).addClass("active");
            }
            
            showPage(0);				
            
            $(tabs).children("ul").children("li").each(function(index, element){
                $(element).attr("data-page", i);
                i++;                        
            });
            
            $(tabs).children("ul").children("li").click(function(){
                showPage(parseInt($(this).attr("data-page")));
            });				
        };		
        return this.each(createTabs);
    };	
})(jQuery);
$(document).ready(function(){
    $(".tabs").lightTabs();
});
</script>
	

	<div style="max-width: 1300px; margin: 0 auto; height: 100px;">
	
	<div style="width: 400px; float: left;">
		<a class="navbar-brand" href="http://vberdyansk.local">
<img src="/img/logo.png" style="position: relative; top: -9px;">
</a>
	</div>

	<div style="width: 800px; float: left;">
	<div style="padding-top: 50px; font-size: 28px; padding-left: 14px;">Разместите объявление. <b>Это бесплатно</b>
	
	</div>
	</div>
	</div>	
	

<br></br><br>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<div class="container" style="width: 1300px!important; margin: 0 auto;">

  @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

	
	


<div class="dobs" style="border-radius: 5px; padding: 20px; margin: 30px;">
<div style="width: 1100px;">


<div style="float: left; width: 260px;">
<span class="highlight">Шаг 1</span>
<p style="padding-top: 10px;">Выберите что вы сдаете - </p>


<div style="padding-top: 120px;">
<span class="highlight">Шаг 2</span>
<p style="padding-top: 10px;">Заполните поля - </p>


</div>
</div>
		<div class="tabs">
    <ul class="kva2">
        <a href="/kvartiri/create"><li class="kva">
		
		<img src="/img/f1.png"><br>
		Добавить квартиру</li></a>
        <li class="kva active"><img src="/img/f3.png"><br>Добавить отель или гостиницу</li>
        <a href="/sector/create"><li class="kva"><img src="/img/f4.png"><br>Добавить частный сектор</li></a>
    </ul>
    <div>
        <div>
		
<div><h1>Добавить отель</h1><form method="POST" action="{{action('HotelController@store')}}" enctype="multipart/form-data" />
  {{ csrf_field() }}
  
	Превью фото <br />
    <input type="file" name="prev_photo" class="btn " />
    <br /><br />
  Фото отеля, территории
    <br />
    <input type="file" name="photos[]" class="btn " multiple  />
    <br /><br />
	


       
Название:<br><input type="text" name="title"  class="form-control" /><br>

Цена от:<br><input type="text" name="cenaot"  class="form-control" /><br>
	
Район:<br>	<select class="form-control" name="rayon">
	<option value="центр">Центр</option>
	<option value="лиски">Лиски</option>
	<option value="азмол">Азмол</option>
	<option value="акз">АКЗ</option>
	<option value="гора">Гора</option>
	<option value="слободка">Слободка</option>
	</select>

<br>

lat:<br><input type="text" name="lat"  class="form-control" /><br>
	
lng:<br><input type="text" name="lng"  class="form-control" /><br>
	
	
Описание: <br><textarea name="content"  class="form-control" id="editor1"></textarea><br>

<div style="border: 1px solid silver; padding: 10px;">
<h3>+ Добавить номер</h3>

Название:<br><input type="text" name="titlenomer"  class="form-control" /><br>
Описание:<br><textarea name="opisnomer"  class="form-control" ></textarea><br>
Цена:<br><input type="text" name="pricenomer"  class="form-control" /><br></div>


<br> <input type = 'submit' value = "Добавить"  class="btn btn-primary btn-lg active" />
					
@if(Session::has('message'))
{{Session::get('message')}}
@endif
</form>
</div>
        

 <script>
        var editor = CKEDITOR.replace( 'editor1' );
</script>
