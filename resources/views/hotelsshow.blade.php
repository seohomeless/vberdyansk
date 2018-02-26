		
@extends('layouts.app')


@section('content')




<div class="container">
<div style="width: 35%; float: left;">
				 <div style="padding-left: 30px; padding-top: 20px;">
				 @if($schetcomments > 1)

	

	<p style="padding-top: 10px;">	 Всего отзывов: {{ $schetcomments }}<br>
<font color="green">
	<br>Сервис:  {{ $sservis2 }} из 5
	<br>Чистота:  {{ $schisto2 }}  из 5
	<br>Цена: {{ $scena2 }}  из 5</font>
		 
	@else 
					
				Отзывов пока нет!
		
	</center>
				 @endif		
				
				  </div>
				  
				  
				   </div><img src="/images/{{ $houseshow->prev_photo }}" style="float: left;" />
  <h2>{{ $houseshow->title }}</h2>
  {{ $houseshow->prev_photo }}
    {{ $houseshow->hotels->content }}

   <br>
  <div id="map_canvas" style="width:100%; height:300px; margin-top: 20px;"></div>

 <div class="panel panel-default" style="padding: 0px; background-color: inherit !important;  box-shadow: 0 0px 0px rgba(0, 0, 0, 0);
    border: 0 none;
    padding: 0;">
	 
	 @include('commentotvet')
	 
	


</div>


	@guest @include('comment') @else @endif
</div>













@include('footer')
	
@endsection
