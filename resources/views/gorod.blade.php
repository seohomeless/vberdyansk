		
@extends('layouts.app')


@section('content')

<div class="prf">


<div class="prf2"><h2>О городе Бердянске</h2>
</div>


</div>


<div class="container">


 @foreach($gorodarticle as $gorodarticles)
    <div class="gorod">
    
    
    <img src="/images/{{$gorodarticles->prev_photo}}" style="padding-bottom: 20px; float: left; padding-right: 10px; width: 230px; height: auto;" />
    <h3><a href="/gorod/{{$gorodarticles->alias}}">{{ str_limit($gorodarticles->title, 50) }}</a></h3>
    <div class="disk">{{ str_limit(strip_tags($gorodarticles->content), 150) }}...</div>
    <br><a href="/gorod/{{$gorodarticles->alias}}">> Читать далее</a>
    </div>
 
 @endforeach

 {{ $gorodarticle->links() }}

</div>


@include('footer')
	
@endsection
