<?php

namespace App\Http\Middleware;

use Closure;

class Level
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
        if(auth()->user()->level == "Admin" || auth()->user()->level == "Kordinator"){
            return $next($request);
        }
        return redirect('home')->with('error','You have not admin access');
    }
}
