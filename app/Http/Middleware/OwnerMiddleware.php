<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
   public function handle($request, Closure $next, $role){
	   
	   
	
        if (!$request->user()->hasRole($role)) {
            return redirect('/login'); // редирект куда угодно
        }
		
		
		
        return $next($request);
    }
}
