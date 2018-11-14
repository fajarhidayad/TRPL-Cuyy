<?php

namespace App\Http\Middleware;

use Closure;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next)
     {
         if (Auth::check() && Auth::User()->level==1) {
             return $next($request);
         } elseif (Auth::check() && Auth::User()->level==2) {
             return redirect('forbidden');
         }
     }
}
