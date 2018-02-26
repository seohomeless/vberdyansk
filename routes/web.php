<?php

Auth::routes();

Route::POST('/save-otvet/fgdfh/dfgdfg/fghdfgh','CommentsController@savesotvets');



Route::resource('rooms', 'RoomsController');
Route::get('/room', array('as' => 'blog', 'uses' => 'RoomsController@kvartiri'));

Route::get('/gorod', 'Gorod@index');
Route::get('/mesta', 'Mesta@index');
Route::get('/photo', 'Photo@index');
Route::get('/', 'HouseController@index');

Route::resource('hotels', 'HotelController');
Route::resource('sector', 'SectorController');
Route::resource('kvartiri', 'KvartirController');


Route::group(['middleware' => 'role:admin'], function() {
    Route::get('/soderzhimoe', 'AdminController@soderzhimoe');
    Route::get('/otzivi', 'AdminController@otzivi');
    Route::get('/users', 'AdminController@users');
    Route::get('/orders', 'AdminController@oplati');
    Route::get('/gorod/create', 'AdminController@gorodadd');
    Route::get('/mesto/create', 'AdminController@mestaadd');
    Route::get('/photo/create', 'AdminController@photoadd');
    Route::DELETE('/destroygorod/{id}', 'AdminController@destroygorod');

    Route::get('/photoshow', 'AdminController@photoshow');
    Route::get('/houseoshow', 'AdminController@houseshow');
    Route::get('/mestashow', 'AdminController@mestashow');

    Route::post('/gorod/add','Gorod@addgorod');
    Route::post('/mesta/add','Mesta@addmesto');

    Route::DELETE('/destroymesta/{id}', 'AdminController@destroymesta');
});

Route::get('/room/create', 'RoomsController@create');
Route::get('/vashezhile', 'RoomsController@vashezhile');
Route::get('/room/{id}', array('as' => 'category', 'uses' => 'RoomsController@show'));
Route::get('/poisk', 'RoomsController@poisk');
Route::post('/hotels/{id}','CommentsController@save');



Route::get('/gorod/{alias}','Gorod@showgorod');


Route::get(
    '/socialite/{provider}',
    [ 
        'as' => 'socialite.auth',
        function ( $provider ) {
            return \Socialite::driver( $provider )->redirect();
        }
    ]
);
 
Route::get('/socialite/{provider}/callback', function ($provider) {
	$user = \Socialite::driver($provider)->user();
	dd($user);
});