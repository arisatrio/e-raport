<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if(auth()->user()->role_id === 1) {
                    return redirect()->route('admin.dashboard');
                } else if(auth()->user()->role_id === 2) {
                    return redirect()->route('walas.dashboard');
                } else if(auth()->user()->role_id === 3) {
                    return redirect()->route('guru.dashboard');
                } else if(auth()->user()->role_id === 4) {
                    return redirect()->route('murid.dashboard');
                }
            }
        }
        return $next($request);
    }
}
