@extends('layouts.app')

@section('content')


<div class="container">
 
            
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

						   
					<h1>Зарегестрированные на сайте</h1>
					<br>
						   
					@foreach($users as $user)

						<a href="{{$user->id}}">{{$user->name}}</a>
						
					<hr>
					@endforeach
					
					
					
             
</div>

@endsection
