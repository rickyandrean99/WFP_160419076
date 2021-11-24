<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->sebagai;
            switch ($role) {
                case 'owner':
                    return '/supplier';
                    break;
                case 'pegawai':
                    return '/product';
                    break;
                case 'member':
                    return '/checkout';
                    break;
                default:
                    return '/home';
                break;
            }
        }

        return $next($request);
    }
}
