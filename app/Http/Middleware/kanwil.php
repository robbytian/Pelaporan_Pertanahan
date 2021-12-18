<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class kanwil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->intended('login');
        }

        if (Auth::user()->level == 3) {
            return redirect()->intended('dashboard');
        }

        if (Auth::user()->level == 1) {
            return $next($request);
        }

        if (Auth::user()->level == 2) {
            return redirect()->intended('dashboard');
        }
    }
}
