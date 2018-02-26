 @extends('layouts.app')

 

 
 
 
@section('content')


	

<div class="container">
 
<h1> {{ $gorodshow -> title }}</h1>
  
  {!! $gorodshow->content !!}
</div>



	@include('footer')
	
	
@endsection



	
	
