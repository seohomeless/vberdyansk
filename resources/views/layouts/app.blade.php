<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Отдых в Бердянске</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="/css/nouislider.css"  rel="stylesheet" type="text/css" />
	<link href="{{ asset('js/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
	<link href="{{ asset('js/owlcarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/owlcarousel/jquery.min.js') }}"></script>
	<script src="{{ asset('js/owlcarousel/owl.carousel.js') }}"></script>
	<script src="{{ asset('/js/ckeditor/ckeditor.js') }}" type="text/javascript" charset="utf-8" ></script>
	
	
<link rel="stylesheet" type="text/css" href="/js/colorbox-master/example3/colorbox.css">
<script type="text/javascript" src="/js/colorbox-master/jquery.colorbox-min.js"></script>



</head>

<body>


@if(!empty( Auth::user()->id )) 
	 
 
@if ( Auth::user()->hasRole('admin')) 
	
	<div class="admin">
	<div class="adminka">
	<ul>
	<li><a href="/"><img src="/img/hom.png" style="position: relative; top: -2px;"></a> </li>
	<li><a href="/soderzhimoe">Город</a> </li>
	<li><a href="/houseoshow">Жилье</a></li>
	<li><a href="/mestashow">Места</a></li>
	<li><a href="/photoshow">Фото</a></li>
	<li><a href="/otzivi">Отзывы</a></li>
	<li><a href="/users">Пользователи</a></li>
	<li><a href="/orders">Оплаты</a></li>
	</div>

	</div>

	<div style="height: 33px;">
	</div>
@endif

@endif
 


 
 



    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
<img src="/img/logo.png" style="position: relative; top: -9px;" >
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
					
					
				<div class="menus">
					  <ul>
					   <li><a href="/gorod">О городе</a></li> 
					   
					   
					          <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Жилье в Бердянске<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                         <li><a href="/kvartiri">Квартиры</a></li> 
					  <li><a href="/hotels">Отели и гостиницы</a></li> 
					  <li><a href="/sector">Частный сектор</a></li> 
                                    </li>
                                </ul>
                            </li>
							 <li><a href="/mesta">Места</a></li> 
					 
							
							
					    <li><a href="/photo">Фото</a></li> 
					  </ul> 
                </div>

				
				
				<div class="vxod">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Вход</a></li>
                            <li><a href="{{ route('register') }}">Регистрация для владельцев</a></li>
							
							
							  <li class="dob"> <a href="/hotels/create">+ Добавить жилье</a> </li> </ul>
                        @else
							
						
							 <div style="  left: -219px;   position: relative;    top: 38px;"> <li class="dob"> <a href="/hotels/create">+ Добавить жилье</a> </li> </div>
							    <ul class="nav navbar-nav navbar-right ava">
							  
                            <li class="dropdown">
						
						
					
								<img src="/app/{{ Auth::user()->avatar }}" style="width: 60px; height: 60px; border-radius: 60px;">
						
			
					
 
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                  
										<li><a href="#">Ваш профиль</a></li>
										 <li><a href="/vashezhile">Ваше жилье</a></li>
										   <li>
                                        
										 <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Выйти
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
					
					
				</div>	
					
					
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
        <script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 0,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 2,
                    nav: false
                  },
                  1000: {
                    items: 2.5,
                    nav: true,
                    loop: false,
                    margin: 0
                  }
                }
              })
            })
          </script>

<script>
 jQuery("a.colorbox").colorbox({
    width: 900,
    height: 600,
    opacity: 0.1
 });
</script>

</body>
</html>
