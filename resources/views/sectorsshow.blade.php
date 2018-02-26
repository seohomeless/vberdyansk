		
@extends('layouts.app')


@section('content')




<div class="container">

  <h2>{{ $houseshow->title }}</h2>
  {{ $houseshow->prev_photo }}
    {{ $houseshow->sectors->content }}
	

   <br>
  
 






 <div class="panel panel-default" style="padding: 0px; background-color: inherit !important;  box-shadow: 0 0px 0px rgba(0, 0, 0, 0);
    border: 0 none;
    padding: 0;">
	 
	 @include('commentotvet')
	 
	


</div>


	@guest @include('comment') @else @endif
</div>



@include('footer')
	
@endsection
