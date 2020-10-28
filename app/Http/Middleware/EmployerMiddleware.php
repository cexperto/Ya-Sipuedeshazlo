<?php

namespace App\Http\Middleware;

use Closure;

class EmployerMiddleware
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
        //return $next($request);
        //return $next($request);
        if (auth()->check() && auth()->user()->codUserRol==3)
            return $next($request);

        return redirect('login');
    }
}
