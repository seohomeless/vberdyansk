		
@extends('layouts.app')


@section('content')

<div class="prf">


<div class="prf2"><h2>Отели в Бердянске</h2>
</div>


</div>



<div class="container">


 @foreach($house as $houses)
    <div class="gorod">
    
  <h2><a href="/hotels/{{ $houses->id }}">{{ $houses->title }}</a></h2>
	<img src="/images/{{ $houses->prev_photo }}">
    {{ $houses->hotels->content }}
	
	<br><a href="/hotels/{{ $houses->id }}">Подробнее</a>
   <br>
  
   
   
  
 
    </div>
 
 @endforeach

 {{ $house->links() }}

</div>


@include('footer')
	
@endsection
