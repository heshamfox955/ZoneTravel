<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::guard($guard)->check() && auth()->user()->permissions == 'admin') {
            return $next($request);
        } elseif (Auth::guard($guard)->check() && auth()->user()->permissions == 'modertor') {
            return $next($request);
        }
        return redirect()->route('login')->with('error', trans('admin.insufficient_permissions'));
    }
}
