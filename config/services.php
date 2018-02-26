<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
	
	'google' => [
        'maps' => [
            'api-key' => env('GOOGLE_MAPS_API_KEY'),
        ],
    ],
	
	'google' => [
		'client_id' => '616433460179-26cp0h0aoqlm0vc2u3vferjg5tsrqmrv.apps.googleusercontent.com',
		'client_secret' => 'iy1VQSWkpVCIYzUBO6lt4OF2',
		'redirect' => 'http://vberdyansk.local/socialite/google/callback', // Ссылка на перенаправление при удачной авторизации (3)
	],


	'github' => [
		'client_id' => '31491e358826e32b2cb6',
		'client_secret' => '397f904b62020f13038ee145b4eb104a3c365f06',
		'redirect' => 'http://vberdyansk.local/socialite/github/callback', //Ссылка на перенаправление при удачной авторизации (3)
	],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
