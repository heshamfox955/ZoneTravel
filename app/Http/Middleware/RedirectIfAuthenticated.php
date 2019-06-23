<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->permissions == 'admin') {
            return redirect()->route('home')->with('info', trans('admin.you_logged'));
        } elseif (Auth::guard($guard)->check() && Auth::user()->permissions == 'modertor') {
            return redirect()->route('home')->with('info',trans('admin.you_logged'));
        }

        return $next($request);
    }
}
