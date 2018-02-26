		
@extends('layouts.app')


@section('content')

<div style="background: url('/img/index.png'); width: 100%; height: 200px; background-size: cover; background-position: center center; margin-bottom: 30px;">


<div style="font-size: 50px; color: white; margin: 0 auto; width: 850px; text-align: center; padding-top: 20px; padding-bottom: 20px; "><h2 style="font-size: 49px; color: white;  font-family: MyriadPro,sans-serif !important;  text-shadow: 1px 1px 1px #1e1e1e; padding-top: 30px;">
Куда сходить в Бердянске</h2>
</div>


</div>


<div class="container">
 @foreach($mestaarticle as $mestaarticles)
    <div class="gorod">
    
    
    <img src="/images/{{$mestaarticles->prev_photo}}" style="padding-bottom: 20px; float: left; padding-right: 10px; width: 230px; height: auto;" />
    <h3><a href="/gorod/{{$mestaarticles->alias}}">{{ str_limit($mestaarticles->title, 50) }}</a></h3>
    <div class="disk">{{ str_limit(strip_tags($mestaarticles->content), 150) }}...</div>
    <br><a href="/gorod/{{$mestaarticles->alias}}">> Читать далее</a>
    </div>
 
 @endforeach

 {{ $mestaarticle->links() }}

</div>


@include('footer')
	
@endsection
