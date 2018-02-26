		
@extends('layouts.app')


@section('content')

<div class="prf">


<div class="prf2"><h2>Частный сектор в Бердянске</h2>
</div>


</div>



<div class="container">


 @foreach($sector as $sectors)
    <div class="gorod">
    
  <h2><a href="/sector/{{ $sectors->id }}">{{ $sectors->title }}</a></h2>
  {{ $sectors->prev_photo }}
    {{ $sectors->sectors->content }}
	<br><a href="/sector/{{ $sectors->id }}">Подробнее</a>
   <br>
  
   
   
  
 
    </div>
 
 @endforeach

 {{ $sector->links() }}

</div>


@include('footer')
	
@endsection
