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
        switch ($guard){

            case 'web':
                if (Auth::guard($guard)->check()){
                    return redirect()->route('user.home.index');
                }
                break;

            case 'reviewer':
                if (Auth::guard($guard)->check()){
                    return redirect()->intended(route('reviewer.penelitian.index'));
                }
                break;

            case 'kap3m':
                if (Auth::guard($guard)->check()){
                    return redirect()->intended(route('kap3m.home.index'));
                }
                break;

            case 'admin':
                if (Auth::guard($guard)->check()){
                    return redirect()->intended(route('admin.index'));
                }
                break;


            default:
                if (Auth::guard($guard)->check()){
                    return 'belom dibuat bro';
                }
                break;
        }
        return $next($request);
    }
}
