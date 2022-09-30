<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeknisiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        define('IS_TEKNISI',true);
        // untuk membuat check siapa yang login,
        // pada kasus ini yg login adalah teknisi
        if(!Auth::guard('teknisi')->check()){
            return redirect('/login');
        }

        return $next($request);


    }
}
