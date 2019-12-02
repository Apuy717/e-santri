<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class VisitorsMiddlware
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
        if (!Sentinel::check()){
            return $next($request);
        }
        elseif (Sentinel::getUser()->roles()->first()->slug == 'admin') {
           return redirect('/dashboard');
        }
        elseif (Sentinel::getUser()->roles()->first()->slug == 'user') {
            return redirect('/user');
        }
        
    }
}
