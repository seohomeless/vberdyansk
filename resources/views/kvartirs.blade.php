		
@extends('layouts.app')


@section('content')

<div class="prf">


<div class="prf2"><h2>Квартиры в Бердянске</h2>
</div>


</div>



<div class="container">


 @foreach($kvartir as $kvartirs)
    <div class="gorod">
    
  <h2><a href="/kvartiri/{{ $kvartirs->id }}">{{ $kvartirs->title }}</a></h2>
  {{ $kvartirs->prev_photo }}
    {{ $kvartirs->kvarti->content }}
	<br><a href="/kvartiri/{{ $kvartirs->id }}">Подробнее</a>
   <br>
  
   
   
  
 
    </div>
 
 @endforeach

 {{ $kvartir->links() }}

</div>


@include('footer')
	
@endsection
